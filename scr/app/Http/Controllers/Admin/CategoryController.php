<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorylocation;
use App\Models\imgtour;
use App\Http\Requests\Category\StoreCategoryRequesttour;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tour = Category::paginate(8);
        return view('admin.category.tourmanagement', compact('tour'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Categorylocation::all();
        $tour = Category::paginate(8);
        return view('admin.category.addtour', compact('tour','locations'));
        
        //  return view('admin.category.addtour');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequesttour $request)
    {
        try {
            // Validate the request using the rules defined in StoreCategoryRequesttour
            $validatedData = $request->validated();

            $tours = new Category;
            $tours->nametour = $validatedData['nametour'];
            $tours->price = $validatedData['price'];
            $tours->sale_price = $validatedData['sale_price'];
            $tours->itinerary = $validatedData['itinerary'];
            $tours->schedule = $validatedData['schedule'];
            //$tours->id_location = $validatedData['id_location'];
            $tours->id_location = $request->input('id_location') == '4' ? null : $request->input('id_location');
            //dd($request->input('id_location'));
            $tours->numberguests = $validatedData['numberguests'];
            $tours->vehicle = $validatedData['vehicle'];
            $tours->domain = $validatedData['domain'];
           // $tour->sulg = $validatedData['sulg'] ?? null;
            $tours->description = $validatedData['description'];
            $tours->stock = $request->stock == true ? '1':'0';
            // Check and handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                // Kiểm tra lỗi khi tải lên
                if ($image->getError()) {
                    return redirect()->back()->with('error', 'Lỗi khi tải lên hình ảnh: ' . $image->getErrorMessage());
                }
                $imageName = time() . '_' . $image->getClientOriginalName();// Đặt tên mới cho hình ảnh để tránh trùng lặp 
                $image->storeAs('public/images', $imageName);// Lưu hình ảnh vào thư mục storage
                $tours->image = $imageName;// Lưu tên tệp vào cơ sở dữ liệu
            }


            // if ($request->hasFile('image_path')) {
            //     foreach ($request->file('image_path') as $fileItem) {
            //         $dataProductImageDetail = $this->storageTraitUploadMytiple($fileItem, 'storage/images/');
            //         $tours->images()->create([
            //             'image_path' => $dataProductImageDetail['file_path'],
            //             'image_name' => $dataProductImageDetail['file_name']
            //         ]);
            //     }
            // }
      //chưa thêm vào được
            if ($request->hasFile('image_path')) {
                $uploadPath = 'storage/images/';
                foreach ($request->file('image_path') as $index => $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $index . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);

                    $tours->productImages()->create([
                        'id_tour' => $tours->id,
                        'image_name' => $filename,
                        'image_path' => $uploadPath . $filename,
                    ]);
                }
            }
            DB::commit();
      // dd($tour);
            $tours->save();


            // Save the record to the database
           
            //dd($tour);
            // Redirect with success message
            return redirect()->route('tour.index')->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            dd($e->getMessage());
            // Handle the exception and redirect with error message
            return redirect()->back()->with('error', 'Thêm mới thất bại: ' . $e->getMessage());
        }
    }


    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tour)
    {
        try {
            $locations = Categorylocation::all();
            $tour = Category::findOrFail($id_tour);
            return view('admin.category.edittour', compact('tour', 'locations'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không tìm thấy đối tượng: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tour)
    {
    $validatedData = $request->validate([
        'nametour' => ['required', 'string'],
        'image' => ['nullable', 'mimes:jpg,jpeg,png'],
        'price' => ['required', 'string'],
        'sale_price' => ['nullable', 'string'],
        'itinerary' => ['required', 'string'],
        'schedule' => ['required', 'string'],
        'id_location' => ['nullable', 'numeric'],
        'numberguests' => ['required', 'numeric'],
        'vehicle' => ['nullable', 'string'],
        'domain' => ['nullable', 'string'],
        'description' => ['required', 'string'],
    ]);

    $tour = Category::findOrFail($id_tour);

    $tour->update([
        'nametour' => $validatedData['nametour'],
        'price' => $validatedData['price'],
        'sale_price' => $validatedData['sale_price'],
        'itinerary' => $validatedData['itinerary'],
        'schedule' => $validatedData['schedule'],
        //'id_location' => $validatedData['id_location'],
        'numberguests' => $validatedData['numberguests'],
        'vehicle' => $validatedData['vehicle'],
        'domain' => $validatedData['domain'],
        'description' => $validatedData['description'],
    ]);
    $tour['stock'] = $request->has('stock') ? '1' : '0';
    $tour->id_location = $request->input('id_location') == '4' ? null : $request->input('id_location');
    

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Kiểm tra lỗi khi tải lên
        if ($image->getError()) {
            return redirect()->back()->with('error', 'Lỗi khi tải lên hình ảnh: ' . $image->getErrorMessage());
        }
        $imageName = time() . '_' . $image->getClientOriginalName();
        // Đặt tên mới cho hình ảnh để tránh trùng lặp 
        $image->storeAs('public/images', $imageName);
        // Lưu hình ảnh vào thư mục storage
        $tourData['image'] = $imageName;
        // Lưu tên tệp vào cơ sở dữ liệu
    } else {
        // Nếu không có ảnh mới, giữ nguyên ảnh hiện tại
        $tourData['image'] = $tour->image;
    }

    $tour->update($tourData);

    return redirect()->route('tour.index');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tour)
    {
        $tour = Category::findOrFail($id_tour)->delete();
        return redirect()->route('tour.index');
    }
}
