<section class="content-header">
      <h1>
        Dashboard
        <small>Painel de Controle</small>
      </h1>
</section>
    <section class="content">
    	
     <div class="col-lg-3 col-xs-6">
     	<?php
		$exibir = $conexao->prepare("SELECT ip FROM tb_visitantes");
		$exibir->execute();
		$visita = $exibir->rowCount();
        ?>
      <div class="small-box bg-red ">
            <div class="inner">
              <h3><?php echo $visita ?></h3>

              <p>Total de Visitantes</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <a  class="small-box-footer">Site</a>
       </div>
     </div>
     <div class="col-lg-3 col-xs-6">
     	<?php
		$exibir = $conexao->prepare("SELECT * FROM tb_acessos");
		$exibir->execute();
		$acessos = $exibir->fetch(PDO::FETCH_ASSOC);
        ?>
      <div class="small-box bg-green ">
            <div class="inner">
              <h3><?php echo $acessos['acessos'] ?></h3>

              <p>Total de Acessos</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <a  class="small-box-footer">Site</a>
       </div>
     </div>
     <div class="col-lg-3 col-xs-6">
       <?php
		$exibir = $conexao->prepare("SELECT * FROM tb_blog");
		$exibir->execute();
	    $noticias=$exibir->rowCount();
        ?>
      <div class="small-box bg-orange ">
            <div class="inner">
              <h3><?php echo $noticias ?></h3>

              <p>Total de Notícias</p>
            </div>
            <div class="icon">
              <i class="fas fa-newspaper-o"></i>
            </div>
            <a  class="small-box-footer">Blog</a>
       </div>
     </div>
     <div class="col-lg-3 col-xs-6">
       <?php
		$exibir = $conexao->prepare("SELECT * FROM tb_galeria");
		$exibir->execute();
	    $noticias=$exibir->rowCount();
        ?>
      <div class="small-box bg-blue ">
            <div class="inner">
              <h3><?php echo $noticias ?></h3>

              <p>Total de Imagens</p>
            </div>
            <div class="icon">
              <i class="far fa-image"></i>
            </div>
            <a  class="small-box-footer">Galeria</a>
       </div>
     </div>

    </section>

