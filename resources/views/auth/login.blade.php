<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Silcom | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<style>
    .login-fondo{
        background-image: url('assets/img/loggin2.jpg');
        background-size:cover;
        background-position: center;

    }
</style>
<style>
  .ts{
    background-color: transparent;


  }
</style>



</head>
<body class="hold-transition login-page login-fondo">
<div class="login-box ts">
  {{-- <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</antigulo>
  </div> --}}
  <!-- /.login-logo -->
  <div  class="text-center ">
    <div class="card-body login-card-body">
      <div>
        <img style="height:130px; width:260px" src="{{asset('assets/img/Logo.jpg')}}" alt="Logo">
      </div>

      <p class="login-box-msg">Silcom SAS</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  name="password"  type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-dark">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="row">
              <div class="col-12">
                 <button type="submit" dusk="login-button" class="btn  btn-dark btn-block">Iniciar Sesion</button>
              </div>
          </div>
          
          <!-- /.col -->
        
      </form>

    
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="{{ route('password.request') }}">As olvidado tu contraseña</a>
      </p> --}}
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>  
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>

</body>
</html>
