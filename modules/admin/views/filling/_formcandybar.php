<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Filling */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
//echo '<pre>';
//print_r($model);
?>

<div class="filling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($model::getCandybarCategoriesNames()) ?>

    <?= $form->field($model, 'status')->dropDownList($model::showStatusForCandybar()) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
