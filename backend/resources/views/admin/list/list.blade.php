
@extends('admin.layouts.master')
@section('content')
    <div class="col-12">
        <div class="col-3 offset-9">
            @if (Session::has('deletesuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session::get('deletesuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin List</h3>

                <div class="card-tools">
                    <form action="{{route('searchAdmins')}}" method="post">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search">
                            <div id="search-results" class="dropdown-menu w-100 bg-white" style="display: none;">
                                <!-- Results will be displayed here -->
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>User ID({{ count($user) }})</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>
                                    <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                    @if ($item->id!=Auth::user()->id)
                                        <a @if (count($user) == 1) href="#"
                                           @else  href="{{ route('deleteuser', $item->id) }}" @endif
                                           class="btn btn-sm bg-danger text-white"><i class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection



