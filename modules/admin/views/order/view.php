<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordercart */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Замовлення кендібар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ordercart-view">

    <h1><?= 'Замовлення №'.Html::encode($this->title) ?></h1>

    <p>
        <?php // echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

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
                'attribute' => 'qty',
                'value' => function($model){
                    return $model->qty.' шт.';
                },
            ],
            [
                'attribute' => 'sum',
                'value' => function($model){
                    return $model->sum.' грн.';
                },
            ],
            'name',
            [
                'attribute' => 'status',
//                'value' => 'orderStatus',
                'value' => function($model){
                    return Html::a($model->orderStatus, ['/admin/order/update', id => $model->id]);
                },
                'filter' => $filterStatus,
                'format' => 'raw',
            ],
            [
                'attribute' => 'delivery',
                'value' => function($model){
                    return $model->deliveryName;
                },
            ],
            [
                'attribute' => 'payment',
                'value' => function($model){
                    return $model->paymentName;
                },
            ],
            'date',
            'address',
            'phone',
            'comment:ntext',
        ],
    ]) ?>
    
    <?php $items = $model->orderitems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Назва</th>
                    <th>Начинка</th>
                    <th>Фото</th>
                    <th>Ціна</th>
                    <th>кількість</th>
                    <th>вартість</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                
                <tr>
                    <td><?php echo $item->name;?></td>
                    <td><?php echo $item->typeName();?></td>
                    <td><?php echo $item->img;?></td>
                    <td><?php echo $item->price.' грн.';?></td>
                    <td><?php echo $item->qty_item.' шт.';?></td>
                    <td><?php echo $item->sum_item.' грн.';?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

</div>
