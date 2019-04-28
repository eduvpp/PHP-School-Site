<?php
  if ($acao=='adi_cursos') {
      $curso = trim((isset($_POST['curso']))?$_POST['curso']:null);
      $descricao = (isset($_POST['descricao']))?$_POST['descricao']:null;
      $link = (isset($_POST['link']))?$_POST['link']:null;
      $teste = substr($link, 0,8);
      $teste2 = substr($link, 0,7); 
	    if ($teste != 'https://' AND $teste2 != 'http://') {
	      $link = 'https://'.$link;
	    }
      $inserir = $conexao->prepare("INSERT INTO tb_cursos(curso,descricao,link) VALUES(:curso,:descricao,:link) ");
      $inserir->BindValue('curso',$curso);
      $inserir->BindValue('descricao',$descricao);
      $inserir->BindValue('link',$link);
      if ($inserir->execute()==true) {
          $_SESSION['adi_cursos'] = 1;
          echo "<script>window.location.href='?pg=cursos&acao=listar';</script>";
      }elseif ($inserir->execute() == false and $inserir->execute() != null){
          $_SESSION['adi_cursos'] = 2;
          echo "<script>window.location.href='?pg=cursos&acao=listar';</script>";
        }
   }
  if ($acao=='edit_cursos') {
    $id = (isset($_GET['id'])?$_GET['id']:null);
    $update = $conexao->prepare("UPDATE tb_cursos SET curso=:curso , link=:link , descricao=:descricao WHERE id=:id");
    $curso = trim((isset($_POST['curso'])?$_POST['curso']:null));
    $link = (isset($_POST['link'])?$_POST['link']:null);
    $descricao= (isset($_POST['descricao'])?$_POST['descricao']:null);
    $update->bindValue(':id',$id);
    $update->bindValue(':curso',$curso);
    $update->bindValue(':link',$link);
    $update->bindValue(':descricao',$descricao);
    if ($update->execute()==true) {
        $_SESSION['edit_cursos'] = 1;
        echo "<script>window.location.href='?pg=cursos&acao=listar';</script>";
    }elseif ($update->execute() == false and $update->execute() != null){
        $_SESSION['edit_cursos'] = 2;
        echo "<script>window.location.href='?pg=cursos&acao=listar';</script>";
    }
   }
  if ($acao=='adicionar') {   
  ?>
<section class="content container-fluid">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Adicionar Cursos</h3>
      </div>
      <form action="?pg=cursos&acao=adi_cursos" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <label>Cursos</label>
              <input type="text" name="curso" class="form-control" placeholder="Nome do curso...">
            </div>
            <div class="col-md-4">
               <label>Link:</label>
               <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon">https://</div>
                  <input type="text" class="form-control" name="link" id="inlineFormInputGroup" placeholder="Link do arquivo para download...">
                </div>
            </div>
            <div class="col-md-10">
              <label>Descrição do Curso</label>
              <textarea id="editor1" name="descricao" name="editor1"></textarea><br>
           <input type="submit" class="btn btn-primary pull-right" >

            </div>

          </div>
        </div>
       
      </form>
    </div>
  </div>
</section>
</section>
<?php } if ($acao=="listar") { ?>
<section class="content container-fluid">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Cursos Cadastrados</h3>
  </div>
  <?php
    if (isset($_SESSION['adi_cursos'])) {
         if ( $_SESSION['adi_cursos']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Curso adicionado com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_cursos']=0; 
         }
         if ( $_SESSION['adi_cursos']== 2 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Erro ao adicionar curso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['adi_cursos']=0; 
         }
       }
        if (isset($_SESSION['edit_cursos'])) {
         if ( $_SESSION['edit_cursos']== 1 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Curso editado com sucesso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['edit_cursos']=0; 
         }
         if ( $_SESSION['edit_cursos']== 2 ) {
            echo '
                  <br>
                  <div class="alert alert-success " id="success-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Erro ao editar curso!</strong><a href="" class="alert-link"></a>.
                  </div>
                  '; 
                $_SESSION['edit_cursos']=0; 
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
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nome:</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Link:</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $consulta=$conexao->prepare("SELECT * FROM tb_cursos ORDER BY id ASC ");
                $consulta->execute();
                while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $dado_blog['id'] ?></td>
                <td><?php echo $dado_blog['curso'] ?>
                </td>
                <td><?php echo $dado_blog['link'] ?></td>
                <td> <a href="?pg=cursos&acao=editar&id=<?php echo $dado_blog['id']?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
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
                <a href="?pg=cursos&acao=listar&acao=excluir&id=<?php echo $dado_blog['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
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
</section>
<?php
  }elseif ($acao=="excluir") {
     $id = (isset($_GET['id'])?$_GET['id']:null);
     $excluir = $conexao->prepare("DELETE FROM tb_cursos WHERE id=:id");
     $excluir->bindValue(':id',$id);
  if($excluir->execute()==TRUE){
     echo "<script>window.location.href='?pg=cursos&acao=listar'</script>";
  }else{
     echo "";
  }
  }if($acao=="editar"){
  ?>
<section class="content container-fluid">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editar Cursos</h3>
      </div>
      <?php 
              $id = (isset($_GET['id'])?$_GET['id']:null);
              $select= $conexao->prepare("SELECT * FROM tb_cursos WHERE id=:id");
              $select->bindValue(':id',$id);
              $select->execute();
              $dados = $select->fetch(PDO::FETCH_ASSOC);
               ?>
      <form action="?pg=cursos&acao=edit_cursos&id=<?php echo $dados['id'] ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            
            <div class="col-md-4">
              <label>Cursos</label>
              <input type="text" name="curso" value="<?php echo $dados['curso'] ?>" class="form-control">
            </div>
            <div class="col-md-4">
              <label>Link</label>
              <input type="text" name="link" value="<?php echo $dados['link'] ?>" class="form-control">
            </div>
            <div class="col-md-10">
              <label>Descrição do Curso</label>
              <textarea id="editor1" name="descricao" name="editor1"><?php echo $dados['descricao'] ?></textarea>
            </div>
          </div>
        </div>
        <input type="submit" value="Editar" class="btn btn-primary pull-right" >
      </form>
    </div>
  </div>
</section>
<?php } ?>