<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorylocation;
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Categorylocations extends Controller
{
    //private $location;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  private $category;

    // public function _construct(Categorylocation $category){
    //     $this->category=$category;
    // } 
    // public function __construct(Categorylocation $location)
    // {
    //     $this->location = $location;
    // }
    public function index()
    {
        $locations = Categorylocation::paginate(5);
        // $location = $this->location->paginate(5);
        return view('admin.category.location', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.addlocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //  dd($request->all());
         try {
            $validatedData = $request->validated();
            $location = new Categorylocation;
            $location->name_location = $validatedData['name_location'];
            $location->save();
            
             return redirect()->route('admin.category.location')->with('success', 'Thêm mới thành công');
             
          } catch (\Exception $e) {
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

     public function edit($id_location)
     {
         try {
             $location = Categorylocation::findOrFail($id_location);
             return view('admin.category.editlocation', compact('location'));
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
    public function update(Request $request, $id_location)
    {
    
            $validatedData = $request->validate([
                'name_location' => 'required|string',
            ]);
            $location = Categorylocation::findOrFail($id_location);
            $location->update([
                'name_location' => $validatedData['name_location'],
            ]);
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id_location){
        $location = Categorylocation::findOrFail($id_location)->delete();
        return redirect()->route('location.index');
    }
}
