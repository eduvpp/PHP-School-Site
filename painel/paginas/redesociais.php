<?php
  if ($acao=="editado") {
   for ($i=0; $i <5 ; $i++) { 
       $check = $i +5;
       $id=$i+1;
       $link = (isset($_POST[$i])?$_POST[$i]:null);
       $condicao = isset($_POST[$check])?'1':'0';
   
       $stmt = $conexao->prepare("UPDATE tb_redesociais SET link=:link, condicao=:condicao WHERE id=:id");
    
             $stmt->bindValue(':id',$id);
             $stmt->bindValue(':link',$link);
             $stmt->bindValue(':condicao',$condicao);
   
             if ($stmt->execute() == TRUE) {
                $_SESSION['rede_s'] = 1;    
                echo "<script> window.location.href='?pg=redesociais&acao=ver';</script>"; 
             }else{
                 
             }
     
   } 
  }
   $consulta=$conexao -> prepare("SELECT * FROM tb_redesociais ORDER BY id ASC");
   $consulta->execute();
   $dados=$consulta->fetchAll();
   ?>
<?php  if ($acao=='ver'){ ?>
<section class="content container-fluid">
  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
			
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Redes Sociais</h3>
            </div>
			  <?php 
	   if (isset($_SESSION['rede_s'])) {
		   if ( $_SESSION['rede_s']== TRUE ) {
			   echo '
               <br>
               <div class="alert alert-success " id="success-alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Redes sociais alteradas com sucesso!</strong><a href="" class="alert-link"></a>.
               </div>
               '; 
			   $_SESSION['rede_s']=false; 
		   }
	   }

   ?>
         <div class="box-body">
			 
            <form action="?pg=redesociais&acao=editado" method="POST" enctype="multipart/form-data">
              <div class="col-md-12"> 
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="5" <?php if ($dados[0][1]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-2">
                 <br><p><b>Youtube</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="0" value="<?php echo $dados[0][3] ; ?>">  
               </div>
             </div>
               <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="6" <?php if ($dados[1][1]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-2">
                 <br><p><b>Blogg</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="1" value="<?php echo $dados[1][3] ; ?>">  
               </div>
             </div>
               <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="7" <?php if ($dados[2][1]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-2">
                 <br><p><b>Google +</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="2" value="<?php echo $dados[2][3] ; ?>">  
               </div>
             </div>
               <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="8" <?php if ($dados[3][1]==1) { echo "checked";}else{}?>>
               </div>
               <div class="col-md-2">
                 <br><p><b>Facebook</b></p>
               </div>
               <div class="col-md-8">
                  <br><input type="text" class="form-control" name="3" value="<?php echo $dados[3][3] ; ?>">  
               </div>
              </div>
              <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="9" <?php if ($dados[4][1]==1) { echo "checked";}else{}?>>
               </div>
               <div class="col-md-2">
                 <br><p><b>Instagram</b></p>
               </div>
               <div class="col-md-8">
                  <br><input type="text" class="form-control" name="4" value="<?php echo $dados[4][3] ; ?>">  
               </div>
              </div>
               <div class="col-md-12">  
         <br> <button type='submit' class="btn btn-primary pull-right">Salvar</button> 
         </div>
         </div>
        
         </form> 
      </div>
   </div>
</div>
</section>
<?php  } ?>