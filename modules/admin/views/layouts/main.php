<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
$countStatusCakes = app\modules\admin\models\Orderd::countNewStatus();
$countStatusCandybar = app\modules\admin\models\Ordercart::countNewStatus();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => '/admin',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
//            'style' => 'background: yellow;',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Начинки', 'url' => ['/admin/filling/index']],
            ['label' => 'Кендібар', 'url' => ['/admin/filling/index-candybar']],
            ['label' => 'Продукти', 'url' => ['/admin/product/index']],
            ['label' => 'Замовлення кендібар'.$countStatusCandybar, 'url' => ['/admin/order/index']],
            ['label' => 'Замовлення тортів'.$countStatusCakes, 'url' => ['/admin/orderd/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/default/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/admin/default/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php echo Breadcrumbs::widget([
            'homeLink' => ['label' => 'Головна', 'url' => '/admin'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; DiCake Team <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
