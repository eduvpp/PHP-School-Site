<?php
    $title = "Links Úteis";
    include("../templates/menu.php");
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Início</a></li>
                    <li class="active">Links úteis</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="links">
    <div class="container">
        <div class="row">           
            <div class="col-md-12 title">
                <h1 class="text-left">Links úteis</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="http://aluno.seduc.ce.gov.br/" target="
                    _blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i> Aluno online</a>
                    <a href="http://sice-orientador.seduc.ce.gov.br/sice-orientador/aluno/menu-aluno.jsf" target="_blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i> Sice</a>
                    <a href="#" target="_blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i> Apostila - Emprededorismo</a>
                    <a href="#" target="_blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i> Apostila - Curso de Informática Básica</a>
                    <a href="#" target="_blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i> Apostila - Curso de Informática</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include("../templates/footer.php");
?>