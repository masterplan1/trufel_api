<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordercart */

$this->title = 'Create Ordercart';
$this->params['breadcrumbs'][] = ['label' => 'Ordercarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordercart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
