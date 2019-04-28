<?php
    $title = "Página não encontrada";
    include("../templates/header.php");
?>
<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
<section class="erro-404">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-erro text-center">
                <h1>OPS !</h1>
                <h2>Desculpe, não encontramos a página que você procura.</h2>
                <p>Volte para a nossa página inicial.</p>
                <a href="<?= $url?>" class="btn btn-success" role="button">Página Inicial</a>
            </div>
        </div>
    </div>
</section>