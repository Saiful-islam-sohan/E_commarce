<?php

namespace App\Http\Controllers\backend;


use App\Models\Catagory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CatagoryStoreRequest;
use App\Http\Requests\UpdateCatagoryRequest;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Catagory::latest('id')->select(['id','title','slug','updated_at'])->paginate();

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
        // dd($request->all());


         Catagory::create([
                 'title'=>$request->title,
                'slug'=>Str::slug($request->title)

         ]);
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
        $catagory=Catagory::findOrFail($id)->delete();
       // return $catagory;
       Toastr::success('Delete Catagory successfully!');
        return redirect()->route('catagory.index');

    }
}
