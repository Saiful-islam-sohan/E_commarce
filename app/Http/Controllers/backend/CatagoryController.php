<?php

namespace App\Http\Controllers\backend;


use App\Models\Catagory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CatagoryStoreRequest;
use App\Http\Requests\UpdateCatagoryRequest;
use Image;
class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Catagory::latest('id')->select(['id','title','slug','updated_at','catagory_image'])->paginate();

        //return $categories;

        return view('backend.catagory.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatagoryStoreRequest $request)
    {
        //  dd($request->all());


        $catagory=Catagory::create([
                 'title'=>$request->title,
                'slug'=>Str::slug($request->title)

         ]);
        //  $this->image_upload($request, $catagory->id);
        $this->image_upload($request,$catagory->id);
         Toastr::success('Create New Catagory successfully!');
        return redirect()->route('catagory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
       // dd($id)


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catagory=Catagory::findOrFail($id);
        //when parameter use id
       // dd($catagory);
        //when parameter pass slug
       //$catagory=Catagory::whereSlug($slug);
       //return $catagory;
        return view('backend.catagory.edit',compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatagoryRequest $request, $id)
    {
        // dd($request->all());

        $catagory=Catagory::findOrFail($id);
        $catagory->update([
         'title'=>$request->title,
         'slug'=>Str::slug($request->title)

    ]);
    $this->image_upload($request,$catagory->id);
    // $validatedData = $request->validate([
    //     'tital' => 'baill|required|string',
    // ]);
    // $catagory->update($validatedData);
      Toastr::success('update New Catagory successfully!');
        return redirect()->route('catagory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory=Catagory::findOrFail($id);
        if($catagory->catagory_image)
        {
            $photo_location='uploads/catagory/'.$catagory->catagory_image;
            unlink($photo_location);
        }
       // return $catagory;
       $catagory->delete();
       Toastr::success('Delete Catagory successfully!');
        return redirect()->route('catagory.index');

    }
    public function image_upload($request, $item_id)
    {

        $catagory = Catagory::findorFail($item_id);
        //dd($request->all(), $category, $request->hasFile('category_image'));
        if ($request->hasFile('catagory_image')) {
            if ($catagory->catagory_image != 'default-image.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/catagory/';
                $old_photo_location = $photo_location . $catagory->catagory_image;
                unlink(base_path($old_photo_location));
            }
            $photo_location = 'public/uplodes/catagory/';
            $uploaded_photo = $request->file('catagory_image');
            $new_photo_name = $catagory->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;
            Image::make($uploaded_photo)->resize(300,260)->save(base_path($new_photo_location), 40);
            //$user = User::find($category->id);
            $check = $catagory->update([
                'catagory_image' => $new_photo_name,
            ]);
        }
    }





}



