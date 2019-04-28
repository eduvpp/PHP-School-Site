<?php  
  if($acao == "ver"){
    
    $consulta=$conexao -> query("SELECT * FROM tb_blog_lei ORDER BY id ASC");
    $consulta->execute();
    $dados=$consulta->fetch(PDO::FETCH_OBJ); 

if (isset($_SESSION['blog'])) {
    if ( $_SESSION['blog']== TRUE) {
       echo '
             <br>
             <div class="alert alert-success " id="success-alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <strong>Usuário editado com sucesso!</strong><a href="" class="alert-link"></a>.
             </div>
             '; 
           $_SESSION['blog']=false; 
    } 
  } 
  
  ?>
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Blog do lei</h3>
        </div>
        <div class="box-body">
          <div class="logo col-md-12">
            <form class="form-horizontal" method="POST" action="?pg=blog_lei&acao=editar">
              <div class="box-body">
                <div class="form-group">
                  <label for="nome" class="col-sm-1 control-label" >Link:</label>
                  <div class="col-sm-10">
                    <input type="text" name="link" class="form-control" maxlength="100" value="<?php echo $dados->link; ?>">
                  </div>
                  <button type="submit"  class="btn btn-success">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  }
  if ($acao=="editar") {
    $link = (isset($_POST['link'])?$_POST['link']:null);
    $teste = substr($link, 0,8);
      if ($teste != 'https://') {
        $link = 'https://'.$link;
      }
    $stmt = $conexao->prepare("UPDATE tb_blog_lei SET link=:link WHERE id=:id");             
    $stmt->bindValue(':id',1);
    $stmt->bindValue(':link',$link);  

    $_SESSION['blog'] =$stmt->execute();            
  if ($stmt->execute() == TRUE) {
   echo "<script>window.location.href='?pg=blog_lei&acao=ver'</script>";
  }else{
  echo "erro";
  } 
  }
  ?>