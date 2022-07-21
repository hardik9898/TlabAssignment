
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title> {{env('APP_NAME')}} @yield('title')</title>

    @include('backend.layouts.partials.header_script')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        @include('backend.layouts.partials.sidebar')
        @include('backend.layouts.partials.top_navigation')
        
        @yield('content')
        
        @include('backend.layouts.partials.footer')
       
      </div>
    </div>
   
     @include('backend.layouts.partials.footer_script')

  </body>
</html>