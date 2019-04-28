<?php
    $title = "Contato";
    include("../templates/menu.php");
?>

<section class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Início</a></li>
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
                    <p>Tv. Pedro Araújo, 2 - Ipiranga</p>
                    <p>Russas - CE</p>
                    <p>62900-000, Brasil</p>
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-phone fa-rotate-90 icon"></i>
                    </div>
                    <p>(88) 99999-9999</p>
                    <p>(88) 99999-9999</p>
                    <p>(88) 99999-9999</p>
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-envelope icon"></i>
                    </div>
                    <p>epwalquer@gmail.com</p>
                    <p>epwalquer@gmail.com</p>
                    <p>epwalquer@gmail.com</p>
                </div>
                <div class="blockquote-box blockquote-success clearfix">
                    <div class="square pull-left">
                        <i class="fas fa-rss icon"></i>
                    </div>
                    <p>facebook</p>
                    <p>blog</p>
                    <p>youtube</p>
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
    include("../templates/footer.php");
?>