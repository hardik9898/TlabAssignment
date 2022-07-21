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
                  <h2>Services</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li> <button class="btn btn-primary btn-add btn-sm" ><i class="fa fa-plus"></i> Add</button>
                    </li>
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
                                      <th>Service Name</th>
                                      <th>Descriptions</th>
                                      <th>Status</th>
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
              <label class="col-form-label col-md-3 col-sm-3 label-align">Service Name <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="service_name" name="service_name" placeholder="Service Name" class="service_name form-control">
              </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Descriptions <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <textarea id="descriptions" name="descriptions" placeholder="Descriptions" class="descriptions form-control"></textarea>
                </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <select id="status" name="status" class="status select2 form-control">
                    <option value=""></option>
                    <option value="1">Active</option>
                    <option value="0">De-Active</option>
                </select>
                <label id="status-error" class="error" for="status"></label>
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
        ajax: "{{ route('services.getdatatable') }}",
        columns: [
                { data: 'actions' },  
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'service_name' },
                { data: 'descriptions' },
                { data: 'status' },
              ],
              "columnDefs": [ {
                "targets": [0,1],
                "orderable": false
              }],
        });

      
    
      $("#frm").validate({
         ignore: ".ignore",
          rules: {
            service_name:"required",
            descriptions:"required",
            status:"required",
          },
          messages: {
            service_name:"Please Enter Service Name",
            descriptions:"Please Enter Descriptions",
            status:"Please Select Status",
          }
      });
  
      $("body").on("click",".btn-add",function(){
            $('.modal_action_title').text('Add');
            $('#frm [type="submit"]').prop('disabled',false);
           
            $("#action").val('insert');
            $("#id").val('');
            $('#frm #service_name').val('');
            $('#frm #descriptions').val('');
            $('#frm #status').val('').trigger('change.select2');
            $('#AddEditModal').modal('show');
      }); 
  
      
      $("body").on("click",".btn-edit",function(){
  
            $('.modal_action_title').text('Edit');
            $('#frm :input[type="submit"]').prop('disabled',false);
           
            $("#action").val('update');
            $(".btn-submit").val('Update');
            var id = $(this).data('id');
  
            $("#id").val(id);
            $.ajax({
                url:'{{url('admin/services')}}/'+id+'/edit',
                type:'GET',
                dataType:'JSON',
                data:{
                },
                success:function(result){
                  
                  $('#id').val(result['id']);
                  $('#frm #service_name').val(result['service_name']);
                  $('#frm #descriptions').val(result['descriptions']);
                  $('#frm #status').val(result['status']).trigger('change.select2');
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
            var url = '{{url("admin/services")}}'; 
          }else{
            var url = '{{url("admin/services")}}/'+id; 
            form_data.append('_method','PUT');
          }
       
       
          var service_name  = $('#service_name').val();
          var descriptions  = $('#descriptions').val();
          var status        = $('#status').val();
          

         
          form_data.append('service_name',service_name);
          form_data.append('descriptions',descriptions);
          form_data.append('status',status);
        

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
  
  
    $('body').on('click','.btn-delete',function(){
           var id =  $(this).data('id');
           var token = $(this).data('token');
           swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                    $.ajax({
                      url:'{{url('admin/services')}}/'+id,
                      type:'POST',
                      data:{
                        _method:'DELETE',
                        id:id,
                      },
                      dataType:'json',
                      success:function(result)
                      {
                        if(result['success']==1){
                            swal(" SuccessFully Deleted!!", {
                              icon: "success",
                            });
                          $('#serverSideDatatable').DataTable().ajax.reload();
                        }else{
                          swal("Something Wrong! Please Check it may Used In others");
                        }              
                      }
                });     
            } else {
              swal("This Items safe!");
            }
          });
          
        });

   });
  </script>
@endsection