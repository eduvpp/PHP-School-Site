<?php
    include('conexao.php');
    $id= $_GET['id'];
    $consulta = $conexao->prepare("SELECT * FROM tb_blog WHERE id=:id");
    $consulta->bindValue(':id',$id);
    $consulta->execute(); 
    $dado_blog = $consulta->fetch(PDO::FETCH_ASSOC);
    $title = "Título do Projeto";
    include("templates/menu.php");
    ?>
<?php
    
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?= URL;?>">Início</a></li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="projetos">
    <div class="container">
        <div class="row">           
            <div class="col-md-12 title">
                <h1 class="text-left"><?php echo $dado_blog['titulo'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 projetos-descricao">
            	<img class="img-projetos img-responsive pull-left" src="<?php echo 'assets/img/noticias/'.$dado_blog['imagem']  ?>" alt="Projetos">
            	<p>
                 <?php echo $dado_blog['conteudo'] ?>   
                </p>
            </div>
        </div>
    </div>
</section>

<?php
    include("templates/footer.php");
?>

