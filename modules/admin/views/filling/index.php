<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FillingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Начинки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити начинку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php   $categories = [];
            $catOriginal = Yii::$app->params['fillingCategory'];
            for ($i = 1; $i < count($catOriginal); $i++){
                $categories[$i] = $catOriginal[$i];
            }
     
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'name',
                'value' => function($model){
                    return Html::a($model->name, ['/admin/filling/view', id => $model->id]);
                },
                'format' => 'html',
            ],
//            'description:ntext',
            [
                'attribute' => 'category_id',
                'filter' => $categories,
                'value' => function($model){
//                    return $model->category;
                    return Yii::$app->params['fillingCategory'][$model->category_id];
                }
            ],
            'price',
            'min_weight',
            [
                'attribute' => 'image', 'value' => function($model){
                    $img = $model->getImage();
                    return Html::a("<img src='{$img->getUrl('80')}'>", Url::to(['/admin/filling/view', 'id' => $model->id]));
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\models\Filling::showStatus(),
                'value' => function($data){
//                    return $data->statusView();
                    return $data->status = 1 ? '<span class="text-success">активний</span>' : '<span class="text-danger">неактивний</span>';
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 100px'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
