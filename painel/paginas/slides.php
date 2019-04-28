<?php
if($acao=="adi_slides"){
   if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
         $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
         $nome = $_FILES[ 'arquivo' ][ 'name' ];
         $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
         $extensao = strtolower ( $extensao );

      if ( strstr ( '.png;.jpg', $extensao )) {
          $novoNome = uniqid(time()). '.' . $extensao;
          $destino = '../assets/img/slide/' . $novoNome;
          if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {  
                $destino = $novoNome;
              $imagem = $novoNome;

              $inserir = $conexao->prepare("INSERT INTO tb_slider(imagem) VALUES(:imagem) ");
              $inserir->BindValue(':imagem',$imagem);
              if($inserir->execute()==TRUE){
                 $_SESSION['adi_slide'] = 1;
                 echo "<script>window.location.href='?pg=slides&acao=listar';</script>";
              }elseif($inserir->execute() == false and $inserir->execute() != null){
                  $_SESSION['adi_slide'] = 2;
                  echo "<script>window.location.href='?pg=slides&acao=listar';</script>";
              }
          }
      }else
          $_SESSION['adi_slide'] = 3;
          echo "<script>window.location.href='?pg=slides&acao=listar';</script>";
      } 
}
if ($acao == "excluir") {
    $id =$_GET['id'];
    $select = $conexao->prepare("SELECT imagem FROM tb_slider WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dado = $select->fetch(PDO::FETCH_ASSOC);
    $delete = $conexao->prepare("DELETE FROM tb_slider WHERE id = :id");
    $delete->bindValue(":id",$id);
    $imagem = $delete->fetch(PDO::FETCH_ASSOC);
    $imagemQueVaiDeletada = $dado['imagem'];
    if (file_exists($imagemQueVaiDeletada)) {
      unlink('../assets/img/slide/'.$imagemQueVaiDeletada); 
    }
    
    if($delete->execute() === TRUE){
    echo '
    <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Funcionário excluido com sucesso!</strong><a href="" class="alert-link"></a>.
    </div>
    ';
    }else{
      echo '
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Ocorreu um erro na exclusão do funcionário.</strong><a href="" class="alert-link"></a>.
    </div>
  ';
    }
    $acao = "listar";
   }
  ?>
<?php 
  
if ($acao=="ver") {
?>
<section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Adicionar Imagem</h3>
            </div>
            <div class="box-body">
                 <form method="post" enctype="multipart/form-data" action="?pg=slides&acao=adi_slides">
                     <div class="logo col-md-12">
                        <div class="col-md-10">
                           <input name="arquivo" class="btn btn-primary" type="file" /><br />
                        </div>
                        <div class="col-md-2">
                           <input type="submit" class="btn btn-primary" value="Salvar" />
                       </div>
                     </div>
                 </form>
            </div>
          </div>
        </div>
          
      </div>
</section>
<?php
} if($acao=="listar"){
?>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Noticias Cadastradas</h3>
    </div>
    <?php 
      if (isset($_SESSION['adi_slide'])) {
            if ( $_SESSION['adi_slide']== 1 ) {
                echo'<br>
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Imagem cadastrada com sucesso! </strong><a href="" class="alert-link"></a>
                      </div>
                    '; 
                $_SESSION['adi_slide']=0; 
              }
              if ( $_SESSION['adi_slide']== 2 ) {
                echo'<br>
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Erro ao cadastrar imagem! </strong><a href="" class="alert-link"></a>
                      </div>
                    '; 
                $_SESSION['adi_slide']=0; 
              }
              if ( $_SESSION['adi_slide']== 3 ) {
                echo'   <br>
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Apenas arquivos *PNG com o tamanho de 100X64 pixels! </strong><a href="" class="alert-link"></a>
                        </div>
                    ';
                $_SESSION['adi_slide']=0; 
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
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">ID:</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Imagem:</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Ação:</th>
                </tr>
              </thead>
              <tbody>     
                <?php
                  $consulta=$conexao->prepare("SELECT * FROM tb_slider ");
                  $consulta->execute();
                  while ($dado_blog = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $dado_blog['id'] ?></td>
                  <td><?php echo 'assets/img/slide/'.$dado_blog['imagem'] ?></td>
                  <td>
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
                        <a href="?pg=slides&acao=listar&acao=excluir&id=<?php echo $dado_blog['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
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
<?php } ?>


