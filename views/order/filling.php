<section class="products">
    <div class="products__wrapper">

        <div class="products__content">
            <div class="products__cards filling-cards">
                <?php foreach ($fillings as $filling):?>
                <?php $img = $filling->getImage(); ?>
                <div class="products__card filling-card">
                    <div class="products__card-pic-wrapper filling-pointer filling-order" data-id="<?php echo $filling->id; ?>">
                        <img src="<?php echo $img->getUrl('x400'); ?>" alt="filling" class="products__card-pic">
                        <div class="products__card-active">
                            <h3 class="producrs__card-desc-title"><?php echo $filling->name; ?></h3>

                            <p class="products__card-desc-content product-filling-desc">
                                <?php echo $filling->description; ?>
                            </p>

                        </div>
                    </div>
                    <p class="products__card-name">
                        <?php echo $filling->name; ?>
                    </p>
                    <div class="products__card-info">
                        <span class="products__card-price"><span class="filling-price"><?php echo $filling->price; ?></span> грн/<?php echo (($fillingCatIds == 4) ? 'шт' : 'кг'); ?></span>
                        <span class="products__card-order">від <span class="product__card-weight-min"><?php echo $filling->min_weight; ?></span> <?php echo (($fillingCatIds == 4) ? 'шт' : 'кг'); ?>.</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="products__more">
        <div class="products__more-buttons">
            <span class="products__more-name filling-more" data-filling_order="1" data-filling_cat="<?php echo $fillingCatIds; ?>" data-initial_limit="<?php echo Yii::$app->params['fillingPerPageLimit']; ?>">
                Більше
            </span>
        </div>
    </div>
</section>

