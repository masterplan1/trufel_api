<section class="products">
           <div class="products__wrapper">
                <div class="products__title">
                    <p class="products__title-header">
                        CANDYBAR
                    </p>
                    <p class="products__title-description products__title-cabdybar product-cake">
                        *В даному розділі ви можете ознайомитись та вибрати за вподобанням оформлення та вироби для Вашого майбутнього Candi Bar(у)
                   </p>
                    <div class="products__decoration-candybar-item1"></div>
                    <div class="products__decoration-candybar-item2"></div>
                    <div class="products__decoration-candybar-item3"></div>
                    <div class="products__decoration-candybar-item4"></div>
                </div>
                <div class="products__sub_title-header">
                       
                        <img src="/img/svg/candy_bar-left-syn.svg" alt="" class="products__sub-title-img">
                        <p class="products__sub-title-candybar-description"><?php echo Yii::$app->params['productCategory'][3][$id]; ?></p>
                        <img src="/img/svg/candy_bar-right-syn.svg" alt="" class="products__sub-title-img">
                </div>
                <p class="products__title-description products__title-cabdybar product-cake">
                        Будь ласка оберіть варіанти оформлення Candy Bar 
                    в категорії “<span class="products__category-name">Весілля</span>”
                </p>
                <div class="products__candybar-order-notice">
                    <p class="products__candybar-order-desc">Замовлення mini Candy Bar - мінімум за 7 днів.</p>
                    <p class="products__candybar-order-desc">Замовлення повноцінного Candy Bar - мінімум за 14-20 днів.</p>
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
                                <a href="<?php echo yii\helpers\Url::to(['/candybar/order', 'id' => $product->id]); ?>" class="products__cake-choose">
                                    
                                        Обрати
                                    
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
           </div>
            <div class="products__more">
                <div class="products__more-buttons">
                    <span class="products__more-name candybar-more" data-category_id="<?php echo $id; ?>" data-initial_limit="<?php echo Yii::$app->params['productPerPageLimit']; ?>">
                        Більше
                    </span>
                </div>
            </div>
        </section>
