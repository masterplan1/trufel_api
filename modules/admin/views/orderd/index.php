<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Замовлення тортиків та капкейків';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderd-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>-->
        <?php // echo Html::a('Create Orderd', ['create'], ['class' => 'btn btn-success']) ?>
    <!--</p>-->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['style' => 'width: 70px;'],
            ],
            [
                'attribute' => 'created_at',
                'value' => function($data){
                    return date('d.m.y H:i', $data->created_at);
                }
            ],
//            'product_id',
//            [
//                'attribute' => 'filling_id',
//                'value' => function($model){
//                    if($model->product_id > 0){
//                        return $model->product->name;
//                    }
//                    if($model->product_id == -1){
//                        return 'свій варіант капкейка';
//                    }
//                    if($model->product_id == -2){
//                        return 'свій варіант торта';
//                    }
//                },
//            ],
            'weight',
            'total_price',
//            'date',
            'customer_name',
            [
                'attribute' => 'status',
//                'value' => 'orderStatus',
                'value' => function($model){
                    return Html::a($model->orderStatus, ['/admin/orderd/view', id => $model->id]);
                },
                'filter' => app\modules\admin\models\Orderd::filterOrderStatus(),
                'format' => 'raw',
            ],
            
            //'customer_phone',

            ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width: 70px']],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
