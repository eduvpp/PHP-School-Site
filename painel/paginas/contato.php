<?php
      if (isset($_SESSION['localizacao'])) {
      if ( $_SESSION['localizacao']== 1 ) {
         echo '
               <br>
               <div class="alert alert-success " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Dado editado com sucesso!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['localizacao']=0; 
      }
      if ( $_SESSION['localizacao']== 2 ) {
         echo '
               <br>
               <div class="alert alert-danger " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Erro a editar dados!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['localizacao']=0; 
      }
    }?>
<?php
      if (isset($_SESSION['telefone'])) {
      if ( $_SESSION['telefone']== 1 ) {
         echo '
               <br>
               <div class="alert alert-success " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Dado editado com sucesso!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['telefone']=0; 
      }
      if ( $_SESSION['telefone']== 2 ) {
         echo '
               <br>
               <div class="alert alert-danger " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Erro a editar dados!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['telefone']=0; 
      }
    }?>
<?php
      if (isset($_SESSION['email'])) {
      if ( $_SESSION['email']== 1 ) {
         echo '
               <br>
               <div class="alert alert-success " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Dado editado com sucesso!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['email']=0; 
      }
      if ( $_SESSION['email']== 2 ) {
         echo '
               <br>
               <div class="alert alert-danger " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Erro a editar dados!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
             $_SESSION['email']=0; 
      }
    }?>

<!--      Localização              -->
<?php
   if($acao == "ver"){
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-offset-1 col-md-10">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Localização</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Localização</th>
                        <th scope="col">Editar</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_localizacao ORDER BY id ASC");
                        $consulta->execute();     
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) { ?>
                     <tbody>
                        <tr>
                           <td><?php echo $dados->localizacao?></td>
                           <td> <a href="?pg=contato&acao=ver_localizacao&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php } ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao == "ver_localizacao") { ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-offset-1 col-md-10">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Editar contato</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $consulta=$conexao -> query("SELECT * FROM tb_localizacao WHERE id=$id");
                  $consulta->execute();
                  $dados=$consulta->fetch(PDO::FETCH_OBJ); 
                  ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" action="?pg=contato&acao=editar_localizacao&id=<?php echo $dados->id?>" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2 control-label">Aprovação</label>
                           <th scope="row">
                              <input type="checkbox" name="condicao"  data-toggle="toggle" <?php if($dados->condicao==1){echo "checked";}else{}?>>
                           </th>
                           <div class="col-sm-7">
                              <input type="text" name="localizacao" class="form-control" maxlength="100" value="<?php echo $dados->localizacao?>">
                           </div>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                        </div>
                     </div>
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php } if ($acao == "editar_localizacao") {
   $id = (isset($_GET['id'])?$_GET['id']:null);
   $localizacao = (isset($_POST['localizacao'])?$_POST['localizacao']:null);
   $condicao = (isset($_POST['condicao'])?'1':'0');
   $stmt = $conexao->prepare("UPDATE tb_localizacao SET localizacao=:localizacao, condicao=:condicao WHERE id=:id");
   $stmt->bindValue(':id',$id);
   $stmt->bindValue(':localizacao',$localizacao);
   $stmt->bindValue(':condicao',$condicao);
   if ($stmt->execute() == TRUE) {
      $_SESSION['localizacao']= 1;
      echo "<script>window.location.href='?pg=contato&acao=ver';</script>";   
   }else{
     $_SESSION['localizacao']= 2;
   } 
   }      
   ?>
<!--      Telefone             -->
<?php
   if($acao == "ver"){
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-offset-1 col-md-10">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Telefone:</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Telefone</th>
                        <th scope="col">Editar</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_telefone ORDER BY id ASC");
                        $consulta->execute();     
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) { ?>
                     <tbody>
                        <tr>
                           <td><?php echo $dados->telefone?></td>
                           <td> <a href="?pg=contato&acao=ver_telefone&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php } ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao == "ver_telefone") { ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-offset-1 col-md-10">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Editar contato</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $consulta=$conexao -> query("SELECT * FROM tb_telefone WHERE id=$id");
                  $consulta->execute();
                  $dados=$consulta->fetch(PDO::FETCH_OBJ); ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" action="?pg=contato&acao=editar_telefone&id=<?php echo $dados->id?>" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2 control-label">Telefone</label>
                           <th scope="row">
                              <input type="checkbox" name="condicao"  data-toggle="toggle" <?php if($dados->condicao==1){echo "checked";}else{}?>>
                           </th>
                           <div class="col-sm-7">
                              <input type="text" required data-mask="(00)00000-0000" name="telefone" class="form-control" maxlength="100" value="<?php echo $dados->telefone?>">
                           </div>
                        </div>
                     </div>
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                        </div>
                     </div>
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php } if ($acao == "editar_telefone") {
   $id = (isset($_GET['id'])?$_GET['id']:null);
   $telefone = (isset($_POST['telefone'])?$_POST['telefone']:null);
   $condicao = (isset($_POST['condicao'])?'1':'0');
   $stmt = $conexao->prepare("UPDATE tb_telefone SET  telefone=:telefone, condicao=:condicao WHERE id=:id");
   $stmt->bindValue(':id',$id);
   $stmt->bindValue(':telefone',$telefone);
   $stmt->bindValue(':condicao',$condicao);
   if ($stmt->execute() == TRUE) {
       $_SESSION['telefone']= 1;
   echo "<script>window.location.href='?pg=contato&acao=ver';</script>"; 
   }else{
   $_SESSION['telefone']= 2;
   } 
   }  
   ?>
<!--       Email             -->
<?php
   if($acao == "ver"){
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-offset-1 col-md-10">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">email</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">email</th>
                        <th scope="col">editar</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_email ORDER BY id ASC");
                        $consulta->execute();     
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {  ?>
                     <tbody>
                        <tr>
                           <td><?php echo $dados->email?></td>
                           <td> <a href="?pg=contato&acao=ver_email&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php } ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao == "ver_email") { ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-offset-1 col-md-10">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Editar Email</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <div class="row">
                  <?php
                     $consulta=$conexao -> query("SELECT * FROM tb_email WHERE id=$id");
                     $consulta->execute();
                     $dados=$consulta->fetch(PDO::FETCH_OBJ);
                      ?>
                  <!-- form start -->
                  <form class="form-horizontal" action="?pg=contato&acao=editar_email&id=<?php echo $dados->id?>" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2 control-label">Email</label>
                           <th scope="row">
                              <input type="checkbox" name="condicao"  data-toggle="toggle" <?php if($dados->condicao==1){echo "checked";}else{}?>>
                           </th>
                           <div class="col-sm-7">
                              <input type="text" name="email" class="form-control" maxlength="100" value="<?php echo $dados->email?>">
                           </div>
                        </div>
                     </div>
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                        </div>
                     </div>
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php } if ($acao == "editar_email") {
   $id = (isset($_GET['id'])?$_GET['id']:null);
   $email = (isset($_POST['email'])?$_POST['email']: null);
   $condicao = (isset($_POST['condicao'])?'1':'0');
   
   $stmt = $conexao->prepare("UPDATE tb_email SET condicao=:condicao, email=:email WHERE id=:id");
   $stmt->bindValue(':id',$id);
   $stmt->bindValue(':condicao',$condicao);
   $stmt->bindValue(':email',$email);
   if ($stmt->execute() == TRUE) {
      $_SESSION['email']= 1;
   echo "<script>window.location.href='?pg=contato&acao=ver';</script>"; 
   }else{
   $_SESSION['email']= 2;
   } 
   }
?>