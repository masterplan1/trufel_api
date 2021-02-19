<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Product;
use app\models\Filling;
use app\models\Orderd;
use app\models\Ordercart;

/**
 * Description of OrderController
 *
 * @author NickName
 */
class OrderController extends Controller{
    
    public function actionIndex($id = 0){
        if($id != 0 ){
            $product = Product::findOne($id);
        
            $arr = $product->fillingCreate($product);
            $fillingCatIds = $arr[0];
            $fillings = $arr[1];
            $productType = $product->type;
            $productName = $product->name;
            $str = $this->renderAjax('filling', compact('fillings', 'fillingCatIds'));
            return $this->render('indexID', compact('str', 'productType', 'id', 'productName'));
            
        }
        return $this->render('index', compact('id'));
    }
    
    public function actionCategory(){
        $categoryId = Yii::$app->request->post('categoryId');
        if(!$categoryId){
            return "<h2 style='color:blue; text-align:center'>Спочатку оберіть категорію.</h2>";
        }
        $products = Product::find()->where(['type' => $categoryId, 'status' => 1])->limit(Yii::$app->params['productPerPageLimit'])->all();
        
        return $this->renderAjax('category', compact('products', 'categoryId'));
    }
    
    public function actionFilling() {
        $productId = Yii::$app->request->post('productId');
//        $productId = intval($productId);
        $categoryId = Yii::$app->request->post('categoryId');
//        $categoryId = inval($categoryId);

        if($productId == -1 || $productId == -2){

            $fillingCatId = [];
            $fillingCatId = ($categoryId == 1) ?  [1, 2, 3] : [4];
            $fillingCatIds = (count($fillingCatId)) == 1 ? $fillingCatId[0] : implode(', ', $fillingCatId);
            $fillings = Filling::find()->where(['in', 'category_id', $fillingCatId])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
            return $this->renderAjax('filling', compact('fillings', 'fillingCatIds'));
        }
        $product = Product::findOne($productId);
        
        $arr = $product->fillingCreate($product);
        $fillingCatIds = $arr[0];
        $fillings = $arr[1];
        
//        if ($product) {
//            $fillings = 0;
//            if ($product->type == 1) {
//                $fillingCatIds = 0;
//                switch ($product->category_id){
//                    
//                    case 1:
//                    case 2:
//                    case 3:
//                    case 4:
//                    case 5:
//                        $fillingCatIds = 1;
//                        break;
//                    case 6:
//                        $fillingCatIds = 2;
//                        break;
//                    case 7:
//                        $fillingCatIds = 3;
//                        break;      
//                }  
////                echo $fillingCatId;
//                $fillings = Filling::find()->where(['category_id' => $fillingCatIds])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
//            }
//            if ($product->type == 2) {
//                $fillingCatIds = 4;
//                $fillings = Filling::find()->where(['category_id' => $fillingCatIds])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
//            }
//            
//        }  
        return $this->renderAjax('filling', compact('fillings', 'fillingCatIds'));
    }
    
    public function actionCreate(){
        $productId = Yii::$app->request->post('product_id');
        $fillingId = Yii::$app->request->post('filling_id');
        $weight = Yii::$app->request->post('weight');
        $totalPrice = Yii::$app->request->post('total_price');
        $date = Yii::$app->request->post('date');
        $customerName = Yii::$app->request->post('customer_name');
        $customerPhone = Yii::$app->request->post('customer_phone');
        if($fillingId){
            $model = new Orderd();
            $model->product_id = $productId;
            $model->filling_id = $fillingId;
            $model->weight = $weight;
            $model->total_price = $totalPrice;
            $model->date = $date;
            $model->customer_name = $customerName;
            $model->customer_phone = $customerPhone;
            
            if($model->makeOrder()){

//                Yii::$app->session->setFlash('success', 'Замовлення створено!');
                return $this->redirect(\yii\helpers\Url::to(['/order/complete']));
            }
            else{
                echo 'error';
            }
        }
    }
    
    public function actionCreateDiatery(){
        $session = Yii::$app->session;
        $session->open();
        return $this->render('diatery', compact('session'));
    }
    public function actionMakeOrderCart(){
        $session = Yii::$app->session;
        $session->open();
        
        $customerName = Yii::$app->request->post('name');
        $customerNumber = Yii::$app->request->post('phone_number');
        $customerAddress = Yii::$app->request->post('address');
        $dateForOrder = Yii::$app->request->post('date');
        $customerComment = Yii::$app->request->post('comment');
        $delivery = Yii::$app->request->post('delivery');
        $payment = Yii::$app->request->post('payment_method');
        
        $order = new Ordercart();
        $order->name = $customerName;
        $order->phone = $customerNumber;
        $order->address = $customerAddress;
        $order->date = $dateForOrder;
        $order->comment = $customerComment;
        $order->delivery = $delivery;
        $order->payment = $payment;
        
        if ($order->makeOrder()) {
            unset($session['cart']);
            unset($session['cart.qty']);
            unset($session['cart.sum']);
            unset($session['category']);
            return $this->redirect('/order/complete');            
            exit;
        }
    }
    
    public function actionComplete(){
//        Orderd::sendMail();
        return $this->render('complete');
    }
}
