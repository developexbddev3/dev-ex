@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Category</li>
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
                    <h3 class="card-title">All Category</h3>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-info ml-auto"> <i class="fa fa-plus"></i>  Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- $clients --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if(count($categories)>0)
                        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th style="max-width: 80px;">S.N.</th>
                              <th>Name</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if($category->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-warning">Painding</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="edit"><i class="fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.category.delete', $category) }}" onsubmit="return confirm('Are  you sure to delete this?')">
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
                          <h6 class="text-center">No Category found! Please create Category</h6>
                        @endif
                    </div>
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
</style>

@push('js')
<script>
function preview(Img) {
    let image = Img.files[0];
    let img_url = URL.createObjectURL(image);
    document.getElementById('prev_img').src = img_url;
}

</script>
@endpush
@endsection