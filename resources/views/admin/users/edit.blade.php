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
                        <form action="{{ route('users.update', $specificUser->id) }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id=""
                                            placeholder="Enter User Name" value="{{ $specificUser->name }}">
                                    </div>
                                </div>
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id=""
                                            placeholder="Email" value="{{ $specificUser->email }}">
                                    </div>
                                </div>
                                @error('email')
                                    {{ $message }}
                                @enderror
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id=""
                                            placeholder="Address" value="{{ $specificUser->address }}">
                                    </div>
                                </div>
                                @error('address')
                                    {{ $message }}
                                @enderror

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>

                                    <div class="col-sm-10">
                                        <img class="mb-2" src="{{ asset('uploads/images/' . $specificUser->image) }}"
                                            alt="" width="50px" style="display: block">
                                        <input type="file" class="form-control" name="image" id=""
                                            value="">
                                    </div>
                                </div>
                                @error('image')
                                    {{ $message }}
                                @enderror
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id=""
                                            placeholder="Password">
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="" placeholder="Confirm Password">
                                    </div>
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
