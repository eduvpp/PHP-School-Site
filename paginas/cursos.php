<?php
	$title = "Cursos";
	include("../templates/menu.php");
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<section class="breadcrumb-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="index.php">Início</a></li>
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
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel bs-callout" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Informática</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			        		<div class="panel-body">
				        		<p>O curso de Informática ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<h4>Grade Curricular</h4>
								<div class="col-md-4">
									<h4>1º Ano</h4>
									<ul>
										<li>Informática básica - 60 horas</li>
										<li>Lógica da Programação - 60 horas</li>
										<li>HTML/CSS - 60 horas</li>
									</ul>
								</div>
								<div class="col-md-4">
									<h4>2º Ano</h4>
									<ul>
										<li>Sistemas Operacionais - 60 horas</li>
										<li>Java - 60 horas</li>
										<li>Banco de dados - 60 horas</li>
										<li>PHP/MySQL - 60 horas</li>
										<li>Redes de Computadores - 60 horas</li>
										<li>JavaScript/PHP - 60 horas</li>
									</ul>
								</div>
								<div class="col-md-4">
									<h4>3º Ano</h4>
									<ul>
										<li>Laboratório de Hardware - 60 horas</li>
										<li>Laboratório de Software - 60 horas</li>
										<li>Laboratório Web - 60 horas</li>
										<li>Estágio - 400 horas</li>
									</ul>
								</div>
			        		</div>
			        	</div>
					</div>

					<div class="panel bs-callout" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">Enfermagem</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			        		<div class="panel-body">
				        		<p>O curso de Informática ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<h4>Grade Curricular</h4>
								<div class="col-md-4">
									<h4>1º Ano</h4>
									<ul>
										<li>Informática básica - 60 horas</li>
										<li>Lógica da Programação - 60 horas</li>
										<li>HTML/CSS - 60 horas</li>
									</ul>
								</div>
								<div class="col-md-4">
									<h4>2º Ano</h4>
									<ul>
										<li>Sistemas Operacionais - 60 horas</li>
										<li>Java - 60 horas</li>
										<li>Banco de dados - 60 horas</li>
										<li>PHP/MySQL - 60 horas</li>
										<li>Redes de Computadores - 60 horas</li>
										<li>JavaScript/PHP - 60 horas</li>
									</ul>
								</div>
								<div class="col-md-4">
									<h4>3º Ano</h4>
									<ul>
										<li>Laboratório de Hardware - 60 horas</li>
										<li>Laboratório de Software - 60 horas</li>
										<li>Laboratório Web - 60 horas</li>
										<li>Estágio - 400 horas</li>
									</ul>
								</div>
			        		</div>
			        	</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<?php
	include("../templates/footer.php");
?>