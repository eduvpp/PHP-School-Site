<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CGSystem | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/css/vendor/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../assets/css/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color: #181c23">
<div class="login-box">
  <div class="login-logo" >
    <img src="../../assets/img/logol.png" style="height: 35px;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php 
      session_start();
       if (isset($_SESSION['block'])) {
        if ($_SESSION['block']==0) {
          echo '<br>
                 <div class="alert alert-danger" id="danger-alert">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <strong>Usuário bloqueado!</strong><a href="" class="alert-link"></a>.
                 </div>';
        }
}?>
    <p class="login-box-msg">Entre para iniciar sua sessão!</p>

    <form action="verificador.php" method="post" data-toggle="validator" role="form">
      <div class="form-group has-feedback">
          <div>
                <input type="email" name="email" class="form-control" maxlength="100" placeholder="Ex.: usuario@gmail.com" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <div class="help-block with-errors"></div>
          </div>
      </div>
      <div class="form-group has-feedback">
          <div>
                <input type="password" name="senha" class="form-control" maxlength="100" placeholder="Senha" required autofocus>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="help-block with-errors"></div>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-8">
            
          </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" >Entrar</button>
        </div>
        
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validator.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../../assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../assets/js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

