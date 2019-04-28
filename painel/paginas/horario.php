<?php
   for ($i=0; $i <6 ; $i++) { 
       $check = $i +6;
       $id=$i+1;
       $horario = (isset($_POST[$i])?$_POST[$i]:null);
       $condicao = isset($_POST[$check])?'1':'0';
   
       $stmt = $conexao->prepare("UPDATE tb_horario SET horario=:horario, condicao=:condicao WHERE id=:id");
    
             $stmt->bindValue(':id',$id);
             $stmt->bindValue(':horario',$horario);
             $stmt->bindValue(':condicao',$condicao);
   
             if ($stmt->execute() == TRUE) {
                
             }else{
                 
             }
   } 
   $consulta=$conexao -> prepare("SELECT * FROM tb_horario ORDER BY id ASC");
   $consulta->execute();
   $dados=$consulta->fetchAll();
   ?>
<?php  if ($acao=='ver'){ ?>
<section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-offset-1 col-md-10">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Logo</h3>
            </div>
         <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-12"> 
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="6" <?php if ($dados[0][2]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-3">
                 <br><p><b>Incrições</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="0" value="<?php echo $dados[0][1] ; ?>">  
               </div>
             </div>
             <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="7" <?php if ($dados[1][2]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-3">
                 <br><p><b>Resultado</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="1" value="<?php echo $dados[1][1] ; ?>">  
               </div>
              </div>
              <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="8" <?php if ($dados[2][2]==1) { echo "checked";}else{}?>> 
               </div>
               <div class="col-md-3">
                 <br><p><b>Reunião de alinhamento</b></p>
               </div>
               <div class="col-md-8">
                  <br> <input type="text" class="form-control" name="2" value="<?php echo $dados[2][1] ; ?>">  
               </div>
             </div>
             <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="9" <?php if ($dados[3][2]==1) { echo "checked";}else{}?>>
               </div>
               <div class="col-md-3">
                 <br><p><b>Reunião de alinhamento</b></p>
               </div>
               <div class="col-md-8">
                  <br><input type="text" class="form-control" name="3" value="<?php echo $dados[3][1] ; ?>">  
               </div>
             </div>
               <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="10" <?php if ($dados[4][2]==1) { echo "checked";}else{}?>>
               </div>
               <div class="col-md-3">
                 <br><p><b>Matrículas</b></p>
               </div>
               <div class="col-md-8">
                  <br><input type="text" class="form-control" name="4" value="<?php echo $dados[4][1] ; ?>">  
               </div>
             </div>
             <div class="col-md-12">
               <div class="col-md-1">
                  <br><input type="checkbox" data-toggle="toggle" name="11" <?php if ($dados[5][2]==1) { echo "checked";}else{}?>>
               </div>
               <div class="col-md-3">
                 <br><p><b>Matrículas</b></p>
               </div>
               <div class="col-md-8">
                  <br><input type="text" class="form-control" name="5" value="<?php echo $dados[5][1] ; ?>">  
               </div>
              </div>
         </div>
         <div class="col-md-12">  
         <br> <button type='submit' class="btn btn-primary pull-right">Salvar</button> 
         </div>
         </form> 
      </div>
   </div>
</div>
</section>
<?php  } ?>