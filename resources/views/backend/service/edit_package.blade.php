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
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Edit Package</h3>
                    <a href="{{ route('admin.service.packages', $package->service_id) }}" class="btn btn-info ml-auto"><i class="fas fa-angle-left"></i>&nbsp; Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.update_packages', $package) }}" class="form-row justify-content-center" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $package->name }}" placeholder="Name" required>
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
                                    {!! $package->icon !!}
                                </div>
                                <br>
                                <input type="hidden" name="icon" value="{{ $package->icon }}" id="icon">
                                
                                <button type="button" class="btn btn-block btn-info" id="show_icons">Select icon</button>
                                @error('icon')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">{{ $package->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-on-success">
                                    <input type="checkbox" name="status" class="custom-control-input" id="is_active" @if($package->status == 1) checked @endif>
                                    <label class="custom-control-label" for="is_active">Do You want to active this?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header icon_header">
                <div class="col-md-12">
                    <input id="icon_search" type="search" class="form-control mb-0" placeholder="Search Icon">
                </div>
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