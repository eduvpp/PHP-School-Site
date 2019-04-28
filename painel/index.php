<?php
include('../templates/conexao.php');
include('login/protege.php');

   $id = (isset($_GET['id']) ? $_GET['id'] : "");
   $acao = (isset($_REQUEST['acao']) ? $_REQUEST['acao']: "");
   $pg = (isset($_REQUEST['pg'])?$_REQUEST['pg']:'inicio');
   $mod = (isset($_REQUEST['mod'])?$_REQUEST['mod']:'sistema');
   date_default_timezone_set('America/Sao_Paulo');
   
   
   $email=$_SESSION['email'];
   


    $consulta = $conexao->prepare("SELECT * FROM tb_usuarios WHERE email = :email ");
	$consulta->bindValue(":email", $email);
	
	
	$consulta->execute();
	
	$dados = $consulta->fetch(PDO::FETCH_OBJ);
	$_SESSION['id_usuario']=$dados->id;
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Administrativo</title>
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="../assets/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/css/ionicons.min.css">
   <link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
  <!-- ICONS FONT AWESOME -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.2/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/main.css">
  <link rel="stylesheet" type="text/css" href=" ../assets/css/custom.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
		page. However, you can choose any other skin. Make sure you
		apply the skin class to the body tag so the changes take effect.
	  -->
	  <link rel="stylesheet" href="../assets/css/_all-skins.min.css">

	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">

	  <!-- Logo -->
	  <a href="?pg=inicio" class="logo">
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>CMS</b></span>
	  </a>

	  <!-- Header Navbar -->
	  <nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		 <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		 </a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu" >
		  <ul class="nav navbar-nav">
			<!-- User Account Menu -->
			<li class="dropdown user user-menu">
			  <!-- Menu Toggle Button -->
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<!-- The user image in the navbar-->
				<img src="<?php if($dados->img==null){
					echo '../assets/img/perfil/perfil.png';}else{echo '../assets/img/perfil/'.$dados->img
					;}?>" class="user-image" alt="User Image">
				<!-- hidden-xs hides the username on small devices so only the image appears. -->
				<span class="hidden-xs"><?php echo $dados->nome; ?></span>
			  </a>
			  <ul class="dropdown-menu">
				<!-- The user image in the menu -->
				<li class="user-header">
				  <img src="<?php if($dados->img==null){
					echo '../assets/img/perfil/perfil.png';}else{echo '../assets/img/perfil/'.$dados->img
					;}?>" class="img-circle" alt="User Image">

				  <p>
					<?php echo $dados->nome; ?> - Administrador
					<small>Função</small>
				  </p>
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
				  <div class="pull-right">
					<a href="login/logout.php" class="btn btn-danger btn-flat">Sair</a>
				  </div>
				</li>
			  </ul>
			</li>
		  </ul>
		</div>
	  </nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar" >
	  <!-- sidebar: style can be found in sidebar.less -->
	  <section class="sidebar" >

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel" >
		  <div class="pull-left image">
			<img src="<?php if($dados->img==null){
					echo '../assets/img/perfil/perfil.png';}else{echo '../assets/img/perfil/'.$dados->img
					;}?>" class="img-circle" alt="User Image">
		  </div>
		  <div class="pull-left info">
			<p>
				<?php  
				echo $dados->nome;
				?>
			</p>
			<!-- Status -->
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  </div>
		</div>

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree"   >
		  <li class="header">Navegar</li>
		  <!-- Optionally, you can add icons to the links -->
		  <li class="<?php echo ($pg=='inicio') ? 'active' : '';?>"><a href="?pg=inicio"><i class="fa fa-home"></i> <span>Início</span></a></li>
		  <li class="treeview <?php echo ($pg=='usuarios') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-users"></i> <span>Usuários</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=usuarios&acao=adicionar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=usuarios&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>

		  <li class="header">Página Inicial</li>

		  <li class="<?php echo ($pg=='logo') ? 'active' : '';?>"><a href="?pg=logo&acao=ver"><i class="fa fa-image"></i> <span>Logo</span></a></li> 
		  <li class="<?php echo ($pg=='redesociais') ? 'active' : '';?>"><a href="?pg=redesociais&acao=ver"><i class="fa fa-rss"></i> <span>Redes Sociais</span></a></li> 
		  <li class="treeview <?php echo ($pg=='slides') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-calendar"></i> <span>Slider</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=slides&acao=ver"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=slides&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="<?php echo ($pg=='indice') ? 'active' : '';?>"><a href="?pg=indice&acao=ver"><i class="fa fa-line-chart"></i> <span>Índice</span></a></li>
		  <li class="treeview <?php echo ($pg=='eventos') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-calendar"></i> <span>Eventos</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=eventos&acao=adicionar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=eventos&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="<?php echo ($pg=='video') ? 'active' : '';?>"><a href="?pg=video&acao=ver"><i class="fab fa-youtube"></i> <span>Vídeo</span></a></li>

		  <li class="header">Institucional</li>

		  <li class="<?php echo ($pg=='sobre') ? 'active' : '';?>"><a href="?pg=sobre&acao=ver"><i class="fa fa-info"></i> <span>Sobre</span></a></li> 
		  <li class="treeview <?php echo ($pg=='cursos') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-book"></i> <span>Cursos</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=cursos&acao=adicionar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=cursos&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($pg=='galeria') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-image"></i> <span>Galeria</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=galeria&acao=cadastrar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=galeria&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($pg=='links_uteis') ? 'active' : '';?>">
				<a href="#"><i class="fas fa-external-link-square-alt"></i> <span>Links Úteis</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=links_uteis&acao=adicionar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=links_uteis&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($pg=='downloads') ? 'active' : '';?>">
				<a href="#"><i class="fas fa-download"></i> <span>Downloads</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=downloads&acao=adicionar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=downloads&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="<?php echo ($pg=='blog_lei') ? 'active' : '';?>"><a href="?pg=blog_lei&acao=ver"><i class="fab fa-blogger-b"></i> <span>Blog do Lei</span></a></li>

		   <li class="header">Processo seletivo</li>

		  <li class="treeview <?php echo ($acao=='adicionar_informacoes' OR $acao=='listar_informacoes') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-info"></i> <span>Informações Importantes</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_informacoes"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_informacoes"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($acao=='adicionar_cursos' OR $acao=='listar_cursos') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-book"></i> <span>Cursos</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_cursos"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_cursos"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($acao=='adicionar_inscricoes' OR $acao=='listar_inscricoes') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-check"></i> <span>Inscrições</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_inscricoes"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_inscricoes"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($acao=='adicionar_resultado' OR $acao=='listar_resultado') ? 'active' : '';?>">
				<a href="#"><i class="fas fa-tasks"></i> <span>Resultado</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_resultado"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_resultado"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($acao=='adicionar_alinhamento' OR $acao=='listar_alinhamento') ? 'active' : '';?>">
				<a href="#"><i class="fas fa-users"></i> <span>Reunião de alinhamento</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_alinhamento"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_alinhamento"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="treeview <?php echo ($acao=='adicionar_matricula' OR $acao=='listar_matricula') ? 'active' : '';?>">
				<a href="#"><i class="fa fa-check"></i> <span>Matrículas</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=processo_seletivo&acao=adicionar_matricula"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=processo_seletivo&acao=listar_matricula"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  	<li class="<?php echo ($acao=='ver_horario') ? 'active' : '';?>">
		  		<a href="?pg=processo_seletivo&acao=ver_horario">
		  			<i class="fa fa-fw fa-hourglass"></i> 
		  			<span>Horario</span>
		  		</a>
		  	</li>



		  <li class="header">Outros</li>

		  <li class="treeview <?php echo ($pg=='blog') ? 'active' : '';?>">
				<a href="#"><i class="fa  fa-newspaper-o"></i> <span>Blog</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li><a href="?pg=blog&acao=cadastrar"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar</a></li>
				  <li><a href="?pg=blog&acao=listar"><i class="fa fa-list" aria-hidden="true"></i>Listar</a></li>
				</ul>
		  </li>
		  <li class="<?php echo ($pg=='contato') ? 'active' : '';?>"><a href="?pg=contato&acao=ver"><i class="fas fa-phone fa-rotate-90"></i> <span>Contato</span></a></li>

		</ul>
		<!-- /.sidebar-menu -->
	  </section>
	  <!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?php
			if (!empty($pg)) {
				if (file_exists("paginas/$pg".".php")) {
					include("paginas/$pg".".php");
				}else{
					include("paginas/404.php");
				}
			}
		?>
	</div>
	<!-- /.content-wrapper -->

	<!-- Main Footer -->
	<footer class="main-footer">
	  <strong>Copyright &copy; 2016 <a href="#">EEEP</a>.</strong> Todos os direitos reservados.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.1.1 -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/validator.js"></script>
<script src="../assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>




<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.js"></script>
<script src="../assets/js/bootstrap-toggle.min.js"></script>
<script src="../assets/js/fastclick.js"></script>
<script src="../assets/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script type="text/javascript">
   window.onload = function()  {
     CKEDITOR.replace( 'editor1' );
   };
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

   </body>
   </html>
