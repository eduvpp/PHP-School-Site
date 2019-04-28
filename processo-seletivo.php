<?php
   $title = "Processo Seletivo";
      include("templates/menu.php");
   ?>
<?php
   $consulta=$conexao -> query("SELECT * FROM tb_horario ORDER BY id ASC");
   $consulta->execute();
   
   $horario=$consulta->fetchAll(); 
   
   ?>
<section class="breadcrumb-main">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <ol class="breadcrumb">
               <li><a href="<?= URL;?>">Início</a></li>
               <li class="active">Processo seletivo</li>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="proc-seletivo">
   <div class="container">
      <div class="row">
         <div class="col-md-12 title">
            <h1 class="text-left">Processo seletivo</h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <ul class="timeline">
               <li>
                  <div class="timeline-badge success">
                     <i class="fas fa-info"></i>
                  </div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4 class="timeline-title">Informações importantes</h4>
                     </div>
                     <div class="timeline-body">
                        <?php
                           $consulta=$conexao -> query("SELECT * FROM tb_informacoes ORDER BY id ASC");
                           $consulta->execute();
                           
                           while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                           
                           ?>
                        <ul class="list">
                           <li>
                              <?php echo $dados->informacoes;  ?>
                           </li>
                        </ul>
                        <?php
                           }
                                 	    ?>								
                     </div>
                     <div class="timeline-heading">
                        <h4>Cursos</h4>
                     </div>
                     <div class="timeline-body">
                        <?php
                           $consulta=$conexao -> query("SELECT * FROM tb_inforcursos ORDER BY id ASC");
                           $consulta->execute();
                           
                           while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                           
                           ?>
                        <ul class="list">
                           <li>
                              <?php echo $dados->cursos;  ?>
                           </li>
                        </ul>
                        <?php
                           }
                                 	    ?>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-badge success">
                     <i class="fas fa-check"></i>
                  </div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4 class="timeline-title">Incrições</h4>
                        <p><small class="text-muted"><?php if ($horario[0][2]==1){echo '<i class="far fa-clock"></i>'.$horario[0][1];}?></small></p>
                     </div>
                     <div class="timeline-body">
                        <?php
                           $consulta=$conexao -> query("SELECT * FROM tb_incricoes ORDER BY id ASC");
                           $consulta->execute();
                           
                           while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                           
                           ?>
                        <ul class="list">
                           <li>
                              <?php echo $dados->incricoes;  ?>
                           </li>
                        </ul>
                        <?php
                           }
                                 	    ?>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge success">
                     <i class="fas fa-tasks"></i>
                  </div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4 class="timeline-title">Resultado</h4>
                        <p><small class="text-muted"><?php if ($horario[1][2]==1){echo '<i class="far fa-clock"></i>'.$horario[1][1];}?></small></p>
                     </div>
                     <div class="timeline-body">
                        <?php
                           $consulta=$conexao -> query("SELECT * FROM tb_resultado ORDER BY id ASC");
                           $consulta->execute();
                           
                           while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                           
                           ?>
                        <ul class="list">
                           <li>
                              <?php echo $dados->resultado;  ?>
                           </li>
                        </ul>
                        <?php
                           }
                                 	    ?>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-badge success">
                     <i class="fas fa-users"></i>
                  </div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4 class="timeline-title">Reunião de alinhamento</h4>
                        <p class="time-2"><small class="text-muted"><?php if ($horario[2][2]==1){echo '<i class="far fa-clock"></i>'.$horario[2][1];}?></small></p>
                        <p><small class="text-muted"><?php if ($horario[3][2]==1){echo '<i class="far fa-clock"></i>'.$horario[3][1];}?></small></p>
                     </div>
                     <?php
                        $consulta=$conexao -> query("SELECT * FROM tb_reualinhamento ORDER BY id ASC");
                        $consulta->execute();
                        
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                        
                        ?>
                     <ul class="list">
                        <li>
                           <?php echo $dados->ReuAlinhamento;  ?>
                        </li>
                     </ul>
                     <?php
                        }
                              	    ?>
                  </div>
               </li>
               <li>
                  <div class="timeline-badge success">
                     <i class="fas fa-check"></i>
                  </div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4 class="timeline-title">Matrículas</h4>
                        <p class="time-2"><small class="text-muted"><?php if ($horario[4][2]==1){echo '<i class="far fa-clock"></i>'.$horario[4][1];}?></small></p>
                        <p><small class="text-muted"><?php if ($horario[5][2]==1){echo '<i class="far fa-clock"></i>'.$horario[5][1];}?></small></p>
                     </div>
                     <div class="timeline-body">
                        <?php
                           $consulta=$conexao -> query("SELECT * FROM tb_matriculas ORDER BY id ASC");
                           $consulta->execute();
                           
                           while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {	
                           
                           ?>
                        <ul class="list">
                           <li>
                              <?php echo $dados->matriculas;  ?>
                           </li>
                        </ul>
                        <?php
                           }
                          ?>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<?php
   include("templates/footer.php");
   ?>