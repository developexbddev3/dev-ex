@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hero Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hero Section</li>
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
                    <h3 class="card-title">Hero Section</h3>
                </div>
                <!-- /.card-header -->
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
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.hero.create') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $hero->title }}"
                                        required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" value="{{ $hero->description }}"
                                        placeholder="Description" required>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="buttons">Buttons</label> --}}
                                    <div id="buttons_list">
                                        {{-- <div class="d-flex">
                                            <input type="text" class="form-control" name="buttons[]" id="buttons" placeholder="Buttons">
                                            <button class="btn btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
                                        </div> --}}
                                        {{-- <input type="text" class="form-control" name="buttons" id="buttons" placeholder="Buttons"> --}}
                                    </div>
                                    
                                    <div class="d-flex mt-3">
                                        {{-- <button type="button" id="add_btns_field" class="btn btn-outline-info ml-auto">Add Button</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    @push('js')
        <script>
            $('#add_btns_field').click(function() {
                $('#buttons_list').append(`
                    <div class="d-flex">
                        <input type="text" class="form-control" name="buttons[]" id="buttons" placeholder="Buttons">
                        <button class="btn btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
                    </div>
                `);
            });
        </script>
    @endpush
@endsection
