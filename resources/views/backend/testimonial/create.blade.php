@extends('backend.layouts.master')


@section('title')
Testimonial Create

@endsection


@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

<div class="d-flex justify-content-start">
    {{-- {<button type="button" class="btn btn-primary">Add Testimonail</button> --}}
    <a href="{{route('testimonial.index')}}" type="button" class="btn btn-primary"> Back Catagory Page</a>
</div>

<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">


                    <form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">client Name</label>
                            <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                name="client_name">
                            @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">client Designation</label>
                            <input type="text" class="form-control @error('client_designation') is-invalid @enderror"
                                name="client_designation">
                            @error('client_designation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control @error('client_message') is-invalid @enderror" placeholder="Leave a comment here"  style="height: 100px" name="client_message"></textarea>
                                <label for="floatingTextarea2">client_message</label>
                              </div>
                            @error('client_message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="file" name="client_image" class="form-control dropify" accept="image/*">
                              </div>
                            @error('client_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked name="is_active">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active or is_active</label>
                              </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Store</button>
                    </form>


        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify();
</script>
@endsection

