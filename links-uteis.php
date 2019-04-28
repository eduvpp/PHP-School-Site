<?php
    $title = "Links Úteis";
    include("templates/menu.php");
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?= URL;?>">Início</a></li>
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
                    <?php 
                        $pagina=(!isset($_GET['pagina']))?1:$_GET['pagina'];
                        
                        $sqlExec=$conexao->prepare("SELECT id, titulo FROM tb_blog");
                        $sqlExec->execute();
                        $result=$sqlExec->fetchAll();
                        
                        $exibir=10;
                        
                        $total=ceil((count($result)/$exibir));
                        
                        
                        $inicioExibir=($exibir*$pagina)-$exibir;
                        $select = $conexao->prepare("SELECT * FROM tb_link_uteis LIMIT $inicioExibir, $exibir");
                        $select->execute();
                        while ($dados=$select->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                    <a href="<?php  echo $dados['link'] ?>" target="
                    _blank" class="list-group-item list-group-item-green"><i class="fas fa-external-link-square-alt"></i><?php  echo $dados['nome'] ?></a>
                    <?php  } ?>
                </div>
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
    </div>
</section>

<?php
    include("templates/footer.php");
?>