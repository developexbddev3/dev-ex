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
                    <h3 class="card-title">Menu List</h3>
                    <a href="#" class="btn btn-info ml-auto" data-toggle="modal" data-target="#menuModal"><i class="fas fa-plus"></i>&nbsp; Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if(count($menus) > 0)
                        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>S.N.</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="table-body">
                           
                          </tbody>
                        </table>
                        @else
                          <h6 class="text-center">No Menu found!</h6>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @include('backend.menu.modal')
@endsection
@push('js')


<script>
    getData();
    //Get Data
    let menues = false;
    function getData(){
        $.ajax({
            url:"{{route('admin.menus.get-menus')}}",
            type:'GET',
            success:function(data){
                menues = data;
                var html  = '';
                var Key = 0;
                let url = "{{url('')}}";
                data.forEach((element) => {
                    var a= 12;
                    Key++
                    html += `
                         <tr>
                             <td>${Key}</td>
                             <td>${element.name}</td>
                             <td>${element.description}</td>
                             <td>
                                 <a href="${url}/admin/menu/${element.id}/builder" class="btn btn-success"><i class="fa fa-list"></i></a>
                                 <a onClick="editData(${element.id})" id="editBtn" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                 <a data-id="${element.id}" id="deleteBtn" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
                    `;
                });
                $('#table-body').html(html);
            }

        });
    }

    //Edit Data
    function editData(id){

        $('#data_id').val(id);

        if (menues) {
            let data = menues.filter((item) => {
                return item.id == id;
            })[0];


            $('#edit-name').val(data.name);
            $('#edit-description').val(data.description);
        }
        $('#editModal').modal('show');
        // $('#modal-title').text('Edit Data');
    }


    $(document).on('click',"#deleteBtn",function(){
        var id = $(this).data("id");
        var $this  =  $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                    url: '/admin/menus/delete/'+id,
                    type:"GET",
                    data: {
                            id : id
                        },
                    success: function (data)
                        {   
                            if(data.error){
                                toastr.error(data.error);
                            }
                            else{
                                getData();
                                toastr.success(data.message);
                                $this.closest('tr').remove();
                            }
                          

                        },

                });
        }
        })
    });

    //Update Data
    $(document).on('click','#update',function(e){
        e.preventDefault();
        var id = $('#data_id').val();
        var name = $('#edit-name').val();
        var description  = $('#edit-description').val();

        $.ajax({

            url: "{{ route('admin.menus.update',"id")}}",
            type: "POST",
            data: {
                _token: '{{csrf_token()}}',
                id:id,
                name:name,
                description :description,
                },
            success:function(data){
                // console.log(data);
                toastr.success(data.message);
                getData();
                $('#editModal').modal('hide');
                $('#name').val('');
                $('#description').val('');
            },
            error:function (response) {
                $('#err-edit-name').text(response.responseJSON.errors.name);
                $('#err-edit-description').text(response.responseJSON.errors.description);
            }
            
            });
    }); 

   
</script>
@endpush