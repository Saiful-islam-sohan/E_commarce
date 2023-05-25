<?php

namespace App\Http\Controllers;

// use Nette\Utils\Image;
// use Intervention\Image\Image;
use App\Models\Testimonial;
// use Intervention\Image\ImageManagerStatic as Image;
use Flasher\Laravel\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
// use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::latest('id')->select(['id','client_name','client_designation','client_message','client_image','updated_at'])->paginate(10);
        //return $testimonial;

        return view('backend.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        // dd($request->all());

        $testimonial=Testimonial::create
        ([
            'client_name'=>$request->client_name,
            'client_designation'=>$request->client_designation,
            'client_message'=>$request->client_message

        ]);
        $this->img_uplode($request ,$testimonial->id);


        Toastr::success('Data store successfully!');
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }

    public function img_uplode($request, $itm_id)
    {
        $testimonial=Testimonial::findorFail($itm_id);

              if($request->hasfile('client_image'))
              {
                          if($testimonial->client_image !='deafault-client.jpg')
                          {  $photo_location='public/uplodes/testimonial/';
                            $old_photo_location= $photo_location.$testimonial->client_image;
                            unlink(base_path( $old_photo_location));

                          }
                          $photo_location='public/uplodes/testimonial/';
                          $uplode_photo= $request->file('client_image');
                          $new_photo_name=$testimonial->id.'.'. $uplode_photo->getClientOriginalExtension();
                          $new_photo_location=$photo_location.$new_photo_name;
                          Image::make($uplode_photo)->resize(105, 105)->save(base_path($new_photo_location),40);

                          $check=$testimonial->update([
                               'client_image'=>$new_photo_name,
                          ]);
              }
    }
    }
