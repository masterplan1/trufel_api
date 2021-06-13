<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;

use yii\rest\Controller;
use yii\filters\Cors;
use Yii;
use app\modules\api\resources\OrdercartResource;
/**
 * Description of OrdercartController
 *
 * @author NickName
 */
class OrdercartController extends Controller{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
            ],
        ]);
    }
    public function actionOrder(){
        if(Yii::$app->request->isPost){
            $userData = Yii::$app->request->post('userData');
            $cartData = Yii::$app->request->post('cartData');
            
            $orderCart = new OrdercartResource();
            return $orderCart->apiOrder($userData, $cartData);
        }
        return false;
    }
    public function actionDelivery(){
        return Yii::$app->params['deliveryType'];
    }
    public function actionPayment(){
        return Yii::$app->params['paymentType'];
    }
}
