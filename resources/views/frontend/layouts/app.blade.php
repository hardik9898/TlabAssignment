<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{env('APP_NAME')}} | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('public/frontend_theme_assets/css/styles.css')}}" rel="stylesheet" />
         <!-- select 2-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />

        <style>
            header,section{
                padding-top: 4rem;
                padding-bottom: 2rem;
            }
        </style>
    </head>
    <body id="page-top">

        <!-- header-->
        @include('frontend.layouts.partials.header')
        <!-- header-->

        <!-- content -->
        @yield('front_main_content')
        <!-- content -->
        
        <!-- footer-->
        @include('frontend.layouts.partials.footer')
        <!-- footer-->
    </body>
</html>
