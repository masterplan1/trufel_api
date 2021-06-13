<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Filling */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Начинки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="filling-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:html',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x200')}'>",
                'format' => 'raw',
            ],
            [
                'attribute' => 'category_id',
                'value' => function($model){
                    return $model->categoryAll();
                }
            ],
            'price',
            'min_weight',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->statusView();
//                    return $data->status == 1 ? 'активний' : 'неактивний';
                }
            ],
        ],
    ]) ?>

</div>
