<?php
   $title = "Blog";
      include("templates/menu.php");
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
<section class="blog">
   <div class="container">
      <div class="row">
         <div class="col-md-12 title">
            <h1 class="text-left">Blog</h1>
         </div>
      </div>
      <div class="row">
         <?php
            $pagina=(!isset($_GET['pagina']))?1:$_GET['pagina'];
            
            $sqlExec=$conexao->prepare("SELECT id, titulo FROM tb_blog");
            $sqlExec->execute();
            $result=$sqlExec->fetchAll();
            
            $exibir=8;
            
            $total=ceil((count($result)/$exibir));
            
            
            $inicioExibir=($exibir*$pagina)-$exibir;
            
            $consulta=$conexao->prepare("SELECT id, titulo,conteudo,data,imagem FROM tb_blog ORDER BY id DESC LIMIT $inicioExibir, $exibir ");
            $consulta->execute();
            
              
                          while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
         <div class="col-md-3">
            <div class="card">
               <img class="card-img" height="200" width="120" src="<?php echo 'assets/img/noticias/'.$dado_blog['imagem'] ?>" alt="Blog">
               <a href="noticias.php?&id=<?php echo $dado_blog['id']; ?>" class="thumbnail">
                  <div class="card-body" style="height: 250px;">
                     <div class="card-title">
                        <p><?php echo $dado_blog['titulo'] ?></p>
                     </div>
                     <div class="card-text text-justify">

                        <?php 
                     echo substr($dado_blog['conteudo'], 0, 100); ?>...
                        <h5><?php echo $dado_blog['data'] ?></h5>
                     </div>
                     <p class="card-link">Leia mais <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                  </div>
               </a>
            </div>
         </div>
         <?php       
            }
            ?>
        <div class="col-md-12"> 
          <nav aria-label="Page navigation">
            <ul class="pagination pull-right">
               <?php if ($pagina==1) {}else{ ?>
                  <li>                 
                  <a  href="?pagina=<?php if($pagina==1){echo $pagina;}else{echo $pagina-1;}?>" aria-label="Previous">
                  <?php echo $pagina-1 ;?>                  
                  </a>
               </li>
               <?php } ?>
               
               <li>
                  <a href="?pagina=<?php echo $pagina;?>">
                  <u>
                  <?php echo $pagina ;?>
                  </u>
                  </a>
               </li>

               <?php if ($pagina+1==$total+1) {}else{ ?>
                  <li>
                  <a href="?pagina=<?php if($pagina==$total){echo $pagina;}else{echo $pagina+1;}?>" aria-label="Next">
                  <?php echo $pagina+1 ;?>
                  </a>
               </li>
               </li>
               <?php } ?>
            </ul>
         </nav>
         </div>
      </div>
   </div>
</section>
<?php
   include("templates/footer.php");
   ?>