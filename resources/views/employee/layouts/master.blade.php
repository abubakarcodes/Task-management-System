<!DOCTYPE html>
 <html lang="">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  
   <title>Task App</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
   <!-- Font Awesome -->
 <!--   <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"> -->
   <!-- Ionicons -->
   <link rel="stylesheet" href="{{asset('assets/css/ionic.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('assets/css/admin.min.css')}}"> 
   <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{asset('assets/css/all-skin.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}">
    <!-- jQuery 3 -->
 <script src="{{asset('assets/js/jquery.min.js')}}"></script>
 
 
   
 
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
 
   <!-- Google Font -->
   <link rel="stylesheet" href="{{asset('assets/css/google-font.min.css')}}">
 </head>
 <!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
 <body class="hold-transition skin-blue sidebar-mini">
 <!-- Site wrapper -->
 <div class="wrapper">
 
 
  @include('employee.layouts.inc.navbar')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   
 
 @include('employee.layouts.inc.sidebar')
  <!-- =============================================== -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      @yield('content')
    </section> 
  </div> <!-- content-wrapper -->
  

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy;  <a href="">{{date('Y')}}</a>.</strong> All rights
    reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



 

 <!-- Bootstrap 3.3.7 -->
 <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
 <!-- SlimScroll -->
 <script src="{{asset('assets/js/slim.scroll.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{asset('assets/js/fast-click.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('assets/js/admin.min.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{asset('assets/js/demo.js')}}"></script>
 
 <!-- Sweet Alert -->
   <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
 
 
   
   <script src="{{asset('assets/js/moment.js')}}"></script>
     <script src="{{asset('assets/js/daterangepicker.js')}}"></script>
     <link rel="stylesheet" href="{{asset('assets/css/daterangepicker.css')}}">
 
     <script src="{{asset('assets/js/timepicker.js')}}"></script>
   
     <script src="{{asset('assets/js/datepicker.min.js')}}"></script>
     <link rel="stylesheet" href="{{asset('assets/css/datepicker.min.css')}}">
 
     <script src="{{asset('assets/js/select2.min.js')}}"></script>
     
     <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/admin-select2.min.css')}}">
 
 
     <script src="{{asset('assets/js/tinymce.min.js')}}"></script>
 
     <script type="text/javascript">
         tinymce.init({
         theme: "modern",
         mode : "specific_textareas",
         editor_selector : "mceEditor",
         plugins: [
             "advlist autolink lists link image charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime media nonbreaking save table contextmenu directionality",
             "emoticons template paste textcolor colorpicker textpattern imagetools moxiemanager",
              "insertdatetime media table contextmenu paste jbimages"
         ],
       
       relative_urls : false,
       remove_script_host : false,
       convert_urls : true,
       document_base_url : "{{url('/')}}",
       
         image_advtab: true,
         templates: [
             {title: 'Test template 1', content: 'Test 1'},
             {title: 'Test template 2', content: 'Test 2'}
         ]
     });
 
     var g_readTerms = false;
       
 
 
     </script>
 
     
     
   
 
   <script src="{{asset('assets/js/main.js')}}"></script>
 
 
 
 <style>
   .content {
       min-height: 250px;
       padding: 15px;
       margin-right: auto;
       margin-left: auto;
       padding-left: 25px;
       padding-right: 25px;
       padding-top: 25px;
           padding-bottom: 100px;
   }
 
 </style>
 
 
   <script type="text/javascript">
     var style = '{{ asset('assets/css/style.css') }}?'+Math.random();;
   </script>
 
   <script type="text/javascript">
     document.write('<link href="'+style+'" rel="stylesheet">');
   </script>
  
 
 </body>
 </html>
 
 
 