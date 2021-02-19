<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
$session = Yii::$app->session;
$session->open();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Tru._.fel</title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <header class="header">
        <div class="header__wrapper">
           <div class="header__burger burger">
                <span class="header__burger-line burger_line_first"></span>
                <span class="header__burger-line burger_line_second"></span>
                <span class="header__burger-line burger_line_third"></span>
            </div>
            <div class="header__logo item-logo">
                <p class="header__logo-text item-logo-text">tru</p>
                <img src="/img/svg/cake-logo.svg" alt="cake-logo" class="header__logo-pic item-logo-pic">
                <p class="header__logo-text item-logo-text">fel&nbsp;&nbsp;</p>
            </div>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__item header-main-item">
                        <a href="/" class="header__link">Головна</a>
                    </li>
                    <li class="header__item sub-menu header-catalog-item">
                        <a href="#!" class="header__link catalog-menu">Галерея</a>
                        <ul class="header__sub-menu">
                            <li class="header__sub-item">
                                <a href="<?php echo Url::to(['product/category', 'id' => 1]); ?>" class="header__sub-link">Торти</a>
                            </li>
                            <li class="header__sub-item">
                                <a href="<?php echo Url::to(['product/category', 'id' => 2]); ?>" class="header__sub-link">Капкейки</a>
                            </li>
                            <li class="header__sub-item">
                                <a href="<?php echo Url::to(['candybar/index']); ?>" class="header__sub-link">Candybar</a>
                            </li>
                            <li class="header__sub-item">
                                <a href="<?php echo Url::to(['product/category', 'id' => 4]); ?>" class="header__sub-link">Дієтичні десерти</a>
                            </li>
                            <li class="header__sub-item">
                                <a href="<?php echo Url::to(['product/category', 'id' => 5]); ?>" class="header__sub-link">Подарункові набори</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__item header-filling-item">
                        <a href="<?php echo Url::to(['filling/index']); ?>" class="header__link">Начинки</a>
                    </li>
                    <li class="header__item header-order-item">
                        <a href="<?php echo Url::to(['order/index']); ?>" class="header__link">Створити замовлення</a>
                    </li>
                     <li class="header__item header-contact-item">
                        <a href="/site/index#footer-id" class="header__link">Контакти</a>
                    </li>
                    <li class="header__item header-recall-item">
                        <a href="/site/comment" class="header__link">Відгуки</a>
                    </li> 
                </ul>
                <div class="header__nav-close">
                    <span class="header__nav-close-line"></span>
                    <span class="header__nav-close-line"></span>
                </div>
            </nav>
            
            <!--cart-icon-->
            <a href="/cart/index">
                <div class="header__cart-wrapper">

                    <p class="header__cart-count" style="<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) echo 'display:block;' ?>"><?php 
                        if (isset($_SESSION['cart']['diatery'])) {
                            echo count($_SESSION['cart']) + count($_SESSION['cart']['diatery']) - 1;
                        } else {
                            echo count($_SESSION['cart']);
                        }
                    ?></p>
                    <img src="/img/svg/cart-icon.svg" alt="cart" class="header__cart">
                </div>
            </a>
            <div class="header__instagram">
                <img src="/img/svg/instagram-logo.svg" alt="instagram-logo" class="header__instagram-logo">
                <a href="#!" class="header__instagram-link">tru._.fel</a>
            </div>
            <a href="#" id="up" class="header__scroll-up">
                <span class="header__scroll-pic pic1"></span>
                <span class="header__scroll-pic pic2"></span>
            </a>
        </div>        
    </header>
    <!--    main start-->
    <main class="main">
        <?= Alert::widget() ?>
        <?php echo $content ?>
    </main>

    <!--    main end-->
    <!--   footer start-->
    <footer class="footer" id="footer-id">
        <div class="footer__wrapper">
            <div class="footer__logo item-logo">
                <p class="footer__logo-text item-logo-text">di</p>
                <img src="/img/svg/cake-logo.svg" alt="cake-logo" class="footer__logo-pic item-logo-pic">
                <p class="footer__logo-text item-logo-text">cakes</p>
            </div>
            <div class="footer__content">
                <p class="footer__contact">Контакти:</p>
			    <p class="footer__phone-number">+380934978641</p>
                <p class="footer__phone-number">+380934978641</p>
                <div class="footer__contact-pics">
                    <img src="/img/svg/instagram-footer-icon.svg" alt="instagram-pic" class="footer__instagram-pic">
                    <img src="/img/svg/telegram-footer-icon.svg" alt="telegram-pic" class="footer__telgram-pic">
                    <img src="/img/svg/viber-footer-icon.svg" alt="viber-pic" class="footer__viber-pic">
                </div>

            </div>
        </div>
</footer>
<!--    footer end-->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>