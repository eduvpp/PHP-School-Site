<?php
    $title = "Contato";
    include("templates/menu.php");
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?= URL;?>">Início</a></li>
                    <li class="active">Contato</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="contato">
    <div class="container">
        <div class="row">           
            <div class="col-md-12 title">
                <h1 class="text-left">Contato</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">,
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-map-marker-alt icon"></i>
                    </div>
                <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_localizacao WHERE id ");
                    $consulta->execute();
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {
                            if ($dados->condicao==1) {   
                    ?>
                      <p><?php echo $dados->localizacao;  ?></p> 
                <?php
                        }
                    }    
                ?>    
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-phone fa-rotate-90 icon"></i>
                    </div>
                      <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_telefone WHERE id ");
                    $consulta->execute();
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {
                            if ($dados->condicao==1) {   
                    ?>
                      <p><?php echo $dados->telefone;  ?></p> 
                <?php
                        }
                    }    
                ?>
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-envelope icon"></i>
                    </div>
                    <?php  
                    $consulta=$conexao -> query("SELECT * FROM tb_email WHERE id ");
                    $consulta->execute();
                        while ($dados=$consulta->fetch(PDO::FETCH_OBJ)) {
                            if ($dados->condicao==1) {   
                    ?>
                      <p><?php echo $dados->email;  ?></p> 
                    <?php
                        }
                    }    
                ?>
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left" style="float: left;height: 94px;">
                        <i class="fas fa-rss icon" style="margin-top: 11px;"></i>
                    </div>
                    <div style="float: left;">
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
                                <div>
                                  <span>
                                   <a href="<?php echo $dados->link?>" target="_blank" style="color: #333333"><?php echo $dados->nome?></a><br>
                                   </span>
                                </div>
                                
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
<style>
    #map {
        height: 400px;
    }
    
</style>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBK3jKWe_QeuGphwlI1S6XjbdXNLL0YRs&callback=initMap">
</script>
<?php
    include("templates/footer.php");
?>