<?php 
	if ((isset($_POST['link'])?$_POST['link']:'')) {

	 $cadastrar = $conexao->prepare("UPDATE tb_video SET link=:link");
	 $link = (isset($_POST['link'])?$_POST['link']:'');
	 $url = $link;
		 preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
	 $id = $matches[1];
	 $cadastrar->bindValue(':link' , $id);
	 $cadastrar->execute();
	}
	 $select = $conexao->prepare("SELECT * FROM tb_video");
	 $select->execute();
	 $dados = $select->fetch(PDO::FETCH_ASSOC);

	 
?>
<section class="content-header">
     <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Editar video</h3>
            </div>	  
            <div class="row">
            	<div class="col-md-12" style="margin-left: 2%;">
             	 <p>
             	 	Insira um link de vídeo, para substituir o vídeo da sua pagina, 
             	 	<b>ATENÇÃO: Nos não se responsabilizamos por utilização de conteúdo com direitos autorais!</b>
             	 </p>
             	 <p>Insira o Link do Vídeo:</p>
			        <h4>Vídeo Atual</h4	>
			    </div>
			    <div class="col-md-12">
					<form method="post" enctype="multipart/form-data" action="">
				        <div class="col-md-4  col-md-offset-4">
				            <iframe class="link-video" src="https://www.youtube.com/embed/<?php echo $dados['link'] ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen> 	
				            </iframe>
				        </div>
	                	<div class="col-md-4 col-md-offset-4" >
	                		<input name="link"  class="form-control" type="text" placeholder="Insira o link do vídeo" />
		           		</div>
		           		<div class="col-md-11">
		           			<input type="submit" class="btn btn-primary pull-right" value="Inserir" />
		           		</div>    
	        	   </form>
			    </div>
        	</div>
		  </div>
		</div>
	</div>
</section>