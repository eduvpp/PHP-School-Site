<?php
  
   if($acao=="excluir_foto"){
    $id = (isset($_GET['id'])?$_GET['id']:null);
    $select = $conexao->prepare("SELECT img FROM tb_usuarios WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados = $select->fetch(PDO::FETCH_ASSOC);
    $imgdelete = '../assets/img/perfil/'.$dados['img'];
    if (file_exists($imgdelete)) {
      unlink($imgdelete);
    }
    $id = (isset($_GET['id'])?$_GET['id']:null);
    $delete = $conexao->prepare("UPDATE tb_usuarios SET img=:img WHERE id=:id");
    $delete->bindValue(':img',NULL);
    $delete->bindValue(':id',$id);

    if($delete->execute()==true){
      $_SESSION['exc_imagem'] = 1;
      echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
    }else{
      $_SESSION['exc_imagem'] = 2;
      echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>";
    }
   }
   if($acao=="edit_usuarios"){
    $id = (isset($_GET['id'])?$_GET['id']:null);
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
             $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
             $nome = $_FILES[ 'arquivo' ][ 'name' ];
             $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
             $extensao = strtolower ( $extensao );
             
             if ( strstr ( '.png;.jpg', $extensao )) {
             $novoNome = uniqid ( time () ) . '.' . $extensao;
             $destino = '../assets/img/perfil/' . $novoNome;
             $imagem = isset($_POST['arquivo'])?$_POST['arquivo']:1;
             
             $exibir = $conexao->prepare('SELECT * FROM tb_usuarios WHERE id=:id');
             $exibir->bindValue(':id',$id);
             $exibir->execute();
             $dados=$exibir->fetch(PDO::FETCH_ASSOC);
             if ( @move_uploaded_file ( $arquivo_tmp, $destino ) AND $imagem != null ) {
             $nome= (isset($_POST['nome']))?$_POST['nome']:null;
             $imgdelete = "../assets/img/perfil/".$dados['img'];
             if (file_exists($imgdelete)) {
             unlink($imgdelete);
             }
           
             $imagem = $novoNome;
             $email= (isset($_POST['email']))?$_POST['email']:null;
             $usuario= (isset($_POST['usuario']))?$_POST['usuario']:null;
             $senha = md5((isset($_POST['senha'])?$_POST['senha']:null));
             $inserir = $conexao->prepare('UPDATE tb_usuarios SET nome=:nome,img=:img, email=:email,usuario=:usuario,senha=:senha WHERE id = :id');
   
             $inserir->bindValue(":id", $id);
             $inserir->bindValue(':nome',$nome);
             $inserir->bindValue(':email',$email);
             $inserir->bindValue(':usuario',$usuario);
             $inserir->bindValue(':img',$imagem);
             $inserir->bindValue(':senha',$senha);
                  
             if ($inserir->execute() == TRUE) {
                $_SESSION['edit_usuarios'] = 1;
                echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
              }else{
               echo "";
             }
             }
             }
             }else{
             $nome= (isset($_POST['nome']))?$_POST['nome']:null;
             $usuario= (isset($_POST['usuario']))?$_POST['usuario']:null;
             $email= (isset($_POST['email']))?$_POST['email']:null;
             $senha = md5((isset($_POST['senha'])?$_POST['senha']:null));
             $inserir = $conexao->prepare("UPDATE tb_usuarios SET nome=:nome, usuario=:usuario,email=:email,senha=:senha WHERE id=:id");
             $inserir->bindValue(':id',$id);
             $inserir->bindValue(':nome',$nome);
             $inserir->bindValue(':usuario',$usuario);
             $inserir->bindValue(':email',$email);
             $inserir->bindValue(':senha',$senha);
              
             
             if ($inserir->execute() == TRUE) {
                 $_SESSION['edit_usuarios'] = 1;
                 echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
              }else{
               echo "";
             }
             }
    
   }
   if($acao == "adi_usuarios"){
        $nome = (isset($_POST['nome'])?$_POST['nome']:null);
        $email = (isset($_POST['email'])?$_POST['email']:null);
        $usuario = (isset($_POST['usuario'])?$_POST['usuario']:null);
        $senha = md5((isset($_POST['senha'])?$_POST['senha']:null));
        $foto=(isset($_FILES['arquivo']['name'])?$_FILES['arquivo']['name']:null);
        $teste="";
   
         if ($foto===NULL or $foto=="") {
           $teste = null;
         }else{
   
           $tipo=str_replace(".","",strstr($_FILES['arquivo']['name'],'.'));
   
           if ($tipo == "jpg" or $tipo == "png") {
   
             $local="../assets/img/perfil/";
             $arquivo=$local.time(basename($_FILES['arquivo']['name'])).".".$tipo;
             $arquivo_tmp=$_FILES['arquivo']['tmp_name'];
             move_uploaded_file($arquivo_tmp, $arquivo);
   
             $teste = substr($arquivo, 21,18);
           }
         }
       $stmt = $conexao->prepare("INSERT INTO tb_usuarios (nome, email, usuario, senha,condicao,img) VALUES (:nome, :email, :usuario, :senha,:condicao,:img)");
   
        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':usuario',$usuario);
        $stmt->bindValue(':senha',$senha);
        $stmt->bindValue(':img',$teste);
        $stmt->bindValue(':condicao',0);
   
        if ($stmt->execute() == TRUE) {
          $_SESSION['adi_usuarios'] = 1;
          echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
        }elseif ($stmt->execute() == false and $stmt->execute() != null){
          $_SESSION['adi_usuarios'] = 2;
          echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
        }
      }
      if ($acao=="adicionar") {
   ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Cadastro de usuário</h3>
         </div>
         <form action="?pg=usuarios&acao=adi_usuarios" class="form-horizontal" method="POST" data-toggle="validator" role="form" enctype="multipart/form-data">
            <div class="box-body">
               <div class="form-group form-md-line-input form-md-floating-label">
                  <label for="nome" class="col-sm-2 control-label">Nome</label>
                  <div class="col-md-7">
                     <input type="text" name="nome" class="form-control" maxlength="100" placeholder="Ex.: Daniel" required autofocus>
                     <div class="help-block with-errors"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="email" class="col-md-2 control-label">Email</label>
                  <div class="col-md-7">
                     <input type="email" class="form-control" name="email" placeholder="Ex.: contato@empresa.com" required autofocus>
                     <div class="help-block with-errors"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="user" class="col-sm-2 control-label">Usuário</label>
                  <div class="col-sm-7">
                     <input type="text" name="usuario" class="form-control" maxlength="100" placeholder="Ex.: Daniel" required autofocus>
                     <div class="help-block with-errors"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="senha" class="col-md-2 control-label">Senha</label>
                  <div class="col-md-7">
                     <input type="password" data-minlength="6" name="senha" class="form-control"  id="inputPassword"  id="senha" placeholder="Password" required>
                     <div class="help-block ">Minímo de 6 caracteres.</div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirma_senha" class="col-md-2 control-label">Confirmação da senha</label>
                  <div class="col-sm-7">
                     <input type="password" name="confirma_senha" class="form-control" data-match="#inputPassword" data-match-error="Whoops, as senhas não coincidem" id="inputPasswordConfirm" id="confirma_senha" placeholder="Password" required>
                  </div>
                  <div class="help-block with-errors"></div>
               </div>
               <div class="form-group">
                  <label for="" class="col-md-2 control-label">Foto Perfil</label>      
                  <div class="col-sm-7">
                     <input name="arquivo" class="btn btn-primary" type="file" /><br />
                  </div>
               </div>
               <div class="box-footer">
                  <div class="col-sm-offset-9">
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                     <a class="btn btn-default pull-right" href="javascript:window.history.back();">Voltar</a>
                  </div>
               </div>
         </form>
         </div>
      </div>
   </div>
</section>
<?php
   } if ($acao == "listar") {
    
   ?>
<section class="content container-fluid">
   <div class="box">
      <div class="box-header">
         <h3 class="box-title">Noticias Cadastradas</h3>
      </div>
      <?php
         if (isset($_SESSION['edit_usuarios'])) {
         if ( $_SESSION['edit_usuarios']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Usuário editado com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['edit_usuarios']=0; 
         }
         }
         if (isset($_SESSION['exc_imagem'])) {
         if ( $_SESSION['exc_imagem']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Imagem do perfil deletada com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['exc_imagem']=0; 
         }
         if ( $_SESSION['exc_imagem']== 2 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Ocorreu um erro ao deletar a imagem!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['exc_imagem']=0; 
         }
         }
         if (isset($_SESSION['adi_usuarios'])) {
         if ( $_SESSION['adi_usuarios']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Usuário adicionado com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_usuarios']=0; 
         }
         if ( $_SESSION['adi_usuarios']== 2 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Erro ao adicionar usuário!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_usuarios']=0; 
         }
         }
         if (isset($_SESSION['exc_usu'])) {
         if ( $_SESSION['exc_usu']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-danger " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Usuário não pode ser excluido enquanto estiver em uso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['exc_usu']=0; 
         }
         }
         if (isset($_SESSION['b'])) {
         if ( $_SESSION['b']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-danger " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Usuário não pode ser bloqueado enquanto estiver em uso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['b']=0; 
         }
         }
         ?>
      <!-- /.box-header -->
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">ID</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nome:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Email:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Usuário:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação:</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $consulta=$conexao->prepare("SELECT * FROM tb_usuarios ORDER BY id DESC  ");
                           $consulta->execute();
                           while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $dados['id'] ?></td>
                           <td><?php echo $dados['nome'] ?>
                           </td>
                           <td><?php echo $dados['email'];
                              ?></td>
                           <td><?php echo $dados['usuario'] ?></td>
                           <td>
                              <a href="?pg=usuarios&acao=editar&id=<?php echo $dados['id']?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $dados['id'] ?>">
                              <i class="fa fa-trash"></i>
                              </button>
                              <?php
                                 if ($dados['condicao']==1) {
                                  ?> 
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bloquear<?php echo $dados['id'] ?>">
                              <i class="fa fa-lock"></i>
                              </button>
                              <?php }elseif ($dados['condicao']==0) {
                                 ?>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bloquear<?php echo $dados['id'] ?>">
                              <i class="fa fa-lock"></i>
                              </button>
                              <?php
                                 }
                                 
                                 ?>
                           </td>
                        </tr>
                        <div class="modal fade" id="<?php echo $dados['id'] ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Excluir Item</h4>
                                 </div>
                                 <div class="modal-body">
                                    <p>Deseja realmente excluir este item ?</p>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    <a href="?pg=usuarios&acao=listar&acao=excluir&id=<?php echo $dados['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" id="bloquear<?php echo $dados['id'] ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Excluir Item</h4>
                                 </div>
                                 <div class="modal-body">
                                    <p>Deseja realmente bloquear este usuário ?</p>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    <a href="?pg=usuarios&acao=bloqueo&id=<?php echo $dados['id'] ?>"><button type="submit" class="btn btn-danger">Bloquear</button></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php 
   }if ($acao == "editar") {
   ?>
<section class="content container-fluid">
   <div class="row">
      <!-- left column -->
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Editar de usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
             $id = (isset($_GET['id'])?$_GET['id']:null);
             $select=$conexao -> prepare("SELECT * FROM tb_usuarios WHERE id=:id");
             $select->bindValue(':id',$id);  
             $select->execute();
             $dados=$select->fetch(PDO::FETCH_ASSOC);
             ?>
            <form action="?pg=usuarios&acao=edit_usuarios&id=<?php echo $dados['id'] ?>" class="form-horizontal" method="POST" data-toggle="validator" enctype="multipart/form-data">
               <div class="box-body">
                  <div class="form-group form-md-line-input form-md-floating-label">
                     <label for="nome" class="col-sm-2 control-label">Nome</label>
                     <div class="col-sm-7">
                        <input type="text" name="nome" class="form-control" maxlength="100" value="<?php echo $dados['nome']?>" required autofocus>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="email" class="col-sm-2 control-label">Email</label>
                     <div class="col-sm-7">
                        <input type="email" class="form-control" name="email" value="<?php echo $dados['email']?>" required autofocus>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="user" class="col-sm-2 control-label">Usuário</label>
                     <div class="col-sm-6">
                        <input type="text" name="usuario" class="form-control" maxlength="100" value="<?php echo $dados['usuario']?>" required autofocus>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="senha" class="col-sm-2 control-label">Nova Senha</label>
                     <div class="col-sm-4">
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Password" required>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="senha" class="col-sm-2 control-label">Alterar Foto</label>
                     <div class="logo col-sm-4">
                        <input name="arquivo" class="btn btn-primary" type="file" /><br />
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="senha" class="col-sm-2 control-label">Excluir Foto Atual</label>
                     <div class="logo col-sm-4">
                          <a class="btn btn-danger" href="?pg=usuarios&acao=excluir_foto&id=<?php echo $dados['id']?>">Excluir Foto</a>
                     </div>
                    
                  </div>
               </div>
               <div class="box-footer">
                  <div class="col-sm-offset-9">
                     <a class="btn btn-default pull-right" href="javascript:window.history.back();">Voltar</a>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<?php   
   }else if ($acao=="excluir") {
   
   $id = (isset($_REQUEST['id'])?$_REQUEST['id']:null);
   
   if (isset($_SESSION['id_usuario'])) {
     if ($id!=$_SESSION['id_usuario']) {
     
   $select= $conexao->prepare("SELECT img FROM tb_usuarios WHERE id=:id");
   $select->bindValue(':id',$id);
   $select->execute();
   $dados= $select->fetch(PDO::FETCH_OBJ);
   $imgdelete ='../assets/img/perfil/'.$dados->img;
   if (file_exists($imgdelete)) {
     unlink($imgdelete);
   }
   
   $excluir = $conexao->prepare("DELETE FROM tb_usuarios WHERE id= :id");
   $excluir->bindValue(':id',$id);
   
   
   if($excluir->execute()==TRUE){
     
     echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
   
   }else{
     echo "";
   }
   
   }else{
    $_SESSION['exc_usu'] = 1;
     echo "<script>window.location.href='?pg=usuarios&acao=listar';</script>"; 
   
     
   }
   }
   }
   if ($acao=="bloqueo") {
   $id=$_GET['id'];
   
   
   if (isset($_SESSION['id_usuario'])) {
     if ($id!=$_SESSION['id_usuario']) {
   $consulta=$conexao -> prepare("SELECT condicao FROM tb_usuarios WHERE id = :id");
   $consulta->bindValue(':id',$id);
   $consulta->execute();
   $dados=$consulta->fetch(PDO::FETCH_OBJ);
   
   
   if ($dados->condicao==1) {
     $condicao=0;
   }else if ($dados->condicao==0) {
     $condicao=1;
   }
   
   $stmt = $conexao->prepare("UPDATE tb_usuarios SET  condicao=:condicao WHERE id=:id");
     
   $stmt->bindValue(':id',$id);
   $stmt->bindValue(':condicao',$condicao);
   
   if ($stmt->execute() == TRUE) {
      echo "<script> window.location.href='?pg=usuarios&acao=listar';</script>";         
   }else{
   
   }
   }else{
    
      $_SESSION['b'] = 1;    
      echo "<script> window.location.href='?pg=usuarios&acao=listar';</script>";  
   }
   }
   }
   ?>