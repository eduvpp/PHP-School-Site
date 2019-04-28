<?php 
   if ($acao=="adicionar") {
   ?>
<section class="content container-fluid">
   <div class="col-md-12">
   <div class="box box-success">
      <div class="box-header with-border">
         <h3 class="box-title">Adicionar Evento</h3>
      </div>
      <?php 
         $nome = isset($_POST['nome'])?$_POST['nome']:null;
         $data1 = isset($_POST['data'])?$_POST['data']:null;
         $data1 = str_replace("/", "-", isset($_POST["data"])?$_POST["data"]:null);
         $data = date('Y-m-d', strtotime($data1)); 
         $descricao= isset($_POST['descricao'])?$_POST['descricao']:null;
         $horario= isset($_POST['horario'])?$_POST['horario']:null;
         $cond = isset($_GET['cond'])?$_GET['cond']:null;
         if($cond == "inserir"){
         $inserir = $conexao->prepare("INSERT INTO tb_eventos(nome,descricao,data,horario) VALUES (:nome,:descricao,:data,:horario)");
         $inserir->bindValue(':nome',$nome);
         $inserir->bindValue(':data',$data);
         $inserir->bindValue(':descricao',$descricao);
         $inserir->bindValue(':horario',$horario);
         
         if($inserir->execute()==true){
            echo '
             <div class="alert alert-success" id="success-alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <strong>Evento cadastrado com sucesso!</strong><a href="" class="alert-link"></a>.
             </div>
             ';
         }
         }
          ?>
      <div class="box-body">
         <form method="post" enctype="multipart/form-data" action="?pg=eventos&acao=adicionar&cond=inserir">
            <div class="col-md-12">
               <label>Nome:</label>
               <input required type="text" class="form-control" name="nome">
            </div>
            <div class="col-md-6">
               <label>Data:</label>
               <input required type="text" value="<?php echo date('d/m/Y') ?>" data-mask="00/00/0000" class="form-control" name="data">
            </div>
            <div class="col-md-6">
               <label>Hora:</label>
               <input required type="text" data-mask="00:00"  value="<?=date('H:i') ?>" class="form-control" name="horario">
            </div>
            <div class="col-md-12"> 
               <label>Descrição:</label>
               <textarea required class="form-control" name="descricao" rows="12" style="resize: none;"> </textarea>
            </div>
            <div style="margin-top: 10px;" class="col-md-12">
              <input type="submit" class="btn btn-primary pull-right" value="Salvar">
            </div>
         </form>
      </div>
   </div>
</section>
<?php  }if ($acao=="listar") { ?>
<section class="content container-fluid">
<div class="box">
   <div class="box-header">
      <h3 class="box-title">Eventos Cadastrados</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
         <div class="row">
            <div class="col-sm-12">
               <form method="POST" action="?pg=eventos&acao=editar">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">ID</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nome:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Data:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Descrição:</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação:</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $consulta=$conexao->prepare("SELECT id, nome,descricao,data FROM tb_eventos ORDER BY id DESC  ");
                           $consulta->execute();
                           while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $dado_blog['id'] ?></td>
                           <td><?php echo $dado_blog['nome'] ?>
                           </td>
                           <td><?php 
                              $data1 = $dado_blog['data'];
                              $data1 = str_replace("/", "-", $dado_blog['data'] );
                              $data = date('d/m/Y', strtotime($data1)); 
                              echo $data ?></td>
                           <td><?php echo $dado_blog['descricao'] ?></td>
                           <td>
                              <input type="hidden" name="id" value="<?php echo $dado_blog['id']; ?>">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $dado_blog['id'] ?>">
                                  <i class="fa fa-trash"></i>
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
                <a href="?pg=eventos&acao=esc&id=<?php echo $dado_blog['id'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
              </div>
            </div>
          </div>
</div>
                        <?php } ?>
                     </tbody>
                  </table>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<?php }if ($acao=="esc") {

  $id = (isset($_REQUEST['id'])?$_REQUEST['id']:null);
  $excluir = $conexao->prepare("DELETE FROM tb_eventos WHERE id= :id");
  $excluir->bindValue(':id',$id);
  if($excluir->execute()==TRUE){
     echo "<script>window.location.href='?pg=eventos&acao=listar';</script>";
  }else{
    echo "";
  }
}if($acao=="efetuar_edicao"){
$id = isset($_POST['id'])?$_POST['id']:null;
 if(isset($_GET['id'])){
   $id = (isset($_REQUEST['id'])?$_REQUEST['id']:null);
   $nome = (isset($_POST['nome'])?$_POST['nome']:null);
   $data1 = (isset($_POST['data'])?$_POST['data']:null);
   $data1 = str_replace("/", "-", isset($_POST["data"])?$_POST["data"]:null);
   $data = date('Y-m-d', strtotime($data1)); 
   $descricao= (isset($_POST['descricao'])?$_POST['descricao']:null);
   $horario= (isset($_POST['horario'])?$_POST['horario']:null);
   $editar = $conexao->prepare("UPDATE tb_eventos SET nome=:nome, descricao=:descricao, data=:data, horario=:horario WHERE id=:id");
   
    $editar->bindValue(':id',$id);
    $editar->bindValue(':nome',$nome);
    $editar->bindValue(':descricao',$descricao);
    $editar->bindValue(':data',$data);
    $editar->bindValue(':horario',$horario);
    if($editar->execute()==true){
        echo "<script>window.location.href='?pg=eventos&acao=listar';</script>";
    }elseif($editar->execute()==false AND $editar->execute()!=null){
        echo "<script>window.location.href='?pg=eventos&acao=listar';</script>";

    }
 }

   }

if($acao=="editar"){
	$id = isset($_POST['id'])?$_POST['id']:null;
    $select = $conexao->prepare("SELECT * FROM tb_eventos WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados=$select->fetch(PDO::FETCH_ASSOC);
?>
<section class="content container-fluid">
   <div class="col-md-12">
   <div class="box box-success">
      <div class="box-header with-border">
         <h3 class="box-title">Editar Evento</h3>
      </div>
      <div class="box-body">
         <form method="post" action="?pg=eventos&acao=efetuar_edicao&id=<?php echo $id ?>" enctype="multipart/form-data">
            <div class="col-md-12">
               <label>Nome:</label>
               <input required type="text" class="form-control" value="<?php echo $dados['nome'] ?>" name="nome">
            </div>
            <div class="col-md-6">
               <label>Data:</label>
               <input required type="text" value="<?php echo date('d/m/Y') ?>" data-mask="00/00/0000" class="form-control" name="data">
            </div>
            <div class="col-md-6">
               <label>Hora:</label>
               <input required type="text" data-mask="00:00"  value="<?=date('H:i') ?>" class="form-control" name="horario">
            </div>
            <div class="col-md-12"> 
               <label>Descrição:</label>
               <textarea required class="form-control" name="descricao" rows="12" style="resize: none;"> <?php echo $dados['descricao'] ?> </textarea>
            </div>
            <input type="submit" class="btn btn-primary pull-right" value="Salvar">
         </form>
      </div>
   </div>
</section>
<?php 

    
    } ?>