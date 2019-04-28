<?php
	$title = "Sobre";
    include("templates/menu.php");
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?= URL;?>">Início</a></li>
                    <li class="active">Sobre</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="sobre">
    <div class="container">
        <div class="row">           
            <div class="col-md-12 title">
                <h1 class="text-left">Sobre</h1>
            </div>
        </div>
        <?php 
            $selecionar = $conexao->prepare("SELECT descricao FROM tb_sobre");
            $selecionar->execute();
            $dado = $selecionar->fetch(PDO::FETCH_ASSOC);
         ?>
        <div class="row index-content">
            <div class="text-justify text-page col-md-12">
				<p><?php echo $dado['descricao'] ?></p>
			</div>
		</div>
    </div>
</section>

<?php
    include("templates/footer.php");
?>
		
