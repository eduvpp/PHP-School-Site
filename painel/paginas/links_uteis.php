<?php 
	if ($acao=="adi_linksuteis") {
		$nome = isset($_POST['nome'])?$_POST['nome']:null;
    	$link = isset($_POST['link'])?$_POST['link']:null;
    	$teste = substr($link, 0,8);
    	$teste2 = substr($link, 0,7); 
	    if ($teste != 'https://' AND $teste2 != 'http://') {
	      $link = 'https://'.$link;
	    }

    	$inserir = $conexao->prepare("INSERT INTO tb_link_uteis(nome,link) VALUES  (:nome,:link)");
    	$inserir->bindValue(':nome',$nome);
    	$inserir->bindValue(':link',$link);
    	if ($inserir->execute() == true) {
    		$_SESSION['adi_linksuteis'] = 1;
            echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>";
    	}elseif ($stmt->execute() == false and $stmt->execute() != null){
          $_SESSION['adi_linksuteis'] = 2;
          echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>"; 
        }
	}
	if ($acao=="edi_linksuteis") {
		$nome = isset($_GET['id'])?$_GET['id']:null;
		$nome = isset($_POST['nome'])?$_POST['nome']:null;
    	$link = isset($_POST['link'])?$_POST['link']:null;
    	$teste = substr($link, 0,8);
    	$teste2 = substr($link, 0,7); 
	    if ($teste != 'https://' AND $teste2 != 'http://') {
	      $link = 'https://'.$link;
	    }

    	$inserir = $conexao->prepare("UPDATE tb_link_uteis SET nome=:nome,link=:link WHERE id=:id");
    	$inserir->bindValue(':nome',$nome);
    	$inserir->bindValue(':link',$link);
    	$inserir->bindValue(':id',$id);

    	if ($inserir->execute() == true) {
    		$_SESSION['edi_linksuteis'] = 1;
            echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>";
    	}elseif ($stmt->execute() == false and $stmt->execute() != null){
          $_SESSION['edi_linksuteis'] = 2;
          echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>"; 
        }
	}
	if ($acao =="adicionar") {
 ?>
<section class="content container-fluid">
	<div class="row">
		    <div class="col-md-12">
		      <div class="box box-success">
		        <div class="box-header with-border">
		          <h3 class="box-title">Adicionar Link</h3>
		        </div>
		        <div class="box-body">
		        	<form action="?pg=links_uteis&acao=adi_linksuteis" method="post" enctype="multipart/form-data">
		        	<div> 
		        		<label>Nome:</label>
		        		<input required type="text" name="nome" class="form-control" placeholder="Nome do link útil...">
		        	</div>
		        	<div> 
		        		<label>Link:</label>
		        		<input required type="text" name="link" class="form-control" placeholder="Ex:.. www.youtube.com/tutorial">
		        	</div>
		        		<br> 
		        		<input type="submit" class="btn btn-primary pull-right" value="Adicionar">
		        	</form>
		        </div>
		      </div>
		    </div>
	</div>
</section>
<?php  } ?>
<?php
	if($acao=="excluir"){
		$id = isset($_GET['id'])?$_GET['id']:null;
		$excluir = $conexao->prepare("DELETE FROM tb_link_uteis WHERE id=:id");
		$excluir->bindValue(':id',$id);
		if($excluir->execute() == true){
			$_SESSION['exclu_linksuteis'] = 1;
            echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>";
		}else{
			$_SESSION['exclu_linksuteis'] = 2;
            echo "<script>window.location.href='?pg=links_uteis&acao=listar';</script>";
		}
	}
    if ($acao=="listar") {
   ?>
<section class="content container-fluid">
	<div class="row">
		    <div class="col-md-12">
		      <div class="box box-success">
		        <div class="box-header with-border">
		          <h3 class="box-title">Links cadastrados</h3>
		        </div>
				  <?php 
	       		if (isset($_SESSION['adi_linksuteis'])) {
				     if ( $_SESSION['adi_linksuteis']== 1 ) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Link adicionado com sucesso!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['adi_linksuteis']=0; 
				     }
				     if ( $_SESSION['adi_linksuteis']== 2 ) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Erro ao adicionar link!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['adi_linksuteis']=0; 
				     }
				}
				if (isset($_SESSION['edi_linksuteis'])) {
				     if ( $_SESSION['edi_linksuteis']== 1 ) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Link editado com sucesso!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['edi_linksuteis']=0; 
				     }
				     if ( $_SESSION['edi_linksuteis']== 2 ) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Erro ao editar link!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['edi_linksuteis']=0; 
				     }
				}
				 if (isset($_SESSION['exclu_linksuteis'])) {
				     if ( $_SESSION['exclu_linksuteis']== 1 ) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Link excluido com sucesso!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['exclu_linksuteis']=0; 
				     }
				      if ( $_SESSION['exclu_linksuteis']== 2) {
				        echo '
				              <br>
				              <div class="alert alert-success " id="success-alert">
				              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				              <strong>Erro ao excluir o link!</strong><a href="" class="alert-link"></a>.
				              </div>
				              '; 
				            $_SESSION['exclu_linksuteis']=0; 
				     }
				   }
		       	 ?>
		        <div class="box-body">
		              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
			                  <th>ID:</th>
			                  <th>Nome:</th>
			                  <th>Link:</th>
			                  <th>Ação:</th>
			                  
			                </tr>
			                </thead>
			                <tbody>
			                	<?php 
			                		$select = $conexao->prepare("SELECT * FROM tb_link_uteis");
			                		$select->execute();
			                		while ($dados=$select->fetch(PDO::FETCH_ASSOC)) {
			                	 ?>
				                <tr>
				                  <td><?php  echo $dados['id'] ?></td>
				                  <td><?php  echo $dados['nome'] ?></td>
				                  <td><?php  echo $dados['link'] ?></td>
				                  <td>
				                  	<a href="?pg=links_uteis&acao=editar&id=<?php echo $dados['id']?>"><button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a>
             					    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $dados['id'] ?>"><i class="fa fa-trash"></i>
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
							<a href="?pg=links_uteis&acao=listar&acao=excluir&id=<?php echo $dados['id'] ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
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

</section>
<?php  }if($acao=="editar"){
?>
<section class="content container-fluid">
	<div class="row">
		    <div class="col-md-offset-1 col-md-10">
		      <div class="box box-success">
		        <div class="box-header with-border">
		          <h3 class="box-title">Editar Link</h3>
		        </div>
		       
		        <div class="box-body">
		        	<?php 
		        				$id = isset($_GET['id'])?$_GET['id']:null;
		                		$select = $conexao->prepare("SELECT * FROM tb_link_uteis WHERE id=:id");
		                		$select->bindValue(':id',$id);
		                		$select->execute();
		                		$dados=$select->fetch(PDO::FETCH_ASSOC);
			                	 ?>
		  
		        	<form action="?pg=links_uteis&acao=edi_linksuteis&id=<?php echo $dados['id'] ?>" method="post" enctype="multipart/form-data">
		        	<div> 
		        		<label>Nome:</label>
		        		<input required type="text" name="nome" value="<?php echo $dados['nome'] ?>" class="form-control">
		        	</div>
		        	<div> 
		        		<label>Link:</label>
		        		<input required type="text" name="link" value="<?php echo $dados['link'] ?>" class="form-control">
		        	</div>
		        		<br> 
		        		<input type="submit" class="btn btn-primary pull-right" value="Adicionar">
		        	</form>
		        </div>
		      </div>
		    </div>
	</div>

</section>

 <?php  } ?>

