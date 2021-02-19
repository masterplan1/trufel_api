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
                        <p class="products__sub-title-description">ТЕМАТИКА</p>
                        <img src="/img/svg/candy_bar-right-syn.svg" alt="" class="products__sub-title-img">
                </div>
                <p class="products__title-description products__title-cabdybar product-cake">
                        Будь ласка оберіть спочатку тематику для вашого <br>Candy Bar
                </p>
                <div class="products__candybar-order-notice">
                    <p class="products__candybar-order-desc">Замовлення mini Candy Bar - мінімум за 7 днів.</p>
                    <p class="products__candybar-order-desc">Замовлення повноцінного Candy Bar - мінімум за 14-20 днів.</p>
                </div>

                <div class="products__content">
                    <div class="products__cards candybar-cards">
                        <div class="products__card">
                            <div class="products__card-pic-wrapper">
                                <img src="/img/candy-bar-themes1.jpg" alt="filling" class="products__card-pic">
                            </div>    
                            <div class="products__card-cake-info">
                                <span class="products__cake-name">
                                    <?php echo Yii::$app->params['productCategory'][3][1]; ?>
                                </span>
                                <a href="<?php echo yii\helpers\Url::to(['/candybar/view', 'id' => 1]); ?>" class="products__cake-choose">
                                    Детальніше
                                </a>
                            </div>
                        </div>
                        <div class="products__card">
                            <div class="products__card-pic-wrapper">
                                <img src="/img/candy-bar-themes2.jpg" alt="filling" class="products__card-pic">
                                
                            </div>
                            <div class="products__card-cake-info">
                                <span class="products__cake-name">
                                    <?php echo Yii::$app->params['productCategory'][3][2]; ?>
                                </span>
                                <a href="<?php echo yii\helpers\Url::to(['/candybar/view', 'id' => 2]); ?>" class="products__cake-choose">
                                    Детальніше
                                </a>
                            </div>
                        </div>
                        <div class="products__card">
                            <div class="products__card-pic-wrapper">
                                <img src="/img/candy-bar-themes3.jpg" alt="filling" class="products__card-pic">
                            </div>
                            <div class="products__card-cake-info">
                                <span class="products__cake-name">
                                    <?php echo Yii::$app->params['productCategory'][3][3]; ?>
                                </span>
                                <a href="<?php echo yii\helpers\Url::to(['/candybar/view', 'id' => 3]); ?>" class="products__cake-choose">
                                    Детальніше
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
           </div>
        </section>
        