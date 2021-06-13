<section class="products">
    <div class="products__wrapper">
        <div class="products__title">
            <p class="products__title-header">
                Начинки
            </p>
            <p class="products__title-description">
                *тут ви можете переглянути можливі варіанти начинок для тортиків і вибрати собі щось за смаком.
            </p>
            <div class="products__decoration-filling-item1"></div>
            <div class="products__decoration-filling-item2"></div>
            <div class="products__decoration-filling-item3"></div>
        </div>
        <div class="products__filter">
            <?php foreach (Yii::$app->params['fillingCategory'] as $key=>$item): ?>
            <?php if($key >= 5){
     continue;
            } ?>
            <div class="products__filter-buttons">
                <span class="products__filter-name filling-filter" data-category="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </span>
            </div>
            <?php endforeach; ?>
           
        </div>
        <div class="products__content">
            <div class="products__cards filling-cards">
                <?php foreach ($fillings as $filling):?>
                <?php $img = $filling->getImage(); ?>
                <div class="products__card filling-card">
                    <div class="products__card-pic-wrapper">
                        <img src="<?php echo $img->getUrl('x400'); ?>" alt="filling" class="products__card-pic">
                        <div class="products__card-active">
                            <h3 class="producrs__card-desc-title"><?php echo $filling->name; ?></h3>

                            <p class="products__card-desc-content">
                                <?php echo $filling->description; ?>
                            </p>

                        </div>
                    </div>
                    <p class="products__card-name">
                        <?php echo $filling->name; ?>
                    </p>
                    <div class="products__card-info">
                        <span class="products__card-price"><?php echo $filling->price; ?> грн/<?php echo ($filling->category_id == 4) ? 'шт' : 'кг'; ?>.</span> <!-- asd -->
                        <span class="products__card-order">від <?php echo $filling->min_weight; ?> <?php echo ($filling->category_id == 4) ? 'шт' : 'кг'; ?>.</span> <!-- asd -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="products__more">
        <div class="products__more-buttons">
            <span class="products__more-name filling-more" data-initial_limit="<?php echo Yii::$app->params['fillingPerPageLimit']; ?>">
                Більше
            </span>
        </div>
    </div>
</section>

