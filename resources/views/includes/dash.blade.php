<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Silcom S.A | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  @include('includes.styles')
  {{-- <style>
    .login-fondo{
        background-image: url('assets/img/loggin1.jpg');
        background-size:cover;
        /* background-position: center; */
        align: center:

    }
</style> --}}
</head>

<body class="hold-transition sidebar-mini  ">
<!-- Site wrapper -->
<div class="wrapper ">
      <!-- Navbar -->
    @include('includes.navbar')
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      @include('includes.sidebar')

      @yield('contenido')

      <!-- Content Wrapper. Contains page content -->
    
      <!-- /.content-wrapper -->

    @include('includes.footer')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

@include('includes.scripts') 
</body>
</html>
