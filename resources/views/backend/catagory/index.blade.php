@extends('backend.layouts.master')

@section('title')
catagory index

@endsection

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@section('admin_content')


<div class="d-flex justify-content-end">
    {{-- <button type="button" class="btn btn-primary">Add Catagory</button> --}}
    <a href="{{route('catagory.create')}}" type="button" class="btn btn-primary"> Add Catagory</a>
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
                    <th scope="col">image</th>
                    <th scope="col">Catagoey Name</th>
                    <th scope="col">Catagory Slug</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $catagory)
                  <tr>
                    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                    <td>{{$catagory->updated_at ->format('Y-m-d')}}</td>

                    <td><img src="{{ asset('uplodes/catagory') }}/{{ $catagory->catagory_image}}" alt="" class="img-fluid rounded h-20 w-20"></td>
                    <td>{{$catagory->title}}</td>
                    <td>{{$catagory->slug}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             setting
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('catagory.edit',$catagory->id)}}">Edit</a></li>
                              <li>

                                <form action="{{route('catagory.destroy',$catagory->id)}}" method="post">
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
