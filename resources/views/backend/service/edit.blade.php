@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Service Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Service</li>
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
                    <h3 class="card-title">Create Service</h3>
                    <a href="{{ route('admin.service.index') }}" class="btn btn-dark ml-auto"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
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
                    <form action="{{ route('admin.service.update', $service) }}" class="form-row" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $service->title }}" required>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea name="short_description" class="form-control" id="short_description" rows="3" placeholder="Short description">{{ $service->short_description }}</textarea>
                                @error('short_description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="long_description">Long description</label>
                                <textarea name="long_description" class="form-control" id="long_description" rows="5" placeholder="Long description">{{ $service->long_description }}</textarea>
                                @error('long_description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image" oninput="preview(this)">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                                <div class="prev">
                                    <img id="prev_img">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-on-success">
                                    <input type="checkbox" name="status" class="custom-control-input" id="is_active">
                                    <label class="custom-control-label" for="is_active">Do You want to publish this?</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label>Feature List</label>
                                <div id="feature_list">
                                    @foreach ($service->feature_list as $key => $item)
                                        <div class="features">
                                            <input type="text" name="feature_list[]" placeholder="Feature" value="{{ $item }}" class="form-control">
                                            @if ($key > 0)
                                                <button class="btn btn-sm btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add_feature_field" class="btn btn-outline-success mt-2">Add more feature</button>
                            </div>
                            <div class="form-group mb-4">
                                <label>Price List</label>
                                <div id="prices_list">
                                    @foreach ($service->prices as $key => $item)
                                        <div class="features">
                                            <input type="text" name="prices[]" placeholder="Feature" value="{{ $item }}" class="form-control">
                                            @if ($key > 0)
                                                <button class="btn btn-sm btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add_prices_field" class="btn btn-outline-success mt-2">Add more price</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


<style>
.prev {
    display: flex;
    max-width: 300px;
    margin-top: 10px;
}
.prev #prev_img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.features {
    display: flex;
}
.features .btn {
    width: 40px;
    border-radius: 0 .25rem .25rem 0;
}
.features input {
    flex: 1;
    border-radius: .25rem 0 0 .25rem;
}
</style>

@push('js')
<script>
$('#add_feature_field').click(function() {
    let feature_list = $('#feature_list');
    feature_list.append(`
            <div class="features">
                <input type="text" name="feature_list[]" placeholder="Feature" class="form-control">
                <button class="btn btn-sm btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
            </div>
        `);
});
$('#add_prices_field').click(function() {
    let feature_list = $('#prices_list');
    feature_list.append(`
            <div class="features">
                <input type="text" name="prices[]" placeholder="Feature" class="form-control">
                <button class="btn btn-sm btn-danger" onclick="this.parentElement.remove()"><i class="fa fa-times"></i></button>
            </div>
        `);
});
function preview(Img) {
    let image = Img.files[0];
    let img_url = URL.createObjectURL(image);
    document.getElementById('prev_img').src = img_url;
}

</script>
@endpush
@endsection