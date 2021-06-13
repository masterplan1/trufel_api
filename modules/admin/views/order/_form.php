<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordercart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordercart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'created_at')->textInput() ?>

    <?php // echo $form->field($model, 'qty')->textInput() ?>

    <?php // echo $form->field($model, 'sum')->textInput() ?>

    <?php // echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList($model::updateOrderStatus()); ?>

    <?php // echo $form->field($model, 'delivery')->textInput() ?>

    <?php // echo $form->field($model, 'payment')->textInput() ?>

    <?php // echo $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
