<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorybooktour;
use App\Http\Requests\Category\Storebooktour;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Http\Controllers\VNpay;
use Illuminate\Support\Str;

class Booktour extends Controller
{

    public function booktour($id_tour) {
        $product = Category::where('id_tour', $id_tour)->firstOrFail();
        return view('homepage.booktour', compact('product'));       
    }

    public function store(Request $request)
    {
         dd($request->all());
      
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'id_tour' => 'required|integer',
            // 'payment' => 'required|boolean',
            'startdate' => 'required|date_format:Y-m-d H:i:s',
            'enddate' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $tour = Category::find($request->input('id_tour'));
        
        if (!$tour) {
            return response()->json(['error' => 'Không tìm thấy thông tin tour'], 404);
        }
        $quantity = $request->input('quantity');
        $price = $tour->sale_price ?? $tour->price; // Sử dụng giá khuyến mãi nếu có, ngược lại sử dụng giá gốc
        $total = $price * $quantity;
        

        $existingBookingSameTour = Categorybooktour::where('phone', $request->input('phone'))
            ->where('id_tour', $request->input('id_tour'))
            ->exists();

        if ($existingBookingSameTour) {
            $errorMessage = 'Bạn đã đặt tour này trước đó.';
            return redirect()->route('booktour', ['id_tour' => $request->input('id_tour')])
                ->with(['alert' => ['type' => 'error', 'message' => $errorMessage]]);
        }

        $existingBookingDifferentTour = Categorybooktour::where('phone', $request->input('phone'))
            ->where('id_tour', '<>', $request->input('id_tour'))
            ->where(function ($query) use ($request) {
                $query->whereBetween('startdate', [$request->input('startdate'), $request->input('enddate')])
                    ->orWhereBetween('enddate', [$request->input('startdate'), $request->input('enddate')])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('startdate', '<', $request->input('startdate'))
                            ->where('enddate', '>', $request->input('enddate'));
                    });
            })
            ->exists();

        if ($existingBookingDifferentTour) {
            $errorMessage = 'Số điện thoại đã được sử dụng cho một đặt tour khác trong khoảng thời gian này.';
            return redirect()->route('booktour', ['id_tour' => $request->input('id_tour')])
                ->with(['alert' => ['type' => 'error', 'message' => $errorMessage]]);
        }

        $booktour = new Categorybooktour();
        $booktour->customer_name = $request->input('customer_name');
        $booktour->email = $request->input('email');
        $booktour->phone = $request->input('phone');
        $booktour->address = $request->input('address');
        $booktour->note = $request->input('note');
        $booktour->quantity = $request->input('quantity');
        $booktour->total = $total;
        $booktour->id_tour = $request->input('id_tour');
        // $booktour->payment = $request->input('payment');
        $booktour->startdate = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('startdate'));
        $booktour->enddate = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('enddate'));

        $booktour->status = 0;
        $booktour->confirmation_code = Str::random(32);
        $booktour->save();
        $details = [
            'customer_name' => $request->input('customer_name'),
            'tourname' => $tour->nametour,
            'quantity' => $request->input('quantity'),
            'startdate' => $request->input('startdate'),
            'enddate' => $request->input('enddate'),
            'confirmation_code' => $booktour->confirmation_code,
        ];
    
        Mail::to($request->input('email'))->send(new BookingConfirmation($details));
       // BookingConfirmation::dispatch($request->input('email'))->delay(now()->addSecond(2)); 

        Category::where('id_tour', $request->input('id_tour'))->decrement('numberguests',$request->input('quantity'));
        return redirect()->route('booktour', ['id_tour' => $request->input('id_tour')])->with('success', 'Đặt tour thành công! Vui lòng kiểm tra Email để xác nhận đặt tour');

    }

    public function build()
{
    return $this->from($this->details['email'], $this->details['customer_name'])
                ->subject('Xác nhận đặt tour')
                ->view('user.booking-confirmation');
}



    public function searchBookTour(Request $request)
    {
        $phoneNumber = $request->input('phone');
        //$booktour = Categorybooktour::where('phone', $phoneNumber)->firstOrFail();
        $booktour = Categorybooktour::where('phone', $phoneNumber)->get();
        return view('homepage.search', ['booktour' => $booktour]);

        
    }

    public function cancelBooking($id_booktour) {
        $booktour = Categorybooktour::find($id_booktour);
        if ($booktour && $booktour->status == 0) {
            $booktour->status = 1; // hoặc bất kỳ giá trị khác để chỉ ra trạng thái đã hủy
            $booktour->save();
            return redirect()->back()->with('success', 'Tour đã được hủy thành công.');
        } elseif ($booktour && $booktour->status != 0) {
            return redirect()->back()->with('error', 'Tour đã được hủy trước đó.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy đơn đặt tour.');
        }
    }

    
}
