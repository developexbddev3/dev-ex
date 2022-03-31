@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Client Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Client</li>
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
                    <h3 class="card-title">Create Client</h3>
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-dark ml-auto"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
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
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Company name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">logo</label>
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input" id="logo" oninput="preview(this)">
                                        <label class="custom-file-label" for="logo">Choose logo</label>
                                    </div>
                                    <div class="prev">
                                        <img id="prev_img">
                                    </div>
                                    @error('logo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-on-success">
                                    <input type="checkbox" name="status" class="custom-control-input" id="is_active">
                                    <label class="custom-control-label" for="is_active">Do You want to publish this?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
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