<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;
use yii\data\ActiveDataProvider;
use app\modules\api\resources\Filling;
use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 * Description of FillingController
 *
 * @author NickName
 */
class FillingController extends ActiveController{
    public $modelClass = Filling::class;
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class,
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Access-Control-Expose-Headers' => ['X-Pagination-Page-Count']
                ]
            ]
        ]); 
    }
    public function actions() {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }
    
    public function prepareDataProvider() {
        $fillingCategory = \Yii::$app->request->get('category_filter');
        $fillingStatus = \Yii::$app->request->get('status_filter');
        if($fillingStatus && $fillingStatus === 'candybar'){
            $fillingStatus = $this->modelClass::FILLING_STATUS_CANDYBAR;
        }
        if($fillingCategory === 'null'){
            $fillingCategory = null;
        }
        if($fillingCategory == 100){
            return new ActiveDataProvider([
                'query' => $this->modelClass::find()->andWhere(['status' => $this->modelClass::FILLING_STATUS_ACTIVE])
                    ->andWhere(['in', 'category_id', [1, 2, 3]])
            ]);
        }
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->FilterWhere(['status' => $fillingStatus])->
                orWhere(['status' => $this->modelClass::FILLING_STATUS_ACTIVE])
                ->andFilterWhere(['category_id' => $fillingCategory]),
        ]);
//        return new ActiveDataProvider([
//            'query' => $this->modelClass::find()->andWhere(['status' => $this->modelClass::FILLING_STATUS_ACTIVE])
//                ->andFilterWhere(['category_id' => $fillingCategory]),
//        ]);
    }
}
