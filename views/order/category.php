<section class="products">
           <div class="products__wrapper products_only">
                <div class="products__filter" data-type="<?php echo $categoryId; ?>">
                    <div class="products__filter-buttons">
                        <span class="products__filter-name product-filter" data-category="0">
                            Весь асортимент
                        </span>
                    </div>
                    <?php foreach (Yii::$app->params['productCategory'][$categoryId] as $key => $filter) : ?>
                    <div class="products__filter-buttons">
                        <span class="products__filter-name product-filter" data-category="<?php echo $key; ?>">
                            <?php echo $filter; ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="products__content">
                    <div class="products__cards product-container">
                        <?php foreach ($products as $product) : ?>
                        <?php $image = $product->getImage(); ?>
                        <div class="products__card">
                            <div class="products__card-pic-wrapper">
                                <img src="<?php echo $image->getUrl();?>" alt="<?php echo $product->name; ?>" class="products__card-pic image">
                                <div class="products__card-zoom"></div>
                            </div>    
                            <div class="products__card-cake-info">
                                <span class="products__cake-name">
                                    <?php echo $product->name; ?>
                                </span>
                                <span class="products__cake-choose" data-id="<?php echo $product->id ?>">
                                    Обрати
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
           </div>
            <div class="products__more">
                <div class="products__more-buttons">
                    <span class="products__more-name product-more" data-initial_limit="<?php echo Yii::$app->params['productPerPageLimit']; ?>">
                        Більше
                    </span>
                </div>
            </div>
        </section>