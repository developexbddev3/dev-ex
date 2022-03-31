<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="label" id="name" class="form-control">
              <small class="text-danger" id="err-name"></small>
          </div>
          <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="" id="description" cols="15" rows="5"></textarea>
              <small class="text-danger" id="err-description"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="" id="save" class="btn btn-primary">Save</a>
        </div>
      </div>
    </div>
  </div>

  {{-- //Edit MOdal --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input type="hidden" id="data_id">
        <div class="modal-body">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="label" id="edit-name" class="form-control">
              <small class="text-danger" id="err-edit-name"></small>
          </div>
          <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="" id="edit-description" cols="15" rows="5"></textarea>
              <small class="text-danger" id="err-edit-description"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="" id="update" class="btn btn-primary">Update</a>
        </div>
      </div>
    </div>
  </div>

  @push('js')
 <script>
    $(document).ready(function(){
        $('#save').on('click',function(e){
            e.preventDefault();

            var name = $('#name').val();
            var description  = $('#description').val();

            $('#name').removeClass('is-invalid');
            $('#description').removeClass('is-invalid');

            if (!name){
                $('#name').addClass('is-invalid');
            }
            if (!description){
                $('#description').addClass('is-invalid');
            }

            $('#err-name').html('');
            $('#err-description').html('');

            $.ajax({

                url: "{{ route('admin.menus.store')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    name:name,
                    description :description,
                    },
                success:function(data){
                       getData();
                    $('#menuModal').modal('hide');
                    $('#name').val('');
                    $('#description').val('');
                },
                error:function (response) {
                    $('#err-name').text(response.responseJSON.errors.name);
                    $('#err-description').text(response.responseJSON.errors.description);
                }
                 
            });

        });

        
    });    
 </script>   
@endpush