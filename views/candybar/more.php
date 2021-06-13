<div class="products__content">
    <div class="products__cards product-container">
        <?php foreach ($products as $product) : ?>
            <?php $image = $product->getImage(); ?>
            <div class="products__card">
                <div class="products__card-pic-wrapper">
                    <img src="<?php echo $image->getUrl(); ?>" alt="<?php echo $product->name; ?>" class="products__card-pic image">
                    <div class="products__card-zoom"></div>
                </div>    
                <div class="products__card-cake-info">
                    <span class="products__cake-name">
                        <?php echo $product->name; ?>
                    </span>
                    <a href="<?php echo yii\helpers\Url::to(['/candybar/order', 'id' => $product->id]); ?>" class="products__cake-choose">

                        Обрати

                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
