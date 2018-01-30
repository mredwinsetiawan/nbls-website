<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hibah</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">

    <link rel="stylesheet" href="/plugins/morris/morris.css">

    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">

    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link href="/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="/css/froala_editor.min.css">

    <link rel="stylesheet" href="/css/froala_style.min.css">


    @yield('style')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#!"><b>{{ $tenant->name }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input name="email" type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-7">
                    <a href="{{ route('register') }}" class="pull-left">Daftar Baru</a><br>
                    <a href="#" class="pull-left">Lupa password ?</a><br>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-info btn-block btn-flat pull-right">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->

        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/dist/js/app.min.js"></script>
<script src="/dist/js/demo.js"></script>
<script src="/js/parsley.min.js"></script>
<script src="/js/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script src="/plugins/jquery-datatable/jquery-datatable.js"></script>

<script src="/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">

    var baseUrl = "{{ url('/') }}";

</script>
<script src="/plugins/light-gallery/js/lightgallery-all.js"></script>

<script src="/js/image-gallery.js"></script>

<script src="/js/select2.min.js"></script>

<!-- <script type="text/javascript">
  $('.select2-multi').select2();
</script> -->

<!-- Include external JS libs. -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script src="/js/froala_editor.min.js"></script>
<!-- <script type="text/javascript" src="/floara/js/plugins/image.mi"></script> -->

<!-- Initialize the editor. -->
<script> $(function () {
        $('.text-editor').froalaEditor()
    }); </script>

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd'
    });
</script>
</body>
</html>
