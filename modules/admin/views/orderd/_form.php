<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'status')->dropDownList($model::updateOrderStatus()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
