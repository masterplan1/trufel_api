<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
//use app\modules\api\resources\ProductResource;
use app\modules\api\resources\Product;
use yii\data\ActiveDataProvider;
use yii\filters\Cors;

class ProductController extends ActiveController {

    public $modelClass = Product::class;
    
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
        $productType = \Yii::$app->request->get('type_filter');
        $productCategory = \Yii::$app->request->get('category_filter');
        if($productCategory === 'null'){
            $productCategory = null;
        }
        if ($productType) {
            return new ActiveDataProvider([
                'query' => $this->modelClass::find()->andWhere(['type' => $productType])->andWhere(['status' => $this->modelClass::PRODUCT_STATUS_ACTIVE])->andFilterWhere(['category_id' => $productCategory]),
//                'pagination' => [
//                    'pageSize' => 6
//                ]
            ]);
        } else {
            return new ActiveDataProvider([
                'query' => $this->modelClass::find()->andWhere(['status' => $this->modelClass::PRODUCT_STATUS_ACTIVE])
            ]);
        }
    }

}
