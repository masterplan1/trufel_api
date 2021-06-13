<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php   $typeCategory = Yii::$app->params['productCategory'];
            array_unshift($typeCategory, ['Оберіть тип']);
//            echo '<pre>';
//            print_r($typeCategory);
//            exit;
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider[0],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'name',
                'value' => function($model){
                    return Html::a($model->name, ['/admin/product/view', id => $model->id]);
                },
                'format' => 'html',
            ],
            'description:ntext',
            [
                'attribute' => 'type',
                'filter' => Yii::$app->params['productType'],
                'filterOptions' => ['class' => 'typeAjax'],
                'value' => function($model){
                    return $model->typename;
                }
            ],
            [
                'attribute' => 'category_id',
                'filter' => $typeCategory[$dataProvider[1] == '' ? 0 : $dataProvider[1]],
                'filterOptions' => ['class' => 'categoryAjax'],
                'value' => function($model){
                    return $model->category;
                }
            ],
            [
                'attribute' => 'image', 'value' => function($model){
                    $img = $model->getImage();
                    return Html::a("<img src='{$img->getUrl('80')}'>", Url::to(['/admin/product/view', 'id' => $model->id]));
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\models\Product::showStatus(),
                'value' => function($data){
                    return $data->status == 1 ? '<span class="text-success">активний</span>' : '<span class="text-danger">неактивний</span>';
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 100px'],
            ],
                
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
