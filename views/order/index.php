<?php
//$this->registerJsFile('@web/js/datepicker.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('@web/css/datepicker.css');
?>

<section class="order" data-id="<?php echo $id;?>">
    <div class="order__wrapper">
        <div class="order__title">
            <p class="order__title-header">
                Створити замовлення
            </p>

            <!--<div class="products__decoration-candybar-item1"></div>-->
            <div class="products__decoration-candybar-item2"></div>
            <div class="products__decoration-candybar-item3"></div>
        </div>  
        <div class="order__status">
            <div class="order__status-item first first-active">
                <div class="order__status-number order__status-number-active">
                    1
                </div>
            </div>
            <div class="order__status-item second">
                <div class="order__status-number">
                    2
                </div>
            </div>
            <div class="order__status-item third">
                <div class="order__status-number">
                    3
                </div>
            </div>
            <div class="order__status-item forth">
                <div class="order__status-number">
                    4
                </div>
            </div>
            <div class="order__status-item fifth">
                <div class="order__status-number">
                    5
                </div>
            </div>
            <div class="order__status-item sixth">
                <div class="order__status-number">
                    6
                </div>
            </div>
            <!--            <div class="order__status-item seventh">
                        </div>-->
        </div> 

        <p class="order__description">
            Оберіть категорію замовлення
        </p>

        <div class="order__content">

            <!--                    first section of content start-->
            <div class="order__content-cards-first">
                <span class="order__content-card order-cake order-item" data-id1=1>
                    Торт
                </span>
                <span class="order__content-card order-cupcake order-item" data-id1=2>
                    Капкейки
                </span>
                <a href="/candybar/index" class="order-link"><span class="order__content-card order-candybar order-item" data-id1=3>
                    Candybar
                    </span></a>
            </div>  
            <!-- first section of content end --> 

            <!-- second section of content end --> 
            <div class="order__content-cards-2 inactive-status">
                <div class="order__content-cards-second">
                    <span class="order__content-card card-second" data-id2=1>
                        Обрати з наявного
                    </span>
                    <span class="order__content-card card-second" data-id2=2>
                        Cвій варіант
                    </span>
                </div>
                <div class="second__container-actve">
                    
                </div>
            </div>

            <!-- second section of content end-->  

            <!-- third section of content end --> 
            <div class="order__content-cards-2 inactive-status">
                <div class="order__content-cards-second-filling">
                    <span class="order__content-filling">
                        Мінім. замовлення від <span class="order__min-weight">1</span> <span class="order__min-weight-desc">кг</span>.
                    </span>
                </div>
                <div class="filling__container-actve">
                    
                </div>
            </div>

            <!-- third section of content end-->  

            <!-- fourth section of content start-->   
            <div class="order__content-cards-third inactive-status">
                <div class="order__third-item">
                    <span class="order__third-title order-weight-name">Вага</span>
                    <div class="order__third-value">
                        <span class="order__third-value-item order-choose order-minus">-</span>
                        <span class="order__third-value-item order-weight"></span>
                        <span class="order__third-value-item order-choose order-plus">+</span>
                    </div>
                    <span class="order__third-kg order-weight-value">Кг</span>
                </div>
                <div class="order__third-item ">
                    <span class="order__third-title">Ціна</span>
                    <p class="order__third-value order-price">500</p>
                    <span class="order__third-kg">Грн</span>
                </div>

            </div>
            <!-- fourth section of content end-->   



            <!-- fifth section of content start-->
            <div class="order__content-cards-fourth inactive-status">
                <div class="order__content-name">
                    <label class="order__label" for="name">Ваше ім'я:</label>
                    <input type="text" class="order-name" name="name" minlength="3">
                </div>
                <div class="order__content-phone">
                    <label class="order__label" for="phone">номер телефону:</label>
                    <input type="text" class="order-number" name="phone" maxlength="10" placeholder="0123456789">
                </div>
                <div class="order__content-date">
                    <label class="order__label" for="name">дата видачі:</label>
                    <input data-toggle="datepicker" class="order-date" type="text">
                    <!--<textarea data-toggle="datepicker"></textarea>-->
                    <div data-toggle="datepicker"></div>
                </div>
            </div>


            <!-- fifth section of content end-->   
            <!-- sixth section of content start-->
            <div class="order__content-cards-sixth inactive-status">
                <p class="candybar__congratulation-desc order__modify">
                    Вартість декору виробу обговорюється індивідуально<br>в телефонному режимі.
                </p>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Категорія:</span>
                    <span class="order__content-complete order-value order-category-desc">Торт</span>
                </div>

                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Оформлення:</span>
                    <span class="order__content-complete order-value order-decoration-desc">Динозаври</span>
                </div>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Начинка:</span>
                    <span class="order__content-complete order-value order-filling-desc">Бісквітний</span>
                </div>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Вага:</span>
                    <span class="order__content-complete order-value order-weight-desc">3 кг</span>
                </div>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Вартість:</span>
                    <span class="order__content-complete order-value order-price-desc">400 грн.</span>
                </div>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Інформація <br> замовника:</span>
                    <span class="order__content-complete order-value order-customer-desc">Степан, Степаненко, 671234578</span>
                </div>
                <div class="order__contnet-item">
                    <span class="order__content-complete order-name">Дата видачі:</span>
                    <span class="order__content-complete order-value order-date-desc">4.05.20</span>
                </div>
            </div>
            <!-- sixth section of content end--> 

        </div>
        <div class="order__buttons">
            <span class="order__button back-button">Крок назад</span>
            <span class="order__button forward-button">Далі</span>
            <span class="error-container"></span>
        </div>
    </div>

</section>


