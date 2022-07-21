 <!-- Bootstrap -->
 <link href="{{asset('public/backend_theme_assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="{{asset('public/backend_theme_assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
 <!-- NProgress -->
 <link href="{{asset('public/backend_theme_assets/vendors/nprogress/nprogress.css')}}   " rel="stylesheet">

 <!-- datatable -->
 <link href="{{asset('public/backend_theme_assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/backend_theme_assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/backend_theme_assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/backend_theme_assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

 <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.bootstrap.min.css"  />
 <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.dataTables.min.css"  />

 <!-- select 2-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />

<!-- Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" integrity="sha256-bLNUHzSMEvxBhoysBE7EXYlIrmo7+n7F4oJra1IgOaM=" crossorigin="anonymous" />

 <!-- Custom Theme Style -->
 <link href="{{asset('public/backend_theme_assets/build/css/custom.min.css')}}" rel="stylesheet">

 <style>
 
 .error{
     color:red;
 }

 .select2{
     width: 100% !important;
 }

 .paginate_button a{
     color:#2A3F54 !important;

 } 

  .buttons-colvis{
    padding:4px 12px !important;
  }

 #loading{
    background: url("{{asset('public/loader/loader.gif')}}") no-repeat center center rgba(0,0,0,0.4);
    background-size:5%;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
    display:block;
  }

  .table-responsive{
    overflow-x:hidden !important;
  }
 </style>