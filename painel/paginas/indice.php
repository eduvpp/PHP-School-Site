<?php
   $acao = (isset($_REQUEST['acao']) ? $_REQUEST['acao']: "");
   if($acao == "ver"){
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <?php 
            if (isset($_SESSION['ed_indice'])) {
            if ( $_SESSION['ed_indice']== 1 ) {
               echo '
                     <br>
                     <div class="alert alert-success " id="success-alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <strong>Indice editado com sucesso!</strong><a href="" class="alert-link"></a>.
                     </div>
                     '; 
                   $_SESSION['ed_indice']=0; 
            }
            if ( $_SESSION['ed_indice']== 2 ) {
               echo '
                     <br>
                     <div class="alert alert-danger " id="success-alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <strong>Erro ao editar indice!</strong><a href="" class="alert-link"></a>.
                     </div>
                     '; 
                   $_SESSION['ed_indice']=0; 
            }
          }
          ?>
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar indice</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">ID:</th>
                        <th scope="col">Aprovação:</th>
                        <th scope="col">Texto:</th>
                        <th scope="col">Ação:</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_indice ORDER BY id ASC");
                        $consulta->execute();
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                      ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->aprovacao?></td>
                           <td><?php echo $dados->texto?></td>
                           <td><a href="?pg=indice&acao=editar&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   } 
   if ($acao=="efetuar_edicao") {
      $id = (isset($_GET['id'])?$_GET['id']:null);
      $aprovacao = (isset($_POST['aprovacao'])?$_POST['aprovacao']:null);
      $texto = (isset($_POST['texto'])?$_POST['texto']: null);
      
      $stmt = $conexao->prepare("UPDATE tb_indice SET aprovacao=:aprovacao , texto=:texto WHERE id=:id");
      
      $stmt->bindValue(':id',$id);
      $stmt->bindValue(':aprovacao',$aprovacao);
      $stmt->bindValue(':texto',$texto);
      
      if ($stmt->execute() == TRUE) {
         $_SESSION['ed_indice'] = 1;     
         echo "<script>window.location.href='?pg=indice&acao=ver'</script>";
      
      }elseif($stmt->execute() == false and $stmt->execute() != null){
         $_SESSION['ed_indice'] = 2;     
         echo "<script>window.location.href='?pg=indice&acao=ver'</script>";
      } 
   }
   if ($acao == "editar") {
   ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $consulta=$conexao -> query("SELECT * FROM tb_indice WHERE id=$id");
                  $consulta->execute();
                  $dados=$consulta->fetch(PDO::FETCH_OBJ);   
               ?>
               <div class="row">
                  <!-- form start -->
                  <form action="?pg=indice&acao=efetuar_edicao&id=<?php echo $dados->id ?>" class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-1 control-label">Aprovação:</label>
                           <div class="col-sm-11">
                              <input type="text" name="aprovacao" class="form-control" maxlength="100" value="<?php echo $dados->aprovacao?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="user" class="col-sm-1 control-label">Texto:</label>
                           <div class="col-sm-11">
                              <input type="text" name="texto" class="form-control" maxlength="100" value="<?php echo $dados->texto?>">
                           </div>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <button type="submit" class="btn btn-success pull-right" >Enviar</button>
                           <a class="btn btn-default pull-right" href="javascript:window.history.back();">Voltar</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  <?php
                     ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }
   ?>