@extends('backend.layout.master')

@section('content')
    
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Balance BD</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Messages</li>
          </ol>
        </div>
      </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="float-left">Contact message list</h4>
                      {{-- @if (Request::is('users'))

                      @else
                        <a href="{{ route('admin.create-user') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add New</a>    
                      @endif --}}
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control" id="search_field" placeholder="Search by email">
                                    <button class="btn btn-outline-secondary" type="button" id="search">Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th style="width: 50px;">#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 240px;">actions</th>
                            </tr>
                        </thead>
                        <tbody id="contact_list">
                            @foreach ($contacts as $key => $contact)
                            {{-- @dd($deposit->user_id) --}}
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->message}}</td>
                                <td>{{$contact->created_at}}</td>
                                @if ($contact->is_read == 0)
                                <td>
                                    {{-- <a class="btn btn-xs btn-danger btn-rounded"
                                    href="{{route('deposit.approve', $deposit->id)}}"> --}}
                                    <span class="top-0 start-100 badge bg-danger">
                                        New Message
                                    </span>
                                    </a>
                                </td>
                                @else
                                <td class=""><span class="btn-xs btn-success">Read</span></td>
                                @endif
                                <td>
                                    @if ($contact->is_read == 0)
                                        <button class="btn btn-primary btn-sm read" onclick="mark_as_read(this, '{{ route('admin.contact.mark_read', $contact->id) }}')">Mark as read</button>
                                    @endif
                                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="delete_msg(this, '{{ route('admin.contact.delete', $contact->id) }}')"><i class='far fa-times-circle'></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <br>
                    {{ $contacts->links() }} 
                  </div>
              </div>
        
          </div>
      </div>
    </div>
</section>

@push('css')
<link href="{{ url('public/backend/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
@endpush
@push('js')
<script src="{{ url('public/backend/plugins/toastr/toastr.min.js') }}"></script>
<script>
// contact_list
// search_field
// search
// _token
// _method
$('#search').click(function() {
    let search_field = $('#search_field').val();
    let contact_list = $('#contact_list');
    let url = "{{ route('admin.contact.search') }}";
    console.log(url);
    $.ajax({
        type: 'get',
        url: url,
        data: {
            email: search_field,
        },
        success: function(data) {
            contact_list.html(data);
        }
    });
});

let timeout;
$('#search_field').on('input', function() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        let search_field = $('#search_field').val();
        let contact_list = $('#contact_list');
        let url = "{{ route('admin.contact.search') }}";
        $.ajax({
            type: 'get',
            url: url,
            data: {
                email: search_field,
            },
            success: function(data) {
                contact_list.html(data);
            }
        });
    }, 500);
});
function delete_msg(self, url) {
    if (confirm('Are you sure to delete this message?')) {
        $.ajax({
            type: 'post',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function(data) {
                if (data.success) {
                    toastr.success(data.success);
                    $(self).parents('tr').remove();
                }
            }
        });
    }
}
function mark_as_read(self, url=null) {
    if (url) {
        $.ajax({
            type: 'post',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data.success) {
                    toastr.success(data.success);
                    $(self).parent().prev().html(`<span class="btn-xs btn-success">Read</span>`);
                    $(self).remove();
                }
            }
        });
    }
}

</script>
@endpush

@endsection

{{-- 
@push('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('backend/asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/asset/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush --}}