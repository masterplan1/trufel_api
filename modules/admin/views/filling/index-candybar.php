<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FillingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Солодощі кендібару';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати нову', ['/admin/filling/candybar'], ['class' => 'btn btn-success']) ?>
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
                    return Html::a($model->name, ['/admin/filling/view-candybar', id => $model->id]);
                },
                'format' => 'html',
            ],
//            'description:ntext',
            [
                'attribute' => 'category_id',
                'filter' => app\modules\admin\models\Filling::getCandybarCategoriesNames(),
                'value' => function($model){
//                    return $model->category;
                    return $model::getCandybarCategoriesNames()[$model->category_id];
                }
            ],
//            'price',
//            [
//                'attribute' => 'min_weight',
//                'label' => 'Мін. кількість',
//            ],

            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\models\Filling::showStatusForCandybar(),
                'value' => function($data){
                    return $data->statusView();
//                    return $data->status = 1 ? '<span class="text-success">активний</span>' : '<span class="text-danger">неактивний</span>';
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 100px'],
            ],

//            ['class' => 'yii\grid\ActionColumn'],
                        
                        
                        
                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;&nbsp; {update}&nbsp;&nbsp;&nbsp; {delete}',
                'buttons' => [
                    'view' => function($url, $post){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view-candybar', 'id' => $post->id]);
                    },
                    'update' => function($url, $post){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update-candybar', 'id' => $post->id]);
                    },
                    'delete' => function($url, $post){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $post->id]);
                    }
                    
                ],
//                'visibleButtons' => [
//                    'view' => function($model, $key, $index){
//                        return $model->user_id == 110;
//                    }
//                ]
            ],
                        
                        
                        
                        
                        
                        
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
