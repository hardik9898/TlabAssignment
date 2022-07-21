@extends('backend.layouts.app')
@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
         
          <div class="clearfix"></div>

          <div class="row"> 
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Change Password</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="ChangePasswordForm" method="post" action="{{route('changepassword.update')}}"  class="form-horizontal form-label-left">
                    @csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Current Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="c_psw" name="c_psw" class="form-control c_psw">
                              @error('c_psw')
                                <span class="error">{{ $message }}</span>
                              @enderror
                            @if(session()->get('ErrorMsg'))
                                <span class="error">{{ session()->get('ErrorMsg') }}</span>
                            @endif
                        </div>
                    </div>
                    
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">New Password <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="new_psw" name="new_psw"  class="form-control new_psw">
                        @error('new_psw')
                          <span class="error">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
										<div class="item form-group">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Confirm New Password <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 ">
                            <input id="c_new_psw" class="form-control c_new_psw" type="password" name="c_new_psw">
                            @error('c_new_psw')
                            <span class="error">{{ $message }}</span>
                            @enderror
                          </div>
										</div>
						
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-warning btn-sm" type="button">Reset</button>
												<button type="submit" class="btn btn-success btn-save btn-sm">Save</button>
											</div>
										</div>

									</form>


                </div> <!-- end xcontent -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
@endsection
@section('footer_extra_script')
<script>
  $("#ChangePasswordForm").on('submit',function(e){
    $('.btn-save').attr('disabled','disabled');
  }); 
</script>
    
@endsection