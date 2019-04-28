<?php 
   if ($acao=="efetuar_edicao") {
   $descricao = (isset($_POST['descricao']))?$_POST['descricao']:null;
   $atualizar = $conexao->prepare("UPDATE tb_sobre SET descricao=:descricao");
   $atualizar->bindValue(':descricao',$descricao);
   if ($atualizar->execute()) {
       $_SESSION['edit_sobre'] = 1;
        echo "<script>window.location.href='?pg=sobre&acao=ver';</script>"; 
   
      }
   }
   if ($acao == "ver") {
      $consulta = $conexao->prepare("SELECT descricao FROM tb_sobre");
      $consulta->execute();
      $desc = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<section class="content container-fluid">
   <div class="row">
      <!-- left column -->
      <div class="col-md-12">
         <?php  
            if (isset($_SESSION['edit_sobre'])) {
            if ( $_SESSION['edit_sobre']== 1 ) {
            echo '
             <br>
             <div class="alert alert-success " id="success-alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <strong>Sobre editado com sucesso!</strong><a href="" class="alert-link"></a>.
             </div>
             '; 
            $_SESSION['edit_sobre']=0; 
            }
            }
            ?>
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Editar Sobre</h3>
            </div>
            <div class="box-body">
               <section class="content">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="box box-info">
                           <head>
                              <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                           </head>
                           <form action="?pg=sobre&acao=efetuar_edicao" method="post" enctype="multipart/form-data">
                              <body>
                                 <textarea id="editor1" name="descricao" name="editor1"><?php echo $desc['descricao']; ?></textarea>
                              </body>
                        </div>
                     </div>
                  </div>
               </section>
               <input type="submit" class="btn btn-primary pull-right" value="Salvar">            
               </form>
               <head>
                  <script type="text/javascript">
                     window.onload = function()  {
                       CKEDITOR.replace( 'editor1' );
                     };
                  </script>    
               </head>
            </div>
         </div>
      </div>
      <!--/.col (left) -->
   </div>
</section>
<?php } ?>