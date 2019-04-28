<?php
    include("header.php");
    include("conexao.php");
?>

<body>
	<header class="header">
		<button onclick="topFunction()" id="myBtn"><i class="fas fa-sort-up"></i></button>
		<section class="menu-container">
			<div class="midias">
				<div class="container">
					<div class="text-right social">
						<ul>
						<?php
	            		$consulta=$conexao -> query("SELECT * FROM tb_redesociais ORDER BY id ASC");
						$consulta->execute();
							
						while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
								if($dados->condicao==1) {
								 $teste = substr($dados->link, 0,8);
									if ($teste != 'https://') {
									$dados->link = 'https://'.$dados->link;
									}	
	            		?>
							<a href="<?php echo $dados->link?>" target="_blank">
								<i class="<?php echo $dados->icone?>"></i>
							</a>
					<?php
							}
	            		}
	            	?>
	            		</ul>
					</div>  
				</div>
			</div>

			<div class="navbar yamm navbar-default navbar-fixed-top menu">
				<div class="container">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php 
							$select = $conexao->prepare("SELECT * FROM tb_logo");
							$select->execute();
							$dados = $select->fetch(PDO::FETCH_ASSOC);
						 ?>
						<a class="navbar-brand" href="<?= URL;?>">
                        	<img alt="EEEP" src="<?php echo $dados['nome']?>">
                     	</a>
					</div>
					<div id="navbar-collapse-1" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<!-- Classic list -->
							<li class="dropdown link-menu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">Institucional
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<!-- Content container to add padding -->
										<div class="yamm-content">
											<div class="row">
												<ul class="col-sm-6 list-unstyled">
													<li>
														<p>
															<strong>Conheça mais nossa escola</strong>
														</p>
													</li>
													<li><a href="<?= URL.'sobre.php';?>">Sobre</a></li>
													<li><a href="<?= URL.'cursos.php';?>">Cursos</a></li>
													<li><a href="<?= URL.'galeria.php';?>">Galeria</a></li>
												</ul>
												<ul class="col-sm-6 list-unstyled">
													<li>
														<p>
															<strong>Links importante para alunos</strong>
														</p>
													</li>
													<li><a href="<?= URL.'links-uteis.php';?>">Links úteis</a></li>
													<li><a href="<?= URL.'downloads.php';?>">Downloads</a></li>
													<?php 
														$select = $conexao->prepare("SELECT * FROM tb_blog_lei");
														$select->execute();
														$dados = $select->fetch(PDO::FETCH_ASSOC);
													?>
													<li><a href="<?php echo $dados['link']; ?>" target="_blank">Blog do LEI</a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</li>
	                        <li class="link-menu"><a href="<?= URL.'processo-seletivo.php';?>">Processo seletivo</a></li>
	                        <li class="link-menu"><a href="<?= URL.'blog.php';?>">Blog</a></li>
	                        <li class="link-menu"><a href="<?= URL.'contato.php';?>">Contato</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</header>
