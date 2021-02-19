<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrdercartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Замовлення Кендібар та інші';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordercart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>-->
        <?php // echo Html::a('Create Ordercart', ['create'], ['class' => 'btn btn-success']) ?>
    <!--</p>-->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
        $filterStatus = \app\modules\admin\models\Ordercart::filterOrderStatus();
    ?>

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
            'qty',
            'sum',
            'name',
            [
                'attribute' => 'status',
//                'value' => 'orderStatus',
                'value' => function($model){
                    return Html::a($model->orderStatus, ['/admin/order/view', 'id' => $model->id]);
                },
                'filter' => $filterStatus,
                'format' => 'raw',
            ],
            //'delivery',
            //'payment',
            //'date',
            //'address',
            //'phone',
            //'comment:ntext',

            ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width: 70px'],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
