@extends('backend.layouts.master')


@section('title')
Catagory edit

@endsection


@section('admin_content')


<div class="d-flex justify-content-start">
    {{-- <button type="button" class="btn btn-primary">Add Catagory</button> --}}
    <a href="{{route('catagory.index')}}" type="button" class="btn btn-primary"> Back Catagory Page</a>
</div>

<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">


                    <form action="{{route('catagory.update',$catagory->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Catagory Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{$catagory->title}}">
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

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


        </div>
    </div>
</div>
@endsection
