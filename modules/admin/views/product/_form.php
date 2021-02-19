<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'type', ['options' => ['class' => 'type-category']])->dropDownList(Yii::$app->params['productType']) ?>

    <?php echo $form->field($model, 'category_id', ['options' => ['class' => 'product-category']])->dropDownList(Yii::$app->params['productCategory'][1]) ?>

    <?php echo $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList($model::showStatus()) ?>
    
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
