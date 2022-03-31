@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Client List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Client</li>
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
                    <h3 class="card-title">All Client</h3>
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-info ml-auto"> <i class="fa fa-plus"></i>  Create</a>
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
                        @if(count($clients)>0)
                        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th style="max-width: 80px;">S.N.</th>
                              <th>Image</th>
                              <th>Company Name</th>
                              <th>Statu</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach($clients as $key => $client)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{url($client->logo)}}" class="img-fluid" style="max-width:80px;border:2px solid var(--cyan)" alt="{{$client->logo}}">
                                    </td>
                                    <td>{{$client->name}}</td>
                                    <td>
                                        @if($client->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-warning">Painding</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="edit"><i class="fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.clients.delete', $client) }}" onsubmit="return confirm('Are  you sure to delete this?')">
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