<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;
use Yii;
use app\models\Filling;
/**
 * Description of CandybarController
 *
 * @author NickName
 */
class CandybarController extends Controller{
    
    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionView($id){
        $products = Product::find()->where(['type' => 3, 'category_id' => $id, 'status' => 1])->limit(Yii::$app->params['productPerPageLimit'])->all();

        return $this->render('view', compact('id', 'products'));
    }
    
    public function actionMore(){
        
        $categoryId = Yii::$app->request->post('categoryId');
        $limit = Yii::$app->request->post('limit') ?? Yii::$app->params['productPerPageLimit'];
        
        $products = Product::find()->where(['type' => 3, 'category_id' => $categoryId, 'status' => Product::PRODUCT_STATUS_ACTIVE])
                ->limit($limit)->all(); 
        
        return $this->renderAjax('more', ['products' => $products]);
    }
    
    public function actionOrder($id){
        $session = Yii::$app->session;
        $session->open();
        $_SESSION['category'] = $id;
        return $this->render('order');
    }
    
    public function actionPrepare(){
        $session = Yii::$app->session;  
        $session->open();
        
        $id = Yii::$app->request->post('id');
        $item = Yii::$app->params['fillingCandybarCategory'][$id];
        $fillings = Filling::find(['id', 'name'])->where(['status' => Filling::FILLING_STATUS_CANDYBAR])->andWhere(['category_id' => $id])->all();

        return $this->renderAjax('prepare', compact('item', 'fillings'));
    }
    
}
