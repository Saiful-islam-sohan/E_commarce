@extends('backend.layouts.master')


@section('title')
Catagory Create

@endsection


@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="d-flex justify-content-start">
    {{-- <button type="button" class="btn btn-primary">Add Catagory</button> --}}
    <a href="{{route('catagory.index')}}" type="button" class="btn btn-primary"> Back Catagory Page</a>
</div>

<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">


                    <form action="{{route('catagory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Catagory Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="category-image" class="form-label">Category Image</label>
                            <input type="file" class="form-control dropify" name="catagory_image" id="">
                            @error('catagory_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection
