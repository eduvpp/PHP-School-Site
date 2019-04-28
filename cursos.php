<?php
	$title = "Cursos";
	include("templates/menu.php");
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<section class="breadcrumb-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?= URL;?>">Início</a></li>
					<li class="active">Cursos</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="cursos">
	<div class="container">
		<div class="row">           
			<div class="col-md-12 title">
				<h1 class="text-left">Cursos</h1>
			</div>
		</div>
		<?php  
							$consulta = $conexao->prepare("SELECT * FROM tb_cursos");
							$consulta->execute();
							$i=1;
							while ($dados=$consulta->fetch(PDO::FETCH_ASSOC)) {
					 ?>
		<div class="row">
			<div class="col-md-12">

				<div class="panel-group" id="accordion " role="tablist" aria-multiselectable="true">
					
					<div class="panel bs-callout" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $dados['curso'] ?>" aria-expanded="true" aria-controls="collapseOne"><?php  echo $dados['curso']; ?></a>
							</h4>
						</div>
						<div id="<?php echo $dados['curso'] ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
			        		<div class="panel-body">
				        		<p><?php  echo $dados['descricao']; ?></p> 
								<a href=" <?php echo $dados['link'] ?> " target="blank"><i class="fa fa-angle-double-right"></i> Grade Curricular</a>
			        		</div>
			        	</div>
					</div>
 				<?php  } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	include("templates/footer.php");
?>
