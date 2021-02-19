<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Filling */

$this->title = 'Редагувати начинку: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'до кендібару', 'url' => ['index-candybar']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view-candybar', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагувати';
?>
<div class="filling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcandybar', [
        'model' => $model,
    ]) ?>

</div>
