<?php 
   if($acao=="adi_galeria"){   
      if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
          $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
          $nome = $_FILES[ 'arquivo' ][ 'name' ];
          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );
          
      
      if ( strstr ( '.png;.jpg;.gif;.jpeg', $extensao )) {
          $novoNome = uniqid ( time () ) . '.' . $extensao;
          $destino = '../assets/img/galeria/' . $novoNome;
      if ( @move_uploaded_file ( $arquivo_tmp, $destino )  ) {
      
           $insert = $conexao->prepare("INSERT INTO tb_galeria(nome,imagem,data) VALUES(:nome,:imagem,:data)");
           $destino = $novoNome;
           $nome= (isset($_POST['nome']))?$_POST['nome']:null;
           $imagem= $destino;
           $data= (isset($_POST['data']))?$_POST['data']:null;
      
           $insert->bindValue(':nome',$nome);
           $insert->bindValue(':imagem',$imagem);
           $insert->bindValue(':data',$data);
           if ($insert->execute()==true) {
             $_SESSION['adi_galeria'] = 1;
             echo "<script>window.location.href='?pg=galeria&acao=listar';</script>";
           }elseif ($insert->execute() == false and $insert->execute() != null){
             $_SESSION['adi_galeria'] = 2;
             echo "<script>window.location.href='?pg=galeria&acao=listar';</script>";
           }
           
          }
       }else
              echo'       <br>
                          <br>
                          <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <strong>Apenas arquivos *PNG com o tamanho de 100X64 pixels! </strong><a href="" class="alert-link"></a>
                          </div>
      ';
      }
   }
   if($acao=="edit_galeria"){
                     $id=isset($_GET['id'])?$_GET['id']:null;
                      if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
                     $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
                     $nome = $_FILES[ 'arquivo' ][ 'name' ];
                     $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                     $extensao = strtolower ( $extensao );
                     
                     if ( strstr ( '.png;.jpg', $extensao )) {
                     $novoNome = uniqid ( time () ) . '.' . $extensao;
                     $destino = '../assets/img/galeria/' . $novoNome;
                     $imagem = isset($_POST['arquivo'])?$_POST['arquivo']:1;
                     
                     $exibir = $conexao->prepare("SELECT * FROM tb_galeria WHERE id=:id");
                     $exibir->bindValue(':id',$id);
                     $exibir->execute();
                     $dados=$exibir->fetch(PDO::FETCH_ASSOC);
                     if ( @move_uploaded_file ( $arquivo_tmp, $destino ) AND $imagem != null ) {
                     $nome= (isset($_POST['nome']))?$_POST['nome']:null;
                     $imgdelete = "../".$dados['imagem'];
                     if (file_exists($imgdelete)) {
                        unlink($imgdelete);
                     }
                     $destino = 'assets/img/galeria/' . $novoNome;
                     $imagem =  $destino;
                     $data= (isset($_POST['data']))?$_POST['data']:null;
                     
                     $inserir = $conexao->prepare("UPDATE tb_galeria SET nome=:nome,imagem=:imagem,data=:data WHERE id¨=:id");
                     $inserir->bindValue(':nome',$nome);
                     $inserir->bindValue(':id',$id);
                     $inserir->bindValue(':imagem',$imagem);
                     $inserir->bindValue(':data',$data);
                     
                     if ($inserir->execute() == true) {
                        $_SESSION['edit_galeria'] = 1;
                        echo "<script>window.location.href='?pg=galeria&acao=listar';</script>";
                     }else{
                       echo "erro 1";
                     }
                     }
                     }
                     }else{
                     $nome= (isset($_POST['nome']))?$_POST['nome']:null;
                     $data= (isset($_POST['data']))?$_POST['data']:null;
                     $inserir = $conexao->prepare("UPDATE tb_galeria SET nome=:nome,data=:data WHERE id=:id");
                     $inserir->bindValue(':nome',$nome);
                     $inserir->bindValue(':id',$id);
                     $inserir->bindValue(':data',$data);
                     
                     if ($inserir->execute() == true) {
                       $_SESSION['edit_galeria'] = 1;
                       echo "<script>window.location.href='?pg=galeria&acao=listar';</script>";
                     }else{
                      echo "erro";
                     }
                     }
   }
   if ($acao == "excluir") {
     $id =$_GET['id'];
     $select = $conexao->prepare("SELECT imagem FROM tb_galeria WHERE id=:id");
     $select->bindValue(':id',$id);
     $select->execute();
     $dado = $select->fetch(PDO::FETCH_ASSOC);
     
                $delete = $conexao->prepare("DELETE FROM tb_galeria WHERE id = :id");
        
                $delete->bindValue(":id",$id);
                $imagem = $delete->fetch(PDO::FETCH_ASSOC);
                $imagemQueVaiDeletada = "../assets/img/galeria/".$dado['imagem'];
                if (file_exists($imagemQueVaiDeletada)) {
                  unlink($imagemQueVaiDeletada);
                }
               if($delete->execute() === TRUE){
               echo '
               <div class="alert alert-success" id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Imagem excluida com sucesso!</strong><a href="" class="alert-link"></a>.
               </div>
               ';
               }else{
                 echo '
               <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Ocorreu um erro na exclusão da imagem.</strong><a href="" class="alert-link"></a>.
               </div>
             ';
               }
               $acao = "listar";
              }
   ?>
<?php if ($acao=='cadastrar') { ?>
<div class="container">
   <section class="content container-fluid">
      <div >
         <!-- left column -->
         <div class=" col-md-11">
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Cadastrar Imagem</h3>
               </div>
               <div class="box-body">
                  <div class="logo col-md-12">
                     <form action="?pg=galeria&acao=adi_galeria" method="post"  action="" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                           <label>Nome:</label>
                           <input required=""  type="text" class="form-control" name="nome">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Imagem:</label>
                           <input required="" name="arquivo" type="file" class="form-control" name="imagem">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Data:</label>
                           <input required="" type="text" value="<?=date('d:m:Y') ?>" class="form-control" data-mask="00/00/0000" name="data">
                        </div>
                        <div class="form-group col-md-12">
                           <input type="submit" class="btn btn-primary pull-right"  value="Salvar">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--/.col (left) -->
      </div>
   </section>
</div>
<?php } ?>
<?php 
   if ($acao=='listar') { ?>
<section class="content container-fluid">
<div class="box">
   <div class="box-header">
      <h3 class="box-title">Imagens Cadastradas</h3>
   </div>
   <?php 
     if (isset($_SESSION['adi_galeria'])) {
         if ( $_SESSION['adi_galeria']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Imagem adicionada com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_galeria']=0; 
         }
         if ( $_SESSION['adi_galeria']== 2 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Erro ao adicionar imagem!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_galeria']=0; 
         }
         }
         if (isset($_SESSION['edit_galeria'])) {
         if ( $_SESSION['edit_galeria']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Imagem editada com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['edit_galeria']=0; 
         }
       }
    ?>
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
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Imagem</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $consulta=$conexao->prepare("SELECT * FROM tb_galeria ");
                        $consulta->execute();
                        while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                     <tr role="row" class="odd">
                        <td class="sorting_1"><?php echo $dado_blog['id'] ?></td>
                        <td><?php echo $dado_blog['nome'] ?>
                        </td>
                        <td><?php echo $dado_blog['data'] ?></td>
                        <td><?php echo $dado_blog['imagem'] ?></td>
                        <td> <a href="?pg=galeria&acao=editar&id=<?php echo $dado_blog['id']?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $dado_blog['id'] ?>"><i class="fa fa-trash"></i>
                             </button>
                        </td>
                     </tr>
                     <div class="modal fade" id="<?php echo $dado_blog['id'] ?>">
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
                <a href="?pg=galeria&acao=listar&acao=excluir&id=<?php echo $dado_blog['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
              </div>
            </div>
          </div>
</div>
                     <?php } ?>
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
<?php } if ($acao=="editar") { ?>
<section class="content container-fluid">
   <div >
      <!-- left column -->
      <div class=" col-md-11">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Editar notícias</h3>
            </div>
            <div class="box-body">
              <?php 
                     $id=isset($_GET['id'])?$_GET['id']:null;
                     $select = $conexao->prepare("SELECT * FROM tb_galeria WHERE id=:id");
                     $select->bindValue(':id',$id);
                     $select->execute();
                     $dados = $select->fetch(PDO::FETCH_ASSOC);
               ?>
               <div class="logo col-md-12">
                  <form action="?pg=galeria&acao=edit_galeria&id=<?php echo $dados['id'] ?>" method="post"  action="" enctype="multipart/form-data">
                     <div class="form-group col-md-12">
                        <label>Nome:</label>
                        <input required="" value="<?php echo $dados['nome'] ?>" type="text" class="form-control" name="nome">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Imagem:</label>
                        <input name="arquivo" value="<?php echo $dados['imagem'] ?>" type="file" class="form-control" name="imagem">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Data:</label>
                        <input required="" type="text" value="<?php echo $dados['data'] ?>" class="form-control" data-mask="00/00/0000" name="data">
                     </div>
                     <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary pull-right"  value="Salvar">
                        <a class="btn btn-default pull-right" href="?pg=galeria&acao=listar">Voltar</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--/.col (left) -->
   </div>
</section>
<?php } ?>