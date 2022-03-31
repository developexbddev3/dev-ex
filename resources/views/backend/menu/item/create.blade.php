@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All menu</li>
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
                    <h3 class="card-title">
                        @isset($menuItem)
                        Edit Menu Item
                        @else
                            Add new menu item to (<code>{{$menu->name}}</code>)
                        @endisset
                    </h3>
                    <a href="{{route('admin.menus.builder',$menu->id)}}" class="btn btn-info ml-auto"><i class="fas fa-arrow-circle-left"></i> Back To List</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{isset($menuItem)? route('admin.menus.item.update',['id'=>$menu->id,'itemId'=>$menuItem->id]): route('admin.menus.item.store',$menu->id)}}">
                            @csrf
                            <div class="row">
                            <div class="col-md-8 float-left">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <div id="item_fields">
                
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" value="{{ $menuItem->title ?? old('title') }}"  autofocus>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="url">URL for menu item</label>
                                                <input id="url" type="text" class="form-control form-control-sm @error('url') is-invalid @enderror" name="url" value="{{ $menuItem->url ?? old('url') }}"  autofocus>
                                                @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="target">Open In</label>
                                                <select class="custom-select form-control-sm" name="target" id="target">
                                                    <option value="_self" @isset($menuItem) {{$menuItem->target === '_self'? "selected":""}} @endisset>Same Tab/Window</option>
                                                    <option value="_blank" @isset($menuItem) {{$menuItem->target === '_blank'? "selected":""}} @endisset>New Tab</option>
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <button  type="submit" class="btn btn-primary" style="margin-top: 10px">
                                                @isset($menuItem)
                                                    <i class="fas fa-arrow-circle-up"></i>
                                                    Update
                                                @else
                                                    <i class="fa fa-plus-circle"></i>
                                                    Create
                                                @endisset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
 
@endsection
@push('js')

@endpush