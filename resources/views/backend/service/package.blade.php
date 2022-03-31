@extends('backend.layout.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Package</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Package</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card collapsed-card">
                <div class="card-header d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                        Create
                    </button>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.store_packages', $service) }}" class="form-row justify-content-center" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <br>
                                <div>
                                    {{-- <div class="custom-file" style="max-width: 300px;">
                                        <input type="file" name="icon_file" class="custom-file-input" id="customFile" accept=".svg, .png" oninput="preview(this)">
                                        <label class="custom-file-label" for="customFile">Upload SVG</label>
                                    </div> --}}
                                </div>
                                <div id="preview_icon">
                                    {{-- <i class="fa fa-book"></i> --}}
                                </div>
                                <br>
                                <input type="hidden" name="icon" value="" id="icon">
                                
                                <button type="button" class="btn btn-block btn-info" id="show_icons">Select icon</button>
                                @error('icon')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-on-success">
                                    <input type="checkbox" name="status" class="custom-control-input" id="is_active">
                                    <label class="custom-control-label" for="is_active">Do You want to active this?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- .card -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Add Package</h3>
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
                    <div class="table-responsive">
                        @if(count($service->packages)>0)
                        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>S.N.</th>
                              <th>Icon</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Statu</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach($service->packages as $key => $package)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {!! $package->icon !!}
                                    </td>
                                    <td>{{$package->name}}</td>
                                    <td>{{$package->description }}</td>
                                    <td>
                                        @if($package->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-warning">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.service.edit_packages', $package) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="Edit"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-primary btn-sm float-left mb-2 mr-1" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.service.packages', $service) }}" class="btn btn-primary btn-sm float-left mr-1">Packages</a>
                                         --}}
                                        <form method="POST" action="{{ route('admin.service.delete_packages', $package) }}" onsubmit="return confirm('Are  you sure to delete this?')">
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
                          <h6 class="text-center">No Package found! Please create Package</h6>
                        @endif
                        {{-- <div class="service_list">
                            @if (@$service->packages)
                                @foreach ($service->packages as $item)
                                    <div class="service_item">
                                        <div class="service_icon">
                                            {!! $item->icon !!}
                                        </div>
                                        <div>
                                            <b>{{ $item->name }}</b>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div> --}}
                    </div> 
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header icon_header">
                <input id="icon_search" type="search" class="form-control mb-0" placeholder="Search Icon">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                <div class="spinner-border text-primary" role="status" id="preload"></div>
                
                <div class="icons_grid mt-3" id="icons_grid">
                    @php
                        $ind = 0;
                    @endphp
                    @foreach ($all_icons as $key => $item)
                        @foreach ($item as $icon)
                            <div class="icon spc_id_{{ $ind }}">
                                <i class="{{ $key }} fa-{{ $icon }}"></i>
                                <span class="icon_name">{{ $icon }}</span>
                            </div>
                            @php
                                $ind++;
                            @endphp
                        @endforeach
                    @endforeach
                    
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="position: sticky; bottom: 0;background:#fff;padding:0;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary">Select</button> --}}
            </div>
        </div>
    </div>
</div>
<style>
.icon_header {
    position: sticky;
    top: 0;
    background: #fff;
    z-index: 10;
    display: flex;
    align-items: center;
}

.service_item .service_icon {
    font-size: 30px;
    padding-right: 20px;
}

#preview_icon {
    display: flex;
    max-width: 300px;
    margin-top: 10px;
    object-fit: cover;
}
#preview_icon img {
    display: block;
    width: 100%;
}
.icons_grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
}

.icons_grid .icon {
    border: 1px solid #ddd;
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    user-select: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    margin-top: -1px;
    margin-left: -1px;
    /* display: none */
}
.icons_grid .icon:hover {
    background: #eee;
}
.icons_grid i {
    font-size: 30px;
}
.icons_grid .icon_name {

}
#preload {
    display: none;
}
@media (max-width: 994px) {
    .icons_grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
    .icons_grid i {
        font-size: 20px;
    }
    .icons_grid .icon_name {
        font-size: 14px;
    }
}
@media (max-width: 500px) {
    .icons_grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .icons_grid i {
        font-size: 20px;
    }
    .icons_grid .icon_name {
        font-size: 14px;
    }
}
#preview_icon {
    padding-top: 20px;
}
#preview_icon i {
    font-size: 35px;
}
</style>

@push('js')

<script>

// icon_search
var search = document.getElementById('icon_search');
let icon_name = document.querySelectorAll('.icon_name');
icon_name = Object.values(icon_name);

let icon_txt_array = icon_name.map(element => element.innerText);

let timeout;
let preload = $('#preload');
search.addEventListener('input', function () {
    clearTimeout(timeout);
    preload.css({display: 'block'});
    timeout = setTimeout(() => {
        console.log('some');
        preload.css({display: 'none'});
        var keyword = this.value.toLowerCase();
        icon_txt_array.forEach((element, index) => {
            if (element.substring(0, keyword.length) === keyword) {
                var t_elem = document.querySelector('.spc_id_' + index);
                t_elem.style.display = 'flex';
            } else {
                var t_elem = document.querySelector('.spc_id_' + index);
                t_elem.style.display = 'none';
            }
        });
    }, 200);
});
var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
    keyboard: false
})

$('#show_icons').click(function() {
    myModal.show();
});
$('.icon').click(function() {
    let classes = $(this).find('i').attr('class');
    $('#icon').val(`<i class="${classes}"></i>`);
    $('#preview_icon').html(`<i class="${classes}"></i>`);
    myModal.hide();
});
// myModal.show();

let targ = document.getElementById('preview_icon');
function preview(Img) {
    let image = Img.files[0];
    let img_url = URL.createObjectURL(image);
    let img = document.createElement('img');
    img.src = img_url;
    targ.innerHTML = '';
    targ.append(img);
    // console.log(img);
}
</script>

@endpush
@endsection