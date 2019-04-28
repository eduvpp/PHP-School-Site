<?php
   session_start();
   include("templates/menu.php");
   date_default_timezone_set('America/Sao_Paulo');
   
   $select = $conexao->prepare("SELECT * FROM tb_eventos");
   $select->execute();
   while($data_banco = $select->fetch(PDO::FETCH_ASSOC)){ 
      if(strtotime(date("Y-m-d")) > strtotime($data_banco['data'])){
         $delete = $conexao->prepare("DELETE FROM tb_eventos WHERE id = :id");
         $delete->bindValue(":id", $data_banco['id']);
         $delete->execute();
      } 
   }
?>
<?php
   if (!isset($_SESSION['ativo'])) {
      $_SESSION['ativo']=0;
   }
       
   if ($_SESSION['ativo']==0) {
      $select = $conexao->prepare("SELECT * FROM tb_acessos");
      $select->execute();
      $acessos = $select->fetch(PDO::FETCH_ASSOC);
      $soma = $acessos['acessos']+1;
      $update = $conexao->prepare("UPDATE tb_acessos SET acessos = :acessos WHERE id=:id");
      $update->bindValue(':id',1);
      $update->bindValue(':acessos',$soma);
      $update->execute();
      $_SESSION['ativo']=1;
   }
    
      $ip = $_SERVER['REMOTE_ADDR'];
      $select = $conexao->prepare("SELECT ip FROM tb_visitantes WHERE ip=:ip");
      $select->bindValue(':ip',$ip);
      $select->execute();
      $dados = $select->rowCount();
   if ($dados==0) {
      $inserir = $conexao->prepare("INSERT INTO tb_visitantes(ip) VALUES(:ip)");
      $inserir->bindValue(':ip',$ip);
      $inserir->execute();
   }
 ?>
<section class="slider">
   <div class="container-fluid">
      <div class="row">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <?php 
                   $select=$conexao->prepare("SELECT * FROM tb_slider");
                   $select->execute();
                   $result=$select->fetchAll();
                   $total=count($result);
                   for ($i=0; $i <$total ; $i++) { ?> 
                      <li data-target='#myCarousel' data-slide-to='<?php echo $i ?>'></li>
                    <?php  
                   }
                ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               <?php 
                  $select = $conexao->prepare("SELECT * FROM tb_slider");
                  $select->execute();
                  $_POST['a'] =0;
                  while ($dados=$select->fetch(PDO::FETCH_ASSOC)) {
                     echo"<div class='"
                ?>
               <?php if($_POST["a"]==0){
                  echo "item active" ;
               }else{
                  echo "item";
               } echo "'"; ?>>
                  <img src="<?php echo 'assets/img/slide/'.$dados['imagem'] ?>" alt="Slider">
               </div>
               <?php $_POST['a']=$_POST['a']+1; }  ?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
   </div>
</section>
<section class="informacoes">
   <div class="container">
      <div class="row">
         <div class="col-md-12 dados">
            <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_indice ORDER BY id ASC");
                        $consulta->execute();
                            
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                        ?>
                        <div class="col-xs-6 col-md-3">
                        <i class="<?php echo $dados->icone?>"></i>
                        <h1><span class=""><?php echo $dados->aprovacao?></span></h1>
                        <p><?php echo $dados->texto?></p>
                        </div>
                    <?php
                        }
                    ?>
         </div>
      </div>
   </div>
</section>

<section class="eventos" id="eventos">
   <div class="container">
      <div class="row">
         <h2 class="titulo">Eventos</h2>
         <p class="descricao">Nossos últimos eventos</p>
      </div>
      <div class="row">
         <div class="col-sm-7 col-md-5">
            <div class="cal">
               
               <div class="cal__header">
                  <button class="btn btn-action btn-link btn-lg" data-calendar-toggle="previous">
                     <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                     </svg>
                  </button>
                  <div class="cal__header__label" data-calendar-label="month">
                     March 2017
                  </div>
                  <button class="btn btn-action btn-link btn-lg" data-calendar-toggle="next">
                     <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                     </svg>
                     

                  </button>
               </div>
               <div class="cal__week">
                  <span>Seg</span> <span>Ter</span><span>Qua</span> <span>Qui</span> <span>Sex</span> <span>Sab</span> <span>Dom</span>
               </div>
               <form>
               <div class="cal__body" id="mes"  data-calendar-area="month"></div>
               </form>
            </div>
         </div>
         <div class="col-sm-5 col-md-7">
            <div class="painel-eventos" id="recebe_eventos">
                 <label id="recebe_descricao"></label>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="calendario">
   <div class="container">
      <div class="row">
         <div class="col-sm-8 col-md-8">
            <h5 class="text-calendario">Fique de olho na nossa Galeria! E veja fotos dos últimos momentos em nossa escola.</h5>
         </div>
         <div class="col-sm-4 col-md-4 text-right btn-calendario">
            <a href="<?= URL.'galeria.php';?>" class="btn-sm btn-success" role="button">Ver Galeria</a>
         </div>
      </div>
   </div>
</section>
<?php 
   $select = $conexao->prepare("SELECT * FROM tb_video");
   $select->execute();
   $dados = $select->fetch(PDO::FETCH_ASSOC);
   ?>
<section class="video">
   <div class="container-fluid">
      <div class="row">
         <iframe class="link-video" src="https://www.youtube.com/embed/<?php echo $dados['link'] ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
      </div>
   </div>
</section>
<section class="blog-inicio">
   <div class="container">
      <div class="row">
         <h2 class="titulo">Blog</h2>
         <p class="descricao">Leia as últimas noticias e fique por dentro de tudo que acontece.</p>
      </div>
      <div class="row">
         <?php 
            $consulta = $conexao->prepare("SELECT * FROM tb_blog ORDER BY id DESC LIMIT 4");
            $consulta->execute();
            while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
         <div class="col-md-3">
            <div class="card" >
               <img class="card-img" height="200" width="120" src="<?php echo 'assets/img/noticias/'.$dado_blog['imagem'] ?>" alt="Blog">
               <a href="noticias.php?&id=<?php echo $dado_blog['id']; ?>" class="link">
                  <div class="card-body" style="height: 250px;">
                     <div class="card-title">
                        <p><?php echo $dado_blog['titulo'] ?></p>
                     </div>
                     <div class="card-text text-justify" >
                        <?php echo $dado_blog['conteudo']; ?>
                        <h5 style="color: gray;"><?php echo $dado_blog['data'] ?></h5>
                     </div>
                     <p class="card-link">Leia mais <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                  </div>
               </a>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</section>
<section class="selecao">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 text-center selecao-body">
            <h2 class="title-selecao">Para facilitar seus estudos</h2>
            <p class="text-selecao">Disponiblizamos arquivos para download.</p>
            <a href="<?= URL.'downloads.php';?>" class="btn btn-success" role="button">Downloads</a>
         </div>
      </div>
   </div>
</section>
<!-- SLIDER -->
<script src="<?= URL.'assets/js/vendor/flickity.pkgd.min.js';?>" type="text/javascript"></script>
<!-- CALENDAR -->
<script src="<?= URL.'assets/js/vendor/vanillacalendar.js';?>" type="text/javascript"></script>
<script type="text/javascript">
   window.addEventListener('load', function () {
     vanillacalendar.init();
   });
</script>
<!-- ANIMAÇÃO NÚMEROS - JS PÁGINA MAIN.JS -->
<?php
   include("templates/footer.php");
   ?>