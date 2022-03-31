@extends('backend.layout.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Admin</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="float-left">Edit Admin</h4>
                      <a href="{{ route('admin.admin.index') }}" class="btn btn-dark float-right"><i class="fa fa-arrow-left"></i> Back to list</a>
                  </div>
                  <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.admin.change_password')}}" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="">Old password</label>
                            <input type="text" name="old_password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">New password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Confirm password</label>
                            <input type="text" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                  </div>
              </div>
        
          </div>
      </div>
    </div>
  </section>

@endsection
