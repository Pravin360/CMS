@extends('admin.layouts.app')
@section('contents')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- @if (Session::has('success'))
                    {{ session()->get('success') }}
                @endif --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Add Users
                            <a href="{{ route('users.index') }}" class="btn btn-inline btn-outline-warning float-right"><i
                                    class="fa fa-plus"></i> Go back</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('users.store') }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="User Name">
                                    </div>
                                </div>
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="inputEmail3"
                                            placeholder="Email">
                                    </div>
                                </div>
                                @error('email')
                                    {{ $message }}
                                @enderror
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id=""
                                            placeholder="Address">
                                    </div>
                                </div>
                                @error('address')
                                    {{ $message }}
                                @enderror

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" id=""
                                            placeholder="Upload Image">
                                    </div>
                                </div>
                                @error('image')
                                    {{ $message }}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="exampleInputPassword1" placeholder="Confirm Password">
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Sign in</button>
                        <button type="reset" class="btn btn-default float-right">Cancel</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    </div>
    <!-- /.col -->
    </div>
    <!-- /.content -->
    </div>
@endsection
