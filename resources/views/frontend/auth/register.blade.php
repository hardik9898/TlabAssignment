@extends('frontend.layouts.app')
@section('title','Register')
@section('front_main_content')
          <!-- About section-->
          <section >
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-4">
                        <h2 class="mb-4">Therapist Register</h2>
                        <form action="{{route('register')}}" method="post">
                            @if(count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color:red;">{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                            @csrf
                            <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="mb-3">
                                          <label  class="form-label">Name:</label>
                                          <input type="text" class="form-control name" value="{{old('name')}}" placeholder="Enter Your Name" name="name"  id="name">
                                      </div>
                                  </div>  

                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Email:</label>
                                        <input type="text" class="form-control email" value="{{old('email')}}" placeholder="Enter Your Email" name="email"  id="email">
                                    </div>
                                  </div>  
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Phone:</label>
                                        <input type="text" class="form-control phone" value="{{old('phone')}}"  placeholder="Enter Your Phone" name="phone"  id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Password:</label>
                                        <input type="password" class="form-control password"  placeholder="Enter Your Password" name="password"  id="password">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Confirm Password:</label>
                                        <input type="password" class="form-control password_confirmation"   placeholder="Enter Confirm Password" name="password_confirmation"  id="password_confirmation">
                                    </div>
                                </div>
                            </div>    


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Country:</label>
                                        <select class="form-control country_id_select2" name="country_id"  id="country_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>  

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label  class="form-label">State:</label>
                                        <select class="form-control state_id_select2" name="state_id"  id="state_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>  
                           </div>

                           

                            <div class="mb-3">
                                <label  class="form-label">Services:</label>
                                <select class="form-control service_id_select2" multiple name="service_id[]"  id="service_id">
                                    <option value=""></option>
                                </select>
                               
                            </div>

                            
                            <button type="submit" class="btn btn-primary">Register</button>
                          </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('frontend_extra_script')
<script>
    $(document).ready(function(){
    
      $('.country_id_select2').select2({
            placeholder: 'Select Country',
            allowClear: true,
            ajax: {
                url: '{{route('get.country.ajax.data')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results: data
                    };
            },
            cache: true
        }
    });

    $('.state_id_select2').select2({
            placeholder: 'Select State',
            allowClear: true,
            ajax: {
                url: '{{route('get.state.ajax.data')}}',
                data: function (params) {
              var query = {
                    q: params.term,
                    country_id:$('#country_id').val()
                }
                return query;
                },
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results: data
                    };
            },
            cache: true
        }
    });

    $('.service_id_select2').select2({
        placeholder: 'Select Service',
        allowClear: true,
        ajax: {
            url: '{{route('get.services.ajax.data')}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                  results: data
                };
            },
            cache: true
          }
    });


    $("body").on('change',".country_id",function(){
            $('.state_id').val('');
    });
});
</script>
@endsection