<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderd */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Замовлення тортиків', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orderd-view">

    <h1><?= 'Замовлення №'.Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'value' => function($data){
                    return date('d.m.y H:i', $data->created_at);
                }
            ],
            [
                'attribute' => 'product_img',
                'value' => function($model){
                    return $model->getProductImg();
                },
                'format' => 'raw',
                    
            ],
            [
                'attribute' => 'product_id',
                'value' => function($model){
                    return $model->productById() ? $model->productById()->name : 'свій варіант';
                },
            ],
            [
                'attribute' => 'filling_img',
                'value' => function($model){
                    return $model->getFillingImg();
                },
                'format' => 'raw',
                    
            ],
            [
                'attribute' => 'filling_id',
                'value' => function($model){
                    return $model->fillingById() ? $model->fillingById()->name : 'не знайдено';
                },
            ],
            [
                'attribute' => 'weight',
                'value' => function($model){
                    return $model->weight.' '.$model->weightValue();
                },
            ],
            [
                'attribute' => 'total_price',
                'value' => function($model){
                    return $model->total_price.' грн.';
                },
            ],
            'date',
            [
                'attribute' => 'status',
//                'value' => 'orderStatus',
                'value' => function($model){
                    return Html::a($model->orderStatus, ['/admin/orderd/update', id => $model->id]);
                },
                'filter' => app\modules\admin\models\Orderd::filterOrderStatus(),
                'format' => 'raw',
            ],
            'customer_name',
            'customer_phone',
        ],
    ]) ?>

</div>
