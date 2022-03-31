@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Service List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Service</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- .card -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Service List</h3>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-info ml-auto"><i class="fas fa-plus"></i>&nbsp; Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if(count($services)>0)
                        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>S.N.</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Short description</th>
                              <th>Feature list</th>
                              <th>Prices</th>
                              <th>Statu</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach($services as $key => $service)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if($service->image)
                                            <img src="{{url($service->image)}}" class="img-fluid" style="max-width:80px;border:2px solid var(--cyan)" alt="{{$service->image}}">
                                        @endif
                                    </td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->short_description}}</td>
                                    <td>
                                        @if ($service->feature_list)
                                        <ul>
                                            @foreach ($service->feature_list as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->prices)
                                            <ul>
                                                @foreach ($service->prices as $item)
                                                    <li>
                                                        {{ $item }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->status==1)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-warning">Painding</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($service->status == 1)
                                        <form method="POST" action="{{ route('admin.service.unpublish', $service) }}" onsubmit="return confirm('Are  you sure to unpublish this?')">
                                            @csrf
                                            <button class="btn btn-warning btn-sm mb-2" title="Publish">Unpublish</button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('admin.service.publish', $service) }}" onsubmit="return confirm('Are  you sure to publish this?')">
                                            @csrf
                                            <button class="btn btn-success btn-sm mb-2" title="Publish">Publish</button>
                                        </form>
                                        @endif
                                        <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="edit"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="View"><i class="fas fa-eye"></i></a> --}}
                                        <a href="{{ route('admin.service.packages', $service) }}" class="btn btn-primary btn-sm float-left mr-1">Packages</a>
                                        <form method="POST" action="{{ route('admin.service.delete', $service) }}" onsubmit="return confirm('Are  you sure to delete this?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mb-2" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                        @else
                          <h6 class="text-center">No Service found! Please create Service</h6>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection