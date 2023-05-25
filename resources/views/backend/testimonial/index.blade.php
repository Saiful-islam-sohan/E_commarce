@extends('backend.layouts.master')

@section('title')
Testimonial index

@endsection

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@section('admin_content')


<div class="d-flex justify-content-end">
    {{-- <button type="button" class="btn btn-primary">Add Catagory</button> --}}
    <a href="{{route('testimonial.create')}}" type="button" class="btn btn-primary"> Add Testimonial</a>
</div>

<div class="container">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <div class="row">
        <div class="col-8 m-auto">


            <table  id="myTable" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last modified</th>
                    <th scope="col">client_name</th>
                    <th scope="col">client_designation</th>
                    {{-- <th scope="col">client_message</th> --}}
                    <th scope="col">client_image</th>
                    {{-- <th scope="col">updated_at</th> --}}
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($testimonials as $testimonial)
                  <tr>
                    <th scope="row">{{$testimonials->firstItem()+$loop->index}}</th>
                    <td>{{$testimonial->updated_at ->format('Y-m-d')}}</td>
                    <td>{{$testimonial->client_name}}</td>
                    <td>{{$testimonial->client_designation}}</td>
                    <td>
                        <img src="{{asset('uplodes/testiimonial')}}/{{$testimonial->client_image}}" class="img-fluid rounded-circle">

                        </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             setting
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('testimonial.edit',$testimonial->id)}}">Edit</a></li>
                              <li>

                                <form action="{{route('testimonial.destroy',$testimonial->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="dropdown-item">Delete</i></button>
                                </form>


                              </li>

                            </ul>
                          </div>

                    </td>
                  </tr>

                  @endforeach

                </tbody>
              </table>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>
    let table = new DataTable('#myTable');
</script>
@endsection
