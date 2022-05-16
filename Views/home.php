<div class="row width-mobile">

   <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active" aria-label="1" aria-current="true"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1" aria-label="2"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2" aria-label="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo BASE_URL; ?>assets/images/banners/banner1.jpg" class="img-fluid d-block" alt="">
                <div class="carousel-caption d-md-block">
                    <a href="<?php echo BASE_URL; ?>categories/enter/1" class="btn btn-dark">Confira agora!</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="<?php echo BASE_URL; ?>assets/images/banners/banner2.jpg" class="img-fluid d-block" alt="">
                <div class="carousel-caption d-md-block">
                    <a href="<?php echo BASE_URL; ?>categories/enter/2" class="btn btn-dark">Confira agora!</a>
                </div>
            </div>


            <div class="carousel-item">
                <img src="<?php echo BASE_URL; ?>assets/images/banners/banner3.jpg" class="img-fluid d-block" alt="">
                <div class="carousel-caption d-md-block">
                    <a href="<?php echo BASE_URL; ?>categories/enter/3" class="btn btn-dark">Confira agora!</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div></br></br></br>
    <?php 
    $a = 0;

    foreach($list as $product_item):
    ?>

    <div class="col-md-3">
        <?php $this->loadView('product_item', $product_item); ?>
    </div>

    <?php
    if($a >= 3) {
        $a = 0;
        echo "</div><div class='row width-mobile'>";
    } else {
        $a++;
    }

    endforeach; ?>
</div>

    </br><div class="text-left text-home">
        Produtos em Destaques<div class="divisao"></div>
    </div>
    <div class="row width-mobile">  
        <!--CHAMANDO O VIEW destaque_item-->
        <?php $this->loadView('featured_item', array('list'=>$viewData['featured'])); ?>
    </div>

    </br><div class="text-left text-home">
    Produtos em Promoção<div class="divisao"></div>
    </div>
    <div class="row width-mobile">  
        <!--CHAMANDO O VIEW destaque_item-->
        <?php $this->loadView('featured_item', array('list'=>$viewData['promotion'])); ?>
    </div>
    
    </br><div class="text-left text-home">
    Produtos bem Avaliados<div class="divisao"></div>
    </div>
    <div class="row width-mobile">  
        <!--CHAMANDO O VIEW destaque_item-->
        <?php $this->loadView('featured_item', array('list'=>$viewData['new_product'])); ?>
    </div>

