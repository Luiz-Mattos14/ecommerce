
<?php foreach($list as $featured_item): ?>
<div class="col-md-3">
    <div class="product_item">
        <a href="<?php echo BASE_URL; ?>product/open/<?php echo $featured_item['id_product']; ?>">
            <div class="product_tags">
                <?php if($featured_item["promotion"] == '1'): ?>
                    <div class="product_tag product_tag_red">PROMOÇÃO</div>
                <?php endif; ?>
                <?php if($featured_item["best_sellers"] == '1'): ?>
                    <div class="product_tag product_tag_green">+VENDIDO</div>
                <?php endif; ?>
                <?php if($featured_item["new_product"] == '1'): ?>
                    <div class="product_tag product_tag_blue">NEW!</div>
                <?php endif; ?>
            </div>   
            
            <div class="product_image">
                <img src="<?php echo BASE_URL; ?>media/products/<?php echo $featured_item['images'][0]['url'] ?>" widht="100%"/>
            </div>

            <div class="product_name"><?php echo $featured_item["product_name"]; ?></div>
            <!--<div class="marca_produto"><?php echo $featured_item["brand_name"]; ?></div>-->

            <div class="price_from"><?php 
                if($featured_item["price_from"] != '0') {
                    echo 'R$ ' .number_format($featured_item["price_from"], 2, ',', '.');
                }
            ?></div>
            <div class="price"><?php echo 'R$ ' .number_format($featured_item["price"], 2, ',', '.'); ?></div>


            <div style="clear:both"></div>
        </a>
    </div>
</div>
        

<?php endforeach; ?>
