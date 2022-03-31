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
            <li class="breadcrumb-item active">Create Admin</li>
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
                      <h4 class="float-left">Create Admin</h4>
                      <a href="{{ route('admin.admin.index') }}" class="btn btn-dark float-right"><i class="fa fa-arrow-left"></i> Back to list</a>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.admin.store')}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="status" value="1"> --}}
                        <div class="form-group col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control   @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control   @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <div class="custom-control custom-checkbox">
                            <input name="is_active" class="custom-control-input custom-control-input-success custom-control-input-outline" type="checkbox" id="is_active" checked="">
                            <label for="is_active" class="custom-control-label" style="user-select: none;">Is Active</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>

                    </form>
                  </div>
              </div>
        
          </div>
      </div>
    </div>
  </section>

@endsection
