<?php
   if ($acao == "efetuar_edicao") {
       if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
           $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
           $nome        = $_FILES['arquivo']['name'];
           $extensao    = pathinfo($nome, PATHINFO_EXTENSION);
           $extensao    = strtolower($extensao);
           
           if (strstr('.png;.jpg', $extensao)) {
               $novoNome = uniqid(time()) . '.' . $extensao;
               $destino  = '../assets/img/noticias/' . $novoNome;
               $imagem   = isset($_POST['arquivo']) ? $_POST['arquivo'] : 1;
               
               $exibir = $conexao->prepare('SELECT * FROM tb_blog WHERE id=:id');
               $exibir->bindValue(':id', $id);
               $exibir->execute();
               $dados = $exibir->fetch(PDO::FETCH_ASSOC);
               if (@move_uploaded_file($arquivo_tmp, $destino) AND $imagem != null) {
                   $titulo    = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
                   $imgdelete = "../" . $dados['imagem'];
                   if (file_exists($imgdelete)) {
                       unlink($imgdelete);
                   }
                   
                   $destino  = 'assets/img/noticias/' . $novoNome;
                   $imagem   = $destino;
                   $horario  = (isset($_POST['horario'])) ? $_POST['horario'] : null;
                   $data     = (isset($_POST['data'])) ? $_POST['data'] : null;
                   $conteudo = (isset($_POST['conteudo'])) ? $_POST['conteudo'] : null;
                   $id       = $_GET['id'];
                   $inserir  = $conexao->prepare('UPDATE tb_blog SET titulo=:titulo,imagem=:imagem, horario=:horario,data=:data,conteudo=:conteudo WHERE id = :id');
                   
                   $inserir->bindValue(":id", $id);
                   $inserir->bindValue(':titulo', $titulo);
                   $inserir->bindValue(':imagem', $imagem);
                   $inserir->bindValue(':horario', $horario);
                   $inserir->bindValue(':data', $data);
                   $inserir->bindValue(':conteudo', $conteudo);
                   
                   if ($inserir->execute() == true) {
                       $_SESSION['efetu_edi'] = 1;
                       echo "<script>window.location.href='?pg=blog&acao=listar';</script>";
                   } else {
                       
                   }
               }
           }
       } else {
           $titulo   = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
           $horario  = (isset($_POST['horario'])) ? $_POST['horario'] : null;
           $data     = (isset($_POST['data'])) ? $_POST['data'] : null;
           $conteudo = (isset($_POST['conteudo'])) ? $_POST['conteudo'] : null;
           $inserir  = $conexao->prepare("UPDATE tb_blog SET titulo=:titulo, horario=:horario,data=:data,conteudo=:conteudo WHERE id=:id");
           $inserir->bindValue(':id', $id);
           $inserir->bindValue(':titulo', $titulo);
           $inserir->bindValue(':horario', $horario);
           $inserir->bindValue(':data', $data);
           $inserir->bindValue(':conteudo', $conteudo);
           
           if ($inserir->execute() == true) {
               $_SESSION['efetu_edi'] = 1;
               echo "<script>window.location.href='?pg=blog&acao=listar';</script>";
           } else {
               
           }
       }
   }
   if ($acao == "efetuar_cadastro") {
       if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
           $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
           $nome        = $_FILES['arquivo']['name'];
           $extensao    = pathinfo($nome, PATHINFO_EXTENSION);
           $extensao    = strtolower($extensao);
           
           
           
           if (strstr('.png;.jpg', $extensao)) {
               $novoNome = uniqid(time()) . '.' . $extensao;
               $destino  = '../assets/img/noticias/' . $novoNome;
               
               if (@move_uploaded_file($arquivo_tmp, $destino)) {
                   
                   $insert   = $conexao->prepare("INSERT INTO tb_blog(titulo,imagem,horario,data,conteudo) VALUES(:titulo,:imagem,:horario,:data,:conteudo)");
                   $destino  = $novoNome;
                   $titulo   = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
                   $imagem   = $destino;
                   $horario  = (isset($_POST['horario'])) ? $_POST['horario'] : null;
                   $data     = (isset($_POST['data'])) ? $_POST['data'] : null;
                   $conteudo = (isset($_POST['conteudo'])) ? $_POST['conteudo'] : null;
                   
                   $insert->bindValue(':titulo', $titulo);
                   $insert->bindValue(':imagem', $imagem);
                   $insert->bindValue(':horario', $horario);
                   $insert->bindValue(':data', $data);
                   $insert->bindValue(':conteudo', $conteudo);
                   if ($insert->execute() == true) {
                       $_SESSION['efetu_cad'] = 1;
                       echo "<script>window.location.href='?pg=blog&acao=listar';</script>";
                   } else {
                       $_SESSION['efetu_cad'] = 2;
                       echo "<script>window.location.href='?pg=blog&acao=listar';</script>";
                   }
               }
           } else
               $_SESSION['efetu_cad'] = 3;
           echo "<script>window.location.href='?pg=blog&acao=listar';</script>";
       }
   }
   if ($acao == "excluir") {
       $id     = $_GET['id'];
       $select = $conexao->prepare("SELECT imagem FROM tb_blog WHERE id=:id");
       $select->bindValue(':id', $id);
       $select->execute();
       $dado   = $select->fetch(PDO::FETCH_ASSOC);
       $delete = $conexao->prepare("DELETE FROM tb_blog WHERE id = :id");
       $delete->bindValue(":id", $id);
       $imagem               = $delete->fetch(PDO::FETCH_ASSOC);
       $imagemQueVaiDeletada = "../" . $dado['imagem'];
       if (file_exists($imagemQueVaiDeletada)) {
           unlink($imagemQueVaiDeletada);
       }
       if ($delete->execute() === TRUE) {
           echo '
       <div class="alert alert-success" id="success-alert">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <strong>Notícia excluida com sucesso!</strong><a href="" class="alert-link"></a>.
       </div>
       ';
       } else {
           echo '
       <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <strong>Ocorreu um erro na exclusão da notícia.</strong><a href="" class="alert-link"></a>.
       </div>
     ';
       }
       $acao = "listar";
   }
   ?>
<?php
   if ($acao == 'cadastrar') {
   ?>
<section class="content container-fluid">
   <!-- left column -->
   <div class=" col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Cadastrar Notícias</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <form method="post"  action="?pg=blog&acao=efetuar_cadastro" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                     <label>Titulo:</label>
                     <input required  type="text" class="form-control" name="titulo">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Imagem:</label>
                     <input required name="arquivo" type="file" class="form-control" name="imagem">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Data:</label>
                     <input required type="text" class="form-control" value="<?= date('d/m/Y') ?>" data-mask="00/00/0000" name="data">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Horário:</label>
                     <input required type="text" class="form-control" value="<?= date('H:i:s') ?>" data-mask="00:00:00" name="horario">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Conteudo:</label>
                     <textarea id="editor1" name="conteudo" name="editor1"></textarea>
                     </textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <input type="submit" class="btn btn-primary pull-right"  value="Salvar">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--/.col (left) -->
   </div>
</section>
<?php
   }
   ?>
<?php
   if ($acao == 'listar') {
   ?>
<section class="content container-fluid">
   <div class="box">
      <div class="box-header">
         <h3 class="box-title">Noticias Cadastradas</h3>
      </div>
      <?php
         if (isset($_SESSION['efetu_cad'])) {
             if ($_SESSION['efetu_cad'] == 1) {
                 echo '<br>
                           <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <strong>Nóticia cadastrada com sucesso! </strong><a href="" class="alert-link"></a>
                           </div>
                         ';
                 $_SESSION['efetu_cad'] = 0;
             }
             if ($_SESSION['efetu_cad'] == 2) {
                 echo '<br>
                           <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <strong>Erro ao cadastrar notícia! </strong><a href="" class="alert-link"></a>
                           </div>
                         ';
                 $_SESSION['efetu_cad'] = 0;
             }
             if ($_SESSION['efetu_cad'] == 3) {
                 echo '   <br>
                             <div class="alert alert-danger">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                             <strong>Apenas arquivos *PNG com o tamanho de 100X64 pixels! </strong><a href="" class="alert-link"></a>
                             </div>
                         ';
                 $_SESSION['efetu_cad'] = 0;
             }
         }
         if (isset($_SESSION['efetu_edi'])) {
             if ($_SESSION['efetu_edi'] == 1) {
                 echo '<br>
                           <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <strong>Nóticia editada com sucesso! </strong><a href="" class="alert-link"></a>
                           </div>
                         ';
                 $_SESSION['efetu_edi'] = 0;
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
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Titulo</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Data</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $consulta = $conexao->prepare("SELECT * FROM tb_blog ");
                           $consulta->execute();
                           while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) {
                           ?>
                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php
                              echo $dado_blog['id'];
                              ?></td>
                           <td><?php
                              echo $dado_blog['titulo'];
                              ?>
                           </td>
                           <td><?php
                              echo $dado_blog['data'];
                              ?></td>
                           <td> <a href="?pg=blog&acao=editar&id=<?php
                              echo $dado_blog['id'];
                              ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php
                                 echo $dado_blog['id'];
                                 ?>">
                              <i class="fa fa-trash"></i>
                              </button>
                           </td>
                        </tr>
                        <div class="modal fade" id="<?php
                           echo $dado_blog['id'];
                           ?>">
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
                                    <a href="?pg=blog&acao=listar&acao=excluir&id=<?php
                                       echo $dado_blog['id'];
                                       ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">ID</th>
                           <th rowspan="1" colspan="1">Titulo</th>
                           <th rowspan="1" colspan="1">Data</th>
                           <th rowspan="1" colspan="1">Ação</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.box-body -->
   </div>
</section>
<?php
   }
   ?>
<?php
   if ($acao == "editar") {
       
       $exibir = $conexao->prepare("SELECT * FROM tb_blog WHERE id=:id");
       $exibir->bindValue(':id', $id);
       $exibir->execute();
       while ($dados = $exibir->fetch(PDO::FETCH_ASSOC)) {
   ?>
<section class="content container-fluid">
   <div class=" col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Editar notícia</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <form method="POST" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                     <label>Titulo:</label>
                     <input required  type="text" value="<?php
                        echo $dados['titulo'];
                        ?>" class="form-control" name="titulo">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Imagem:</label>
                     <input name="arquivo" type="file" class="form-control" name="imagem">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Data:</label>
                     <input required type="text" class="form-control" value="<?php
                        echo $dados['data'];
                        ?>" data-mask="00/00/0000" name="data">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Horário:</label>
                     <input required type="text" class="form-control" value="<?php
                        echo $dados['horario'];
                        ?>" data-mask="00:00:00" name="horario">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Conteudo:</label>
                     <textarea id="editor1" name="conteudo" value="" name="editor1"><?php
                        echo $dados['conteudo'];
                        ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <input type="submit" class="btn btn-primary pull-right"  value="Salvar">
                     <a class="btn btn-default pull-right" href="javascript:window.history.go();">Voltar</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }
   }
   ?>