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
            <li class="breadcrumb-item active">Admin</li>
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
                      <h4 class="float-left">Admin User List</h4>
                      <a href="{{ route('admin.admin.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add New</a>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                          {{ session('success') }}
                        </div>
                    @endif
                    <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone No</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($admins as $admin)
                          {{-- @dd($deposit->user_id) --}}
                          @if ($admin->phone != '01763312883')
                          <tr>
                              <td>{{$admin->name}}</td>
                              <td>{{$admin->email}}</td>
                              <td>{{$admin->phone}}</td>
                              @if ($admin->is_active == 0)
                                <td>
                                  <span class="btn-xs btn-danger">Disabled</span>
                                </td>
                              @else
                                <td class=""><span class="btn-xs btn-success">Active</span></td>
                              @endif
                              <td>
                                <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-sm btn-info">
                                  <i class="fa fa-pen"></i>
                                </a>
                              </td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </tbody>
                      </table>  
                  </div>
              </div>
        
          </div>
      </div>
    </div>
  </section>

@endsection
