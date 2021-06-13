<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Filling */

$this->title = 'Створити начинку';
$this->params['breadcrumbs'][] = ['label' => 'Начинки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
