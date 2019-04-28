<?php 
if ($acao=="adi_downloads") {
   $nome = isset($_POST['nome'])?$_POST['nome']:null;
   $link = isset($_POST['link'])?$_POST['link']:null;
   $teste = substr($link, 0,8);
   $teste2 = substr($link, 0,7); 
	  if ($teste != 'https://' AND $teste2 != 'http://') {
	      $link = 'https://'.$link;
	   }
   $inserir = $conexao->prepare("INSERT INTO tb_downloads(nome,link) VALUES (:nome,:link)");
   $inserir->bindValue(':nome',$nome);
   $inserir->bindValue(':link',$link);
   if($inserir->execute() == true){
       $_SESSION['adi_downloads'] = 1;
       echo "<script>window.location.href='?pg=downloads&acao=listar';</script>";
   }elseif ($inserir->execute() == false and $inserir->execute() != null){
          $_SESSION['adi_downloads'] = 2;
          echo "<script>window.location.href='?pg=downloads&acao=listar';</script>"; 
   }
}
if ($acao=="edit_dowloads") {
    $id= (isset($_GET['id']))?$_GET['id']:null;
    $nome= (isset($_POST['nome']))?$_POST['nome']:null;
    $link= (isset($_POST['link']))?$_POST['link']:null; 
    $update = $conexao->prepare("UPDATE tb_downloads SET nome=:nome, link=:link WHERE id=:id");
    $update->bindValue(':id',$id);
    $update->bindValue(':nome',$nome);
    $update->bindValue(':link',$link);
    if($update->execute() == true){
       $_SESSION['edit_dowloads'] = 1;
       echo "<script>window.location.href='?pg=downloads&acao=listar';</script>";
    }elseif ($update->execute() == false and $update->execute() != null){
       $_SESSION['edit_dowloads'] = 2;
       echo "<script>window.location.href='?pg=downloads&acao=listar';</script>"; 
    }
    
}
if ($acao=="adicionar") { 
?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-offset-1 col-md-10">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Adicionar Download</h3>
            </div>
            <div class="box-body">
               <form action="?pg=downloads&acao=adi_downloads" method="post" enctype="multipart/form-data">
                  <div>
                     <label>Nome:</label>
                     <input type="text" class="form-control" name="nome" placeholder="Nome do arquivo...">
                  </div>
                  <div>
                     <label>Link:</label>
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">https://</div>
                        <input type="text" class="form-control" name="link" id="inlineFormInputGroup" placeholder="Link do arquivo para download...">
                      </div>
                  </div>
                  <br>
                  <input type="submit" class="btn btn-primary pull-right" value="Cadastrar">
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<?php } ?>
<?php if ($acao=="listar") { ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Downloads</h3>
            </div>
            <?php 
              if (isset($_SESSION['adi_downloads'])) {
                 if ( $_SESSION['adi_downloads']== 1 ) {
                    echo '
                          <br>
                          <div class="alert alert-success " id="success-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <strong>Link para download adicionado com sucesso!</strong><a href="" class="alert-link"></a>.
                          </div>
                          '; 
                        $_SESSION['adi_downloads']=0; 
                 }
                 if ( $_SESSION['adi_downloads']== 2 ) {
                    echo '
                          <br>
                          <div class="alert alert-success " id="success-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <strong>Erro ao adicionar link!</strong><a href="" class="alert-link"></a>.
                          </div>
                          '; 
                        $_SESSION['adi_downloads']=0; 
                 }
              }
              if (isset($_SESSION['edit_dowloads'])) {
             if ( $_SESSION['edit_dowloads']== 1 ) {
                echo '
                      <br>
                      <div class="alert alert-success " id="success-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Link para download editado com sucesso!</strong><a href="" class="alert-link"></a>.
                      </div>
                      '; 
                    $_SESSION['edit_dowloads']=0; 
             }
             if ( $_SESSION['edit_dowloads']== 2 ) {
                echo '
                      <br>
                      <div class="alert alert-success " id="success-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Erro ao editar link!</strong><a href="" class="alert-link"></a>.
                      </div>
                      '; 
                    $_SESSION['edit_dowloads']=0; 
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
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $consulta=$conexao->prepare("SELECT * FROM tb_downloads ORDER BY id ASC ");
                $consulta->execute();
                while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $dados['id'] ?></td>
                <td><?php echo $dados['nome'] ?>
                </td>
                <td><?php echo $dados['link'] ?></td>
                <td> <a href="?pg=downloads&acao=editar&id=<?php echo $dados['id']?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $dados['id'] ?>">
                       <i class="fa fa-trash"></i>
                     </button>
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
                <a href="?pg=downloads&acao=listar&acao=excluir&id=<?php echo $dados['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
              </div>
            </div>
          </div>
</div>
              <?php } ?>
            </tbody>
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
         </div>
      </div>
   </div>
</section>
<?php } ?>
<?php if($acao=="editar") { ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-offset-1 col-md-10">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Editar Downloads</h3>
            </div>
            <?php
              $id= (isset($_GET['id']))?$_GET['id']:null;
              $select = $conexao->prepare("SELECT * FROM tb_downloads WHERE id=:id");
              $select->bindValue(':id',$id);
              $select->execute();
              $dados=$select->fetch(PDO::FETCH_ASSOC);
             ?>
            <div class="box-body">
               <form action="?pg=downloads&acao=edit_dowloads&id=<?php echo $dados['id'] ?>" method="post" enctype="multipart/form-data">
                  <div>
                     <label>Nome:</label>
                     <input type="text" class="form-control" value="<?php echo $dados['nome'] ?>" name="nome">
                  </div>
                  <div>
                     <label>Link:</label>
                     <input type="text" value="<?php echo $dados['link'] ?>" class="form-control" name="link">
                  </div>
                  <br>
                  <input type="submit" class="btn btn-primary pull-right" value="Editar">
                  <a class="btn btn-default pull-right" href="javascript:window.history.go(-1);">Voltar</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<?php }if ($acao=="excluir") {
    $id=isset($_GET['id'])?$_GET['id']:null;
    $delete = $conexao->prepare("DELETE FROM tb_downloads WHERE id = :id");
    $delete->bindValue(":id",$id);
    if($delete->execute()==true){
       echo "<script>window.location.href='?pg=downloads&acao=listar' </script>";
    }
}?>