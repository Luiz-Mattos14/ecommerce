<div class="product_item">
    <a href="<?php echo BASE_URL; ?>product/open/<?php echo $id_product; ?>">
        <div class="product_tags">
            <?php if($promotion == '1'): ?>
                <div class="product_tag product_tag_red">PROMOÇÃO</div>
            <?php endif; ?>
            <?php if($best_sellers == '1'): ?>
                <div class="product_tag product_tag_green">+VENDIDO</div>
            <?php endif; ?>
            <?php if($new_product == '1'): ?>
                <div class="product_tag product_tag_blue">NEW!</div>
            <?php endif; ?>
        </div>

        <div class="product_image">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $images [0] ['url'] ?>" widht="100%">
        </div>

        <div class="product_name"><?php echo $product_name; ?></div>
        <div class=""></div>

        <div class="price_from">
            <?php if($price_from != '0') {
                echo 'R$ '.number_format($price_from, 2, ',', '.');
            } ?>
        </div>
        <div class="price">
            <?php echo 'R$ '.number_format($price, 2, ',', '.'); ?>
        </div>

        <div style="clear:both"></div>
    </a>
</div>