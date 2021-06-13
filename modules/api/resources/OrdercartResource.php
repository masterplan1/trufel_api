<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\resources;

use Yii;
/**
 * Description of OrdercartResource
 *
 * @author NickName
 */
class OrdercartResource extends \app\models\Ordercart{
    
    public function afterSave($insert, $changedAttributes) {
        if($insert){
            $params = ['customer_name' => $this->name, 'customer_phone' => $this->phone];
            if($params){
                Yii::$app->sendMailer->send($params);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }
    
    public function apiOrder($userData, $cartData){
        if($userData && $cartData){
            $this->name = $userData['name'];
            $this->status = self::STATUS_NEW;
            $this->sum = $userData['sum'];
            $this->delivery = $userData['delivery'];
            $this->payment = $userData['payment'];
            $this->date = $userData['date'];
            $this->address = $userData['address'];
            $this->phone = $userData['phone'];
            $this->comment = $userData['comment'] ?? '';
            if($this->save()){
                foreach ($cartData as $item){
                   $orderItems = new \app\models\Orderitems();
                   $orderItems->apiItemSave($item, $this->id);
                }
                return true;
            }
            return false;
        }
    }
}
