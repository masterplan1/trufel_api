<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Filling */

$this->title = 'Додати позицію кендібару';
$this->params['breadcrumbs'][] = ['label' => 'Солодощі кендібару', 'url' => ['index-candybar']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcandybar', [
        'model' => $model,
    ]) ?>

</div>
