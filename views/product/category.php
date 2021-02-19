        <section class="products">
           <div class="products__wrapper products_only">
                <div class="products__title">
                    <p class="products__title-header">
                        <?php echo Yii::$app->params['productType'][$id]; ?>
                    </p>
                    <p class="products__title-description product-cake">
                        <?php echo \app\models\Product::findDesc($id); ?>
                   </p>
                   <div class="products__decoration-<?php echo \app\models\Product::findDecoration($id); ?>-item1"></div>
                    <div class="products__decoration-<?php echo \app\models\Product::findDecoration($id); ?>-item2"></div>
                    <div class="products__decoration-<?php echo \app\models\Product::findDecoration($id); ?>-item3"></div>
                    <div class="products__decoration-<?php echo \app\models\Product::findDecoration($id); ?>-item4"></div>
                </div>
               
                <div class="products__filter" data-type="<?php echo $id; ?>">
                    <div class="products__filter-buttons">
                        <span class="products__filter-name product-filter" data-category="0">
                            Весь асортимент
                        </span>
                    </div>
                    <?php foreach (Yii::$app->params['productCategory'][$id] as $key => $filter) : ?>
                    <div class="products__filter-buttons">
                        <span class="products__filter-name product-filter" data-link="1" data-category="<?php echo $key; ?>">
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
                                <a href="<?php echo yii\helpers\Url::to(['/order/index', 'id' => $product->id]); ?>" class="products__cake-choose">
                                    
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
                    <span class="products__more-name product-more" data-link="1" data-initial_limit="<?php echo Yii::$app->params['productPerPageLimit']; ?>">
                        Більше
                    </span>
                </div>
            </div>
        </section>

