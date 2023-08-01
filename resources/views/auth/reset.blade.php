
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thay đổi mật khẩu</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../../plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page"  style="    height: 80vh;">
<div class="login-box" style="width: 500px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Đổi mật khẩu</b> </a>
        </div>
        @include('_message')
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" >

                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="cpassword"  placeholder="Confirm Password">

                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-6 d-flex ">
                        <button type="submit" class="btn btn-primary btn-block align-items-center">Đổi mật khẩu</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>




        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('../../dist/js/main.js')}}"></script>

</body>
</html>
