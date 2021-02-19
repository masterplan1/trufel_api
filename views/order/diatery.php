<?php
//$this->registerJsFile('@web/js/datepicker.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('@web/css/datepicker.css');
?>


<section class="products candybar__get-order">
           <div class="products__wrapper candybar__wrapper">
                <div class="products__title">
                    <p class="products__title-header">
                        Оформити замовлення
                    </p>
                    <p class="candybar__get-order-desc">
                        Заповніть та перевірте дані вашого замовлення 
                   </p>
                    <div class="products__decoration-candybar-item1"></div>
                    <div class="products__decoration-candybar-item2"></div>
                    <div class="products__decoration-candybar-item3"></div>
                    <div class="products__decoration-candybar-item4"></div>
                </div>
                
                <div class="candybar__get-order-content">
                   <div class="candybar__get-order-info">
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Ваше ім’я</span>
                           <input type="text" class="candybar__get-order-info-input name-value" placeholder="" minlength="2">
                       </div>
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Телефон</span>
                           <input type="text" class="candybar__get-order-info-input phone-value" placeholder="0933333333" maxlength="10">
                       </div>
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Дата оформлення замовлення</span>
                           <input type="text" data-toggle="datepicker" class="candybar__get-order-info-input input-date">
                       </div>
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Спосіб доставки</span>
                           <select value="" class="candybar__get-order-delivery delivery-value">
                               <?php foreach (Yii::$app->params['deliveryType'] as $key => $item) : ?>
                               <option value="<?php echo $key;?>" class="candybar__get-order-delivery-item"><?php echo $item;?></option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Адреса доставки</span>
                           <input type="text" class="candybar__get-order-info-input input-address" placeholder="м. Обухів, вул.Київська">
                       </div>
                       <div class="candybar__get-order-info-item">
                           <span class="candybar__get-order-info-title">Спосіб оплати</span>
                           <select value="" class="candybar__get-order-delivery payment_method-value">
                               <?php foreach (Yii::$app->params['paymentType'] as $key => $item) : ?>
                               <option value="<?php echo $key;?>" class="candybar__get-order-delivery-item"><?php echo $item;?></option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="candybar__get-order-price-item">
                           <span class="candybar__get-order-price-item-name">Ціна</span>
                           <span class="candybar__get-order-price-item-value"><?php echo $session['cart.sum']; ?></span>
                           <span class="candybar__get-order-price-item-uah">грн.</span>
                           <div class="error-show">
                               error
                           </div>
                       </div>
                       
                       
                   </div>
                   <p class="candybar__get-order-comment-desc">
                       Вартість декору виробу обговорюється індивідуально<br>в телефонному режимі 
                   </p>
                    <textarea class="candybar__get-order-comment" placeholder="Залишити коментар..."></textarea>
                </div>
                <div class="candybar__get-order-buttons">
                    <a href="<?php echo yii\helpers\Url::to(['/cart/index']); ?>" class="order-link">
                        <span class="candybar__get-order-botton botton-back">Крок назад</span>
                    </a>
                    
                    <span class="candybar__get-order-botton botton-get">Оформити</span>
                </div>
           </div>
        </section>