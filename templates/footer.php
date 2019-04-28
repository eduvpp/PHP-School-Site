<footer>
   <div class="col-md-12 infor">
      <div class="container">
         <div class="row">
            <div class="col-xs-7 col-sm-3 col-md-3">
               <p class="font-weight-bold title-footer">Sobre</p>
                <div class="text-footer ">
               <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_sobre WHERE id ");
                    $consulta->execute();
                    $dados=$consulta->fetch(PDO::FETCH_ASSOC);
                     
                  ?>
                 
                    <p class="text-footer text-justify">
                      <?php echo substr($dados['descricao'], 0, 195);?></p>
                  </div>
            </div>
            <div class="col-xs-5 col-sm-3 col-md-3">
               <p class="font-weight-bold title-footer">Institucional</p>
               <ul class="text-footer menu-footer">
                  <li><a href="<?= URL.'sobre.php';?>">Sobre</a></li>
                  <li><a href="<?= URL.'blog.php';?>">Blog</a></li>
                  <li><a href="<?= URL.'contato.php';?>">Contato</a></li>
                  <li><a href="<?= URL.'downloads.php';?>">Download</a></li>
               </ul>
            </div>
            <div class="col-xs-7 col-sm-3 col-md-3">
               <p class="font-weight-bold title-footer">Contato</p>
               <div class="text-footer">
                  <p><i class="fas fa-map-marker-alt"></i> <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_localizacao WHERE id ");
                    $consulta->execute();
                     $dados=$consulta->fetchAll();
                     echo $dados[0][1];  
                  ?>   
                  </p>
                  <p><i class="fas fa-phone fa-rotate-90"></i> 
                  <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_telefone WHERE id ");
                    $consulta->execute();
                     $dados=$consulta->fetchAll();
                     echo $dados[0][1];
                  ?>
                  </p>
                  <p><i class="fas fa-envelope"></i> 
                  <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_email WHERE id ");
                    $consulta->execute();
                     $dados=$consulta->fetchAll();
                     echo $dados[0][1];
                  ?>
               </p>
               </div>
            </div>
            <div class="col-xs-5 col-sm-3 col-md-3">
               <p class="font-weight-bold title-footer">Redes Sociais</p>
               <div class="redes text-footer">
                  <?php
                     $consulta=$conexao -> query("SELECT * FROM tb_redesociais ORDER BY id ASC");
                     $consulta->execute();
                         
                     while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {   
                             if($dados->condicao==1) { 
                                $teste = substr($dados->link, 0,8);
                              if ($teste != 'https://') {
                              $dados->link = 'https://'.$dados->link;
                              }   
                     ?>
                  <a href="<?php echo $dados->link?>" target="_blank">
                  <i class="<?php echo $dados->icone?>"></i>
                  </a>
                  <?php
                     }
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="rodape text-center col-md-12">                
      <small class="offset-md-2">Copyright &copy; 2017</small>
   </div>
</footer>
<!-- JQUERY -->
<script src="<?= URL.'assets/js/vendor/jquery-3.2.1.min.js';?>" type="text/javascript"></script>
<!-- BOOTSTRAP -->
<script src="<?= URL.'assets/js/vendor/bootstrap.min.js';?>" type="text/javascript"></script>
<!-- ANIMÃÇÃO NÚMERO -->
<script src="<?= URL.'assets/js/vendor/jquery.animateNumber.js';?>"></script>
<!-- LIGHTBOX -->
<script src="<?= URL.'assets/js/vendor/jquery.magnific-popup.min.js';?>"></script>
<!-- SLIDERS -->
<script src="<?= URL.'assets/js/vendor/slick.min.js';?>"></script>
<!-- MAIN JS -->
<script src="<?= URL.'assets/js/main.js';?>" type="text/javascript"></script>
</body>
</html>