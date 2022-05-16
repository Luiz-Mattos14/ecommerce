
<div class="row width-mobile">
    <div class=" col-sm-1 galeria mobile-hidden">
        <?php foreach ($product_images as $img): ?>
            <div class="photo_item">
                <img src="<?php echo BASE_URL; ?>media/products/<?php echo $img['url']; ?> " />
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <div class="photo_primary">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $product_images[0]['url']; ?>" />
        </div></br>

        <div class="col-sm-1 galery desktop-hidden">
            <?php foreach ($product_images as $img): ?>
                <div class="photo_item">
                    <img src="<?php echo BASE_URL; ?>media/products/<?php echo $img['url']; ?> " />
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-sm-4">
        <h2><?php echo $info_product['product_name']; ?></h2>
        <small><?php echo  $info_product['brand_name']; ?></small><br>
        <?php if($info_product['product_review'] != '0'): ?>
            <?php for($q=0;$q<intval($info_product['product_review']);$q++): ?>
                <img src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15" />
            <?php endfor; ?>
        <?php endif; ?>        
        <hr/>
        De: <span class="preco_from">R$<?php echo number_format($info_product['price_from'], 2); ?></span></br>
        Por: <span class="preco_original">R$<?php echo number_format($info_product['price'], 2); ?></span>    


        <form method="POST" class="addcartform" action="javascript:;" onclick="alert()">
            <input type="hidden" name="id_product" value="<?php echo $info_produto['id_product']; ?>" />
            <input type="hidden" name="qt_product" value="1" />
            <button data-action="decrease">-</button>
            <input type="text" name="qt" value="1" class="addcart_qt" disabled />
            <button data-action="increase">+</button>
            <input class='addcart_submit' type='submit' value='Adicionar ao Carrinho' />
            
        </form>

        
    </div>
</div>

<hr/>
<div class="row width-mobile">
<div class="col-sm-12">
        <h3>Descrição produto</h3>
        <p><?php echo $info_product['product_description']; ?></p>
    </div>
    <div class="col-sm-12">
        <hr/><h3>Especificações</h3>
        <?php foreach($product_option as $po): ?>
            <strong><?php echo $po['option_name']; ?></strong>: <?php echo $po['value']; ?><br/>
        <?php endforeach; ?>
    </div>
    
    <div class="col-sm-12">
    <hr/><h3>Avaliações</h3>
        <?php foreach($product_review as $rating): ?>
            <strong><?php echo $rating['user_name']; ?></strong> - 
            <?php for($q=0;$q<intval($rating['punctuation']);$q++): ?>
                <img src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15" />
            <?php endfor; ?>
            <br/>
            "<?php echo $rating['comment']; ?>"
            <hr/>
        <?php endforeach; ?>
    </div>

</div>


<script>

    function alert(){
        Swal.fire({
        icon: "success",
        title: "Obrigado por realizar sua compra no Geek ON",
        timer: 5000
        })
    };

    alert();
</script>