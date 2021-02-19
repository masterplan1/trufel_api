<?php use app\models\Filling; ?>
<section class="products">
    <div class="products__wrapper candybar__wrapper">
        <div class="products__title">
            <p class="products__title-header">
                КОШИК
            </p>
            <p class="products__title-description products__title-cabdybar product-cake">
                Заповніть та перевірте дані вашого замовлення 
            </p>
            <div class="products__decoration-candybar-item1"></div>
            <div class="products__decoration-candybar-item2"></div>
            <div class="products__decoration-candybar-item3"></div>
            <div class="products__decoration-candybar-item4"></div>
        </div>

        <div class="cart__wrapper">
          
            <?php if(!empty($session['cart'])) : ?>
            <?php foreach ($session['cart'] as $key => $item) : ?>
            <?php if($key == 'diatery') continue; ?>
            <?php   $filling = Filling::findOne($key); 
                    $categoryId = $filling->category_id;
                    $minQuantity = Yii::$app->params['fillingCandybarCategory'][$categoryId]['min_quantity'];
                    $categories = Filling::find()->select(['id', 'name'])->where(['category_id' => $categoryId])->asArray()->all();
                    
            ?>
            <div class="candybar__cart-content" data-id="<?php echo $key; ?>">
                <img src="/img/<?php echo Yii::$app->params['fillingCandybarCategory'][$categoryId]['img']; ?>" alt="" class="modal_image">
                <div class="candybar__order-modal-desc modal-desc1">
                    <h3 class="modal__title"><?php echo Filling::getCandybarCategoriesNames()[$categoryId]; ?></h3>
                    <label for="filling-category" class="modal__label">Начинка</label>
                    <select name="" id="filling-category" class="modal__select modal__select-cart">
                        <?php foreach ($categories as $category) : ?>
                        <option class="modal__option" <?php if($filling->id == $category['id']){echo 'selected';} ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="candybar__modal-quantity">
                        <span class="candybar__modal-quantity-desc">
                            Кількість
                        </span>
                        <div class="candybar__modal-quantity-value">
                            <span class="quantity-value-minus1" data-value="<?php echo $minQuantity; ?>">-</span>
                            <span class="quantity-value1"><?php echo $item['qty']; ?></span>
                            <span class="quantity-value-plus1">+</span>
                        </div>
                        <span class="candybar__modal-quantity-desc">
                            Шт.
                        </span>
                    </div>
                    <span class="products__card-price candybar-order__price"><?php echo $item['price']; ?> грн/шт</span>
                </div>
                <div class="candybar__remove-button">
                    <span class="candybar__remove-button-item1"></span>
                    <span class="candybar__remove-button-item2"></span>
                </div>     
            </div>
            <?php endforeach;?>
            
                <?php if(!empty($_SESSION['cart']['diatery'])): ?>
                    <?php foreach ($_SESSION['cart']['diatery'] as $key => $item) : ?>
            <?php   $product = \app\models\Product::findOne($key); 
//            echo '<pre>';
//   var_dump($product);
//   exit;
                    $image = $product->getImage();                   
            ?>
            <div class="candybar__cart-content" data-id="<?php echo $key; ?>">
                <img src="<?php echo $image->getUrl();?>" alt="" class="modal_image">
                <div class="candybar__order-modal-desc modal-desc1">
                    <h3 class="modal__title"><?php echo $product->name; ?></h3>
<!--                    <label for="filling-category" class="modal__label">Начинка</label>
                    <select name="" id="filling-category" class="modal__select modal__select-cart">
                        <?php // foreach ($categories as $category) : ?>
                        <option class="modal__option" <?php // if($filling->id == $category['id']){echo 'selected';} ?> value="<?php // echo $category['id']; ?>"><?php // echo $category['name']; ?></option>
                        <?php // endforeach; ?>
                    </select>-->
                    <div class="candybar__modal-quantity">
                        <span class="candybar__modal-quantity-desc">
                            Кількість
                        </span>
                        <div class="candybar__modal-quantity-value">
                            <span class="quantity-value-minus1" data-value="<?php echo $minQuantity; ?>">-</span>
                            <span class="quantity-value1"><?php echo $item['qty']; ?></span>
                            <span class="quantity-value-plus1">+</span>
                        </div>
                        <span class="candybar__modal-quantity-desc">
                            Шт.
                        </span>
                    </div>
                    <span class="products__card-price candybar-order__price"><?php echo $item['price']; ?> грн/шт</span>
                </div>
                <div class="candybar__remove-button" data-type="2">
                    <span class="candybar__remove-button-item1"></span>
                    <span class="candybar__remove-button-item2"></span>
                </div>     
            </div>
            <?php endforeach; ?>
            
                <?php endif; ?>
            <?php else: ?>
            <p style="text-align: center">Кошик порожній</p>
           <?php endif; ?> 
            <?php // echo '<pre>';
//                    print_r($session['cart']);
//                    unset($session['cart.qty']);
//                    unset($session['cart.sum']);
//                    print_r($session['cart.qty']);
//                    echo '<br>';
//                    print_r($session['cart.sum']); echo '<br>';
//                    print_r($session['category']);
//                    echo '<br>';
//                    echo Yii::$app->request->referrer;
//                    var_dump(strpos(Yii::$app->request->referrer, '/product/category') || strpos(Yii::$app->request->referrer, '/candybar/order'));
            ?>
        </div>
        <div class="candybar__order-sum-line">
            <a href="<?php 
            if(strpos(Yii::$app->request->referrer, '/product/category') || strpos(Yii::$app->request->referrer, '/candybar/order')){
                echo Yii::$app->request->referrer;
            }else{
                echo yii\helpers\Url::to(['/candybar/index']);
            } 
            ?>" class="order-link"><span class="candybar__modal-button1">Продовжити покупки</span></a>
            <!--<a href="<?php // echo yii\helpers\Url::to(['/candybar/order', 'id' => $session['category']]); ?>" class="order-link"><span class="candybar__modal-button1">Продовжити покупки</span></a>-->
            <!--<a href="<?php // echo Yii::$app->request->referrer; ?>" class="order-link"><span class="candybar__modal-button1">Продовжити покупки</span></a>-->
            <?php if(!empty($_SESSION['cart'])) : ?>
            <a href="/order/create-diatery" class="order-diatery"><span class="products__cake-choose">Оформити</span></a>
            
            <div class="candybar__order-sum-price">
                <span class="candybar__order-sum-price-desc">Ціна</span>
                <span class="candybar__order-sum-price-val"><?php echo $session['cart.sum']; ?></span>
                <span class="candybar__order-sum-price-uah">грн</span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>