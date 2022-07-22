@extends('backend.layouts.app')
@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
            </div>

            <div class="title_right">
            </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Therapist List</h2>
                  <ul class="nav navbar-right panel_toolbox">
                   
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                      <!--table start -->
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box">
                                <table id="serverSideDatatable" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>Sr No</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Country</th>
                                      <th>State</th>
                                      <th>Services</th>
                                      <th>Admin Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                              </table>
                          </div>
                       </div>
                     </div>
                      <!--table end -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->



  <div class="modal fade bs-example-modal-lg" id="AddEditModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><span class="modal_action_title"></span> Service</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frm" class="form-horizontal form-label-left" >
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="id" id="id" />

     

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <select id="admin_status" name="admin_status" class="admin_status select2 form-control">
                    <option value=""></option>
                    <option value="1">Accept</option>
                    <option value="0">Reject</option>
                </select>
                <label id="admin_status-error" class="error" for="admin_status"></label>
              </div>
          </div>

            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="reset" class="btn btn-primary btn-sm">reset</button>
                <button type="submit" class="btn btn-success btn-submit btn-sm">Save</button>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          
        </div>

      </div>
    </div>
  </div>
@endsection
@section('footer_extra_script')
<script>
  $(document).ready(function(){
  

    $('#serverSideDatatable').DataTable({
        processing: true,
        serverSide: true, 
        ajax: "{{ route('therapist.list.getdatatable') }}",
        columns: [
                { data: 'actions' },  
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'country.nicename' },
                { data: 'state.name' },
                { data: 'therapist_detail_service.service',orderable: false },
                { data: 'admin_status' },
              ],
              "columnDefs": [ {
                "targets": [0,1],
                "orderable": false
              }],
        });

      
    
      $("#frm").validate({
         ignore: ".ignore",
          rules: {
            admin_status:"required",
          },
          messages: {
            admin_status:"Please Select admin_status",
          }
      });
  

  
      
      $("body").on("click",".btn-edit",function(){
  
            $('.modal_action_title').text('Edit');
            $('#frm :input[type="submit"]').prop('disabled',false);
           
            $("#action").val('update');
            $(".btn-submit").val('Update');
            var id = $(this).data('id');
  
            $("#id").val(id);
            $.ajax({
                url:'{{url('admin/therapist-list')}}/'+id+'/edit',
                type:'GET',
                dataType:'JSON',
                data:{
                },
                success:function(result){
                  
                  $('#id').val(result['id']);
                
                  $('#frm #admin_status').val(result['admin_status']).trigger('change.select2');
                  $('#AddEditModal').modal('show');
                
                } 
         }); 
      }); 

      

    $("body").on("click",".btn-submit",function(e){
        e.preventDefault();
         
        if($("#frm").valid()){
          
       

          $('#frm :input[type="submit"]').prop('disabled',true);
          var form_data = new FormData();  

          var action = $("#action").val();
          var id = $("#id").val();

          if(action=='insert'){ 
            var url = '{{url("admin/therapist-list")}}'; 
          }else{
            var url = '{{url("admin/therapist-list")}}/'+id; 
            form_data.append('_method','PUT');
          }
       
       
      
          var admin_status  = $('#admin_status').val();
          form_data.append('admin_status',admin_status);
        

        $.ajax({
            url:url,
            type:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:form_data,
            dataType:'json',
            success:function(result){
              if(result['success']==1){

                $("#AddEditModal").modal('hide');
                
                swal(" SuccessFully Saved!!", {
                  icon: "success",
                  type: "info",
                });
  
                $('#serverSideDatatable').DataTable().ajax.reload();
  
              }else{
                swal(" Something Wrong!!", {
                  icon: "danger",
                });
              }
            }
          });  
        }
    });
  
  
  

   });
  </script>
@endsection