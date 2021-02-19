<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrdercartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordercart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'sum') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'delivery') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
