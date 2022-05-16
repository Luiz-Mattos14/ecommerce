<div class="row width-mobile">
    <h1 class="text-center text-homew"><?php echo $category_name; ?></h1>
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
        echo "</div><div class='row'>";
    } else {
        $a++;
    }

    endforeach; ?>
</div>
