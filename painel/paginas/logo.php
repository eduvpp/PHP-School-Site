<?php
		
	if($acao == "editado"){
		if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
   			 $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    		 $nome = $_FILES[ 'arquivo' ][ 'name' ];
   			 $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
   			 $extensao = strtolower ( $extensao );

    	if ( strstr ( '.png', $extensao )) {
	        $novoNome = uniqid(time()). '.' . $extensao;
	        $destino = '../assets/img/logo/' . $novoNome;
	        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
	        	  $select = $conexao->prepare("SELECT * FROM tb_logo");
	        	  $select->execute();
	        	  $dados = $select->fetch(PDO::FETCH_ASSOC);
	        	  unlink("../".$dados['nome']);

	        	  $delete = $conexao->prepare("DELETE FROM  tb_logo WHERE id = :id");
	        	  $delete->bindValue(":id",$dados['id']);
	        	  $delete->execute();

	        	  $destino = 'assets/img/logo/' . $novoNome;
	        	  $inserir = $conexao->prepare("INSERT INTO tb_logo(nome) VALUES(:nome) ");
	        	  $inserir->BindValue(':nome',$destino);
	        	  $inserir->execute();
	        	  


	        }
	    }else
	    echo'		<br>
	                <br>
	                <div class="alert alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <strong>Apenas arquivos *PNG com o tamanho de 100X64 pixels! </strong><a href="" class="alert-link"></a>
	                </div>
	            ';
	    }

	}

	if($acao == "editar"){

?>
		<section class="content container-fluid">
			<div class="row">
		    <!-- left column -->
		    <div class="col-md-12">
		      <div class="box box-success">
		        <div class="box-header with-border">
		          <h3 class="box-title">Editar Logo</h3>
		        </div>
		        <div class="box-body">
				<form method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="acao" value="editado">
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
		      <!--/.col (left) -->
		  </div>
		</section>
<?php 
	}
	if($acao != "editar"){
?>
		<section class="content container-fluid">
			<div class="row">
		    <!-- left column -->
		    <div class="col-md-12">
		      <div class="box box-success">
		        <div class="box-header with-border">
		          <h3 class="box-title">Vizualizar Logo</h3>
		        </div>
		        <div class="box-body">
		        	<div class="logo col-md-12">
		        		<div class="col-md-10">
		        			<?php 
		        				$pasta = "../assets/img/logo/";
		        				$arquivos = glob("$pasta{*.png}", GLOB_BRACE);
								foreach($arquivos as $img){?>
									<img src="<?php echo $img; ?>" alt="" width="88" height="95"/>
								<?php  } 
								?>
			        	</div>
			        	<div class="col-md-2 ">
			        		<a href='?pg=logo&acao=editar'><button type='button' class='btn btn-primary pull-right'>Editar</button></a>
			        	</div>
		        	</div>
		        </div>
		      </div>
		    </div>
		      <!--/.col (left) -->
		  </div>
		</section>
<?php 
	}
?>