<!--  informacoes importantes    -->
<?php 
   if ($acao=="editar_informacoes") {
    $informacoes = (isset($_POST['informacoes'])?$_POST['informacoes']:null);
   
    $stmt = $conexao->prepare('INSERT INTO tb_informacoes (informacoes)VALUES (:informacoes)');
      
      $stmt->bindValue(':informacoes',$informacoes);
      
      if ($stmt->execute() == TRUE) {
       $_SESSION['edit_infor'] = 1;
        echo "<script>window.location.href='?pg=processo_seletivo&acao=ver_informacoes';</script>"; 
      }else{
        echo "";
      }
   }if ($acao=="ver_informacoes") {
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Informações Importantes</h3>
            </div>
            <?php 
               if (isset($_SESSION['edit_infor'])) {
                   if ( $_SESSION['edit_infor']== 1 ) {
                   echo '
                       <br>
                       <div class="alert alert-danger " id="success-alert">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                       <strong>Usuário não pode ser excluido enquanto estiver em uso!</strong><a href="" class="alert-link"></a>.
                       </div>
                       '; 
                     $_SESSION['edit_infor']=0; 
                   }
               }
                ?>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" action="?pg=processo_seletivo&acao=editar_informacoes" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2" ></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="informacoes" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao=="listar_informacoes") {
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar Indice</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Informaçoes</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_informacoes ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->informacoes?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_informacoes&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao=="up_informacoes") {
                   
                 $id = (isset($_GET['id'])?$_GET['id']:null);
                 $informacoes = (isset($_POST['informacoes'])?$_POST['informacoes']:null);
   
                 $stmt = $conexao->prepare("UPDATE tb_informacoes SET informacoes=:informacoes  WHERE id=:id");
      
                   $stmt->bindValue(':id',$id);
                   $stmt->bindValue(':informacoes',$informacoes);
   
                   if ($stmt->execute() == TRUE) {
                        echo "<script>
                          window.location.href='?pg=processo_seletivo&acao=listar_informacoes';
                        </script>"; 
   
                   }else{
                       echo "erro";
                   } 
   }if ($acao=="editar_informacoes") {?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar Editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php 
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $consulta=$conexao -> query("SELECT * FROM tb_informacoes WHERE id=$id");
                  $consulta->execute();
                  $dados=$consulta->fetch(PDO::FETCH_OBJ);   
                  ?>
               <div class="row">
                  <form class="form-horizontal" action="?pg=processo_seletivo&acao=up_informacoes&id=<?php echo $dados ->id?>" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="informacoes" name="editor1"><?php echo $dados ->informacoes?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_informacoes&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }if ($acao=="excluir_informacoes") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_informacoes WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_informacoes'</script>";
        }else{
          echo "erro";
        }
     
   }
   ?>
<!--  cursos    -->
<?php 
   if ($acao=="adicionar_cursos") {
     $cursos = (isset($_POST['inforcursos'])?$_POST['inforcursos']:null);
   
     $stmt = $conexao->prepare('INSERT INTO tb_inforcursos (cursos)VALUES (:cursos)');
       
       $stmt->bindValue(':cursos',$cursos);
       
       if ($stmt->execute() == TRUE) {
         echo "";
          echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_cursos'</script>";
       }else{
         echo "";
       }
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Cursos</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="inforcursos" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }elseif ($acao=="listar_cursos") {
   
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar Cursos</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Informaçoes</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_inforcursos ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->cursos?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_cursos&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="editar_cursos") {
   ?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar Editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $cursos = (isset($_POST['cursos'])?$_POST['cursos']:null);
                  
                  $stmt = $conexao->prepare("UPDATE tb_inforcursos SET cursos=:cursos  WHERE id=:id");
                  
                  $stmt->bindValue(':id',$id);
                  $stmt->bindValue(':cursos',$cursos);
                  
                  if ($stmt->execute() == TRUE) {
                    echo "<script>
                      window.location.href=' ?pg=processo_seletivo&acao=listar_cursos';
                    </script>"; 
                  
                  }else{
                    echo "";
                  } 
                  
                        $consulta=$conexao -> query("SELECT * FROM tb_inforcursos WHERE id=$id");
                        $consulta->execute();
                        $dados=$consulta->fetch(PDO::FETCH_OBJ); 
                  
                        ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" >
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="cursos" name="editor1"><?php echo $dados->cursos?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_cursos&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="excluir_cursos") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_inforcursos WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_cursos'</script>";
        }else{
          echo "";
        }
     
   }
   ?>
<!--  inscriçoes    -->
<?php 
   if ($acao=="adicionar_inscricoes") {
     $incricoes = (isset($_POST['incricoes'])?$_POST['incricoes']:null);
   
     $stmt = $conexao->prepare('INSERT INTO tb_incricoes (incricoes)VALUES (:incricoes)');
       
       $stmt->bindValue(':incricoes',$incricoes);
       
       if ($stmt->execute() == TRUE) {
         echo "";
          echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_inscricoes'</script>";
       }else{
         echo "";
       }
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Inscriçoes</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="incricoes" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }elseif ($acao=="listar_inscricoes") {
   
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar Inscriçoes</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Inscriçoes</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_incricoes ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->incricoes?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_inscricoes&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="editar_inscricoes") {?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar Editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $incricoes = (isset($_POST['incricoes'])?$_POST['incricoes']:null);
                  
                  $stmt = $conexao->prepare("UPDATE tb_incricoes SET incricoes=:incricoes  WHERE id=:id");
                  
                  $stmt->bindValue(':id',$id);
                  $stmt->bindValue(':incricoes',$incricoes);
                  
                  if ($stmt->execute() == TRUE) {
                    echo "<script>
                      window.location.href=' ?pg=processo_seletivo&acao=listar_inscricoes';
                    </script>"; 
                  
                  }else{
                    echo "";
                  } 
                  
                        $consulta=$conexao -> query("SELECT * FROM tb_incricoes WHERE id=$id");
                        $consulta->execute();
                        $dados=$consulta->fetch(PDO::FETCH_OBJ);   
                        ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" >
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="incricoes" name="editor1"><?php echo $dados ->incricoes?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_inscricoes&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="excluir_inscricoes") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_incricoes WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_inscricoes'</script>";
        }else{
          echo "erro";
        }
     
   }
   ?>
<!-- resultado -->
<?php 
   if ($acao=="adicionar_resultado") {
     $resultado = (isset($_POST['resultado'])?$_POST['resultado']:null);
   
     $stmt = $conexao->prepare('INSERT INTO tb_resultado (resultado)VALUES (:resultado)');
       
       $stmt->bindValue(':resultado',$resultado);
       
       if ($stmt->execute() == TRUE) {
          echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_resultado'</script>";
       }else{
         echo "";
       }
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Resultado</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="resultado" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }elseif ($acao=="listar_resultado") {
   
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar Resultado</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_resultado ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->resultado?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_resultado&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="editar_resultado") {?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar Editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $resultado = (isset($_POST['resultado'])?$_POST['resultado']:null);
                  
                  
                  $stmt = $conexao->prepare("UPDATE tb_resultado SET resultado=:resultado  WHERE id=:id");
                  
                  $stmt->bindValue(':id',$id);
                  $stmt->bindValue(':resultado',$resultado);
                  
                  if ($stmt->execute() == TRUE) {
                    echo "<script>
                      window.location.href=' ?pg=processo_seletivo&acao=listar_resultado';
                    </script>"; 
                  
                  }else{
                    echo "";
                  } 
                  
                        $consulta=$conexao -> query("SELECT * FROM tb_resultado WHERE id=$id");
                        $consulta->execute();
                        $dados=$consulta->fetch(PDO::FETCH_OBJ);   
                        ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" >
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="resultado" name="editor1"><?php echo $dados ->resultado?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_resultado&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="excluir_resultado") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_resultado WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_resultado'</script>";
        }else{
          echo "erro";
        }
     
   }
   ?>
<!-- reu alinhamento -->
<?php 
   if ($acao=="adicionar_alinhamento") {
     $reualinhamento = (isset($_POST['reualinhamento'])?$_POST['reualinhamento']:null);
   
     $stmt = $conexao->prepare('INSERT INTO tb_reualinhamento (reualinhamento)VALUES (:reualinhamento)');
       
       $stmt->bindValue(':reualinhamento',$reualinhamento);
       
       if ($stmt->execute() == TRUE) {
         echo "";
          echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_alinhamento'</script>";
       }else{
         echo "";
       }
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Reunião de Alinhamento</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="reualinhamento" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right">Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php  
   }elseif ($acao=="listar_alinhamento") {
   
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Alinhamento</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Informaçoes</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_reualinhamento ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->ReuAlinhamento?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_alinhamento&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="editar_alinhamento") {?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $reualinhamento = (isset($_POST['reualinhamento'])?$_POST['reualinhamento']:null);
                  
                  $stmt = $conexao->prepare("UPDATE tb_reualinhamento SET ReuAlinhamento=:ReuAlinhamento  WHERE id=:id");
                  
                  $stmt->bindValue(':id',$id);
                  $stmt->bindValue(':ReuAlinhamento',$reualinhamento);
                  
                  if ($stmt->execute() == TRUE) {
                    echo "<script>
                      window.location.href=' ?pg=processo_seletivo&acao=listar_alinhamento';
                    </script>"; 
                  
                  }else{
                    
                  } 
                  
                        $consulta=$conexao -> query("SELECT * FROM tb_reualinhamento WHERE id=$id");
                        $consulta->execute();
                        $dados=$consulta->fetch(PDO::FETCH_OBJ);   
                        ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" >
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="reualinhamento" name="editor1"><?php echo $dados ->ReuAlinhamento?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_alinhamento&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="excluir_alinhamento") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_reualinhamento WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_alinhamento'</script>";
        }else{
          echo "erro";
        }
     
   }
   ?>
<!-- matricula -->
<?php 
   if ($acao=="adicionar_matricula") {
     $matriculas = (isset($_POST['matriculas'])?$_POST['matriculas']:null);
   
     $stmt = $conexao->prepare('INSERT INTO tb_matriculas (matriculas)VALUES (:matriculas)');
       
       $stmt->bindValue(':matriculas',$matriculas);
       
       if ($stmt->execute() == TRUE) {
         echo "";
          echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_matricula'</script>";
       }else{
         echo "";
       }
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Matrícula</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <form class="form-horizontal" method="POST">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-4"> Dados das Matriculas</label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="matriculas" name="editor1"></textarea>
                           </body>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success pull-right" >Enviar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }elseif ($acao=="listar_matricula") {
   
   ?>
<section class="content container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Vizualizar Matrículas</h3>
            </div>
            <div class="box-body">
               <div class="logo col-md-12">
                  <table class="table">
                     <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Informaçoes</th>
                        <th scope="col">Ação</th>
                     </thead>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_matriculas ORDER BY id ASC");
                                $consulta->execute();
                                    
                                while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                                ?>
                     <tbody>
                        <tr>
                           <th scope="row"><?php echo $dados->id?></th>
                           <td><?php echo $dados->matriculas?></td>
                           <td> <a href="?pg=processo_seletivo&acao=editar_matricula&id=<?php echo $dados->id?>" class="btn btn-primary">Editar</a></td>
                        </tr>
                     </tbody>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="editar_matricula") {?>
<section class="content container-fluid">
   <div class="row">
   <div class="col-md-12">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">Vizualizar Editar</h3>
         </div>
         <div class="box-body">
            <div class="logo col-md-12">
               <?php
                  $id = (isset($_GET['id'])?$_GET['id']:null);
                  $matriculas = (isset($_POST['matriculas'])?$_POST['matriculas']:null);
                  
                  $stmt = $conexao->prepare("UPDATE tb_matriculas SET matriculas=:matriculas  WHERE id=:id");
                  
                  $stmt->bindValue(':id',$id);
                  $stmt->bindValue(':matriculas',$matriculas);
                  
                  if ($stmt->execute() == TRUE) {
                    echo "<script>
                      window.location.href=' ?pg=processo_seletivo&acao=listar_matricula';
                    </script>"; 
                  
                  }else{
                    echo "";
                  } 
                  
                        $consulta=$conexao -> query("SELECT * FROM tb_matriculas WHERE id=$id");
                        $consulta->execute();
                        $dados=$consulta->fetch(PDO::FETCH_OBJ);   
                        ?>
               <div class="row">
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" >
                     <div class="box-body">
                        <div class="form-group">
                           <label for="nome" class="col-sm-2"></label> 
                        </div>
                        <div class="col-sm-12">
                           <body>
                              <textarea id="editor1" name="matriculas" name="editor1"><?php echo $dados ->matriculas?></textarea>
                           </body>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <div class="col-sm-offset-9">
                           <a class="btn btn-default" href="javascript:window.history.back();">Voltar</a>
                           <button type="submit" class="btn btn-success" >Enviar</button>
                           <a type="submit" class="btn btn-success" href="?pg=processo_seletivo&acao=excluir_matricula&id=<?php echo $dados->id?>">Excluir</a>
                        </div>
                     </div>
                     <!-- /.box-footer -->
                  </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   }else if ($acao=="excluir_matricula") {
        $id = (isset($_GET['id'])?$_GET['id']:null);
        $excluir = $conexao->prepare("DELETE FROM tb_matriculas WHERE id=:id");
        $excluir->bindValue(':id',$id);
        if($excluir->execute()==TRUE){
        echo "<script>window.location.href='?pg=processo_seletivo&acao=listar_matricula'</script>";
        }else{
          echo "erro";
        }
     
   }
   ?>
<!-- horario -->
<?php
   if ($acao=="edit_horario") {
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
                $_SESSION['edit_horario'] = 1;
                echo "<script>window.location.href='?pg=processo_seletivo&acao=ver_horario';</script>";  
              }else{
                 $_SESSION['edit_horario'] = 2;
                echo "<script>window.location.href='?pg=processo_seletivo&acao=ver_horario';</script>"; 
              }
      
    } 
   }
   if ($acao=='ver_horario'){ 
    $consulta=$conexao -> prepare("SELECT * FROM tb_horario ORDER BY id ASC");
    $consulta->execute();
    $dados=$consulta->fetchAll();
   ?>
<section class="content container-fluid">
   <div class="row">
      <!-- left column -->
      <div class="col-md-12">
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Editar Horário</h3>
            </div>
            <?php 
               if (isset($_SESSION['edit_horario'])) {
                 if ( $_SESSION['edit_horario']== 1 ) {
                 echo '
                     <br>
                     <div class="alert alert-success " id="success-alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <strong>Horario editado com sucesso!</strong><a href="" class="alert-link"></a>.
                     </div>
                     '; 
                   $_SESSION['edit_horario']=0; 
                 }
                 if ( $_SESSION['edit_horario']== 2 ) {
                 echo '
                     <br>
                     <div class="alert alert-danger " id="success-alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <strong>Erro ao editar horário!</strong><a href="" class="alert-link"></a>.
                     </div>
                     '; 
                   $_SESSION['edit_horario']=0; 
                 }
               }
               ?>
            <div class="box-body">
               <form action="?pg=processo_seletivo&acao=edit_horario" method="POST" enctype="multipart/form-data">
                  <div class="col-md-12">
                     <div class="col-md-1">
                        <br><input type="checkbox" data-toggle="toggle" name="6" <?php if ($dados[0][2]==1) { echo "checked";}else{}?>> 
                     </div>
                     <div class="col-md-3">
                        <br>
                        <p><b>Incrições</b></p>
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
                        <br>
                        <p><b>Resultado</b></p>
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
                        <br>
                        <p><b>Reunião de alinhamento</b></p>
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
                        <br>
                        <p><b>Reunião de alinhamento</b></p>
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
                        <br>
                        <p><b>Matrículas</b></p>
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
                        <br>
                        <p><b>Matrículas</b></p>
                     </div>
                     <div class="col-md-8">
                        <br><input type="text" class="form-control" name="5" value="<?php echo $dados[5][1] ; ?>">  
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