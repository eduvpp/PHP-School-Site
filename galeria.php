<?php
   $title = "Galeria";
   include("templates/menu.php");
   ?>
<section class="breadcrumb-main">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <ol class="breadcrumb">
               <li><a href="<?= URL;?>">Início</a></li>
               <li class="active">Galeria</li>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="galeria">
   <div class="container">
      <div class="row">
         <div class="col-md-12 title">
            <h1 class="text-left">Galeria</h1>
         </div>
      </div>
      <div class="row">
         <div class="gallery-galeria">
            <?php 
               $pagina=(!isset($_GET['pagina']))?1:$_GET['pagina'];
               
               $sqlExec=$conexao->prepare("SELECT id, nome FROM tb_galeria");
               $sqlExec->execute();
               $result=$sqlExec->fetchAll();
               $exibir=12;
               $total=ceil((count($result)/$exibir));
               $inicioExibir=($exibir*$pagina)-$exibir;
               
               $consulta=$conexao->prepare("SELECT * FROM tb_galeria ORDER BY id DESC LIMIT $inicioExibir, $exibir ");
               $consulta->execute();
               while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-md-3 col-sm-6">
               <a href="<?php echo 'assets/img/galeria/'.$dado_blog['imagem']  ?>" title="<?php  echo $dado_blog['nome'] ?>">
               <i class="fas fa-search-plus fa-3x"></i>
               <i class="fas fa-search-plus fa-3x"></i>
               <img src="<?php echo 'assets/img/galeria/'.$dado_blog['imagem']  ?>" width="262" height="160">
               </a>
            </div>
            <?php  } ?>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-5">
            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
         </div>
         <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
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
   </div>
</section>
<?php
   include("templates/footer.php");
   ?>