<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}} | LogIn </title>

    <!-- Bootstrap -->
    <link href="{{asset('public/backend_theme_assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/backend_theme_assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/backend_theme_assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('public/backend_theme_assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/backend_theme_assets/build/css/custom.min.css')}}" rel="stylesheet">
  </head>


  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
              <h4>Error !!</h4>
                @error('password')
                      {{ $message }}
                    @enderror
                    <br />
                    @error('email')
                      {{ $message }}
                  @enderror  
            </div>
           @endif

           @if(session()->has('successMsg'))
           <div class="alert alert-success">
              {{session()->get('successMsg')}}
           </div>
           @endif
          <section class="login_content" style="background:#fff; padding:23px; box-shadow:1px 4px 20px 6px; border-radius:4px;">
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
              <h1>Log In</h1>
          
              <div>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email Id" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
             


              <div>
                <button type="submit" class="btn btn-success" style="width:100%;" >Log in</button>
            </div>
            
            <div class="clearfix"></div>

            <br />
            <div>
               {{--  <h1> <img src="{{asset('public/themes_assets/logo/logo.png')}}" width="47" /></h1> --}}
                <h1>{{env('APP_NAME')}}</h1>
                <p>© {{date('Y')}} All Rights Reserved.</p>
            </div>
            
            <div class="separator">
                @if(Route::has('register'))
                    <p class="change_link pull-left">
                      
                       <!-- <a href="{{route('register')}}" class="to_register"> Create Account </a>-->
                    
                    </p>
                @endif
                @if(Route::has('password.request'))
                    <p class="change_link pull-right">
                        <a href="{{ route('password.request') }}" class="btn btn-info btn-xs">Lost your password?</a>
                    </p>
                @endif
              </div>
              <div class="clearfix"></div>
            

            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
