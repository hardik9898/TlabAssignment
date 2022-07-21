 <!-- jQuery -->
 <script src="{{asset('public/backend_theme_assets/vendors/jquery/dist/jquery.min.js')}}"></script>
 <!-- Bootstrap -->
<script src="{{asset('public/backend_theme_assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{asset('public/backend_theme_assets/vendors/fastclick/lib/fastclick.js')}}"></script>
 <!-- NProgress -->
 <script src="{{asset('public/backend_theme_assets/vendors/nprogress/nprogress.js')}}"></script>

<!-- DateJS -->
<script src="{{ asset('public/backend_theme_assets/vendors/DateJS/build/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('public/backend_theme_assets/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('public/backend_theme_assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Datatables -->
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  
  <script src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
  
  <script src="{{asset('public/backend_theme_assets/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('public/backend_theme_assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

    <!-- Select 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js" integrity="sha256-d/edyIFneUo3SvmaFnf96hRcVBcyaOy96iMkPez1kaU=" crossorigin="anonymous"></script>
    <!-- Validator -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

    <!-- Sweat Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/backend_theme_assets/build/js/custom.min.js')}}"></script>


    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ajaxStart(function(){
            $("#loading").show();
        });

        $(document).ajaxComplete(function(){
            $("#loading").hide();
        });
      
        $(".select2").select2({
            placeholder: "Select a Option",
            allowClear: true
        });

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });
   
    $("#loading").hide();
  
    </script>
    
@yield('footer_extra_script')
