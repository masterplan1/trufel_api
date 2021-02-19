<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use app\models\Filling;

/**
 * Description of Cart
 *
 * @author NickName
 */
class Cart extends ActiveRecord{
    
    public function addToCart($product, $qty = 1){
        if(isset($_SESSION['cart'][$product->id])){
            $oldQuantity = $_SESSION['cart'][$product->id]['qty'];
        }
        $price = Yii::$app->params['fillingCandybarCategory'][$product->category_id]['price'];
        $_SESSION['cart'][$product->id] = [
            'qty' => $qty,
            'name' => $product->name,
            'price' => $price,
        ];
//        $_SESSION['category'][$product->category_id] = $catId;        
        
        if($oldQuantity){
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty - $oldQuantity : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($qty - $oldQuantity) * $price : $qty * $price;
        }else{
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price : $qty * $price;
        }
        
    }
    
    public function addToCartDiatery($product, $qty = 1){
        if(isset($_SESSION['cart']['diatery'][$product->id])){
            $oldQuantity = $_SESSION['cart']['diatery'][$product->id]['qty'];
        }
        $_SESSION['cart']['diatery'][$product->id] = [
            'qty' => $qty,
            'name' => $product->name,
            'price' => $product->price,
        ];      
        
        if($oldQuantity){
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty - $oldQuantity : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($qty - $oldQuantity) * $product->price : $qty * $product->price;
        }else{
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
        }
        
    }
    
    public function deleteItem($id){
        if(!isset($_SESSION['cart'][$id])) return false;
//        $filling = Filling::findOne($id);
//        $categoryId = $filling->category_id;
        
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $qtyMinus * $_SESSION['cart'][$id]['price'];

        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;


        
//        unset($_SESSION['category'][$categoryId]);
        unset($_SESSION['cart'][$id]);
    }
    public function ajaxCartCalculate($id, $value){
        $oldQty = $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $oldQty + $value;
//        echo '<pre>';
//        var_dump($value);
//        print_r($_SESSION['cart'][$id]['qty']);
//        print_r($_SESSION['cart'][$id]['qty']);
//        exit;
//        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $_SESSION['cart'][$id]['price']*$oldQty + $_SESSION['cart'][$id]['price']*$value;
        $_SESSION['cart.sum'] += $_SESSION['cart'][$id]['price']*($value - $_SESSION['cart'][$id]['qty']);
        $_SESSION['cart'][$id]['qty'] = $value;
    }
    
    public function deleteItemDiatery($id){
        if(!isset($_SESSION['cart']['diatery'][$id])) return false;
        
        $qtyMinus = $_SESSION['cart']['diatery'][$id]['qty'];
        $sumMinus = $qtyMinus * $_SESSION['cart']['diatery'][$id]['price'];
        
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        
        if(count($_SESSION['cart']['diatery']) == 1){
            unset($_SESSION['cart']['diatery']);
        }else{
            unset($_SESSION['cart']['diatery'][$id]);
        }
        
    }
    
    public function ajaxCartCalculateDiatery($id, $value){
        $oldQty = $_SESSION['cart']['diatery'][$id]['qty'];
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $oldQty + $value;
        $_SESSION['cart.sum'] += $_SESSION['cart']['diatery'][$id]['price']*($value - $_SESSION['cart']['diatery'][$id]['qty']);
        $_SESSION['cart']['diatery'][$id]['qty'] = $value;
    }
    
}
