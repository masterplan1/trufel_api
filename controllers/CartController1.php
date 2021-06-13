<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Filling;
use app\models\Cart;
use app\models\Product;


class CartController extends Controller{
    
   public function actionAdd(){
       $id = Yii::$app->request->post('id');
       $qty = Yii::$app->request->post('qty');
       $filling = Filling::findOne($id);
       if(empty($filling)) return false;
       $session = Yii::$app->session;
       
       $session->open();
       
       $cart = new Cart();
       
       $cart->addToCart($filling, $qty);
       return true;
//       echo '<pre>';
//       print_r($session['cart']);
//       echo $session['cart.qty'].'+'.$session['cart.sum'];
//       unset($session['cart']);
//       unset($session['cart.qty']);
//       unset($session['cart.sum']);
//       unset($session['category']);
//       print_r($session['cart']);
//       echo $session['cart.qty'].'+'.$session['cart.sum'];
//       exit;
   }
   
   public function actionAddDiatery(){
       $id = Yii::$app->request->post('id');
       $qty = Yii::$app->request->post('qty');
       $product = Product::findOne($id);
       if(empty($product)) return false;
       $session = Yii::$app->session;
       
       $session->open();
       
       $cart = new Cart();
       
       $cart->addToCartDiatery($product, $qty);
       return $this->actionRedirect();
   }


   public function actionRedirect(){
       return $this->redirect('/cart/index');
   }
   
   public function actionIndex(){
       $session = Yii::$app->session;
       $session->open();
       return $this->render('index', compact('session'));
   }
   public function actionDelete(){
       $id = Yii::$app->request->post('id');
       $type = intval(Yii::$app->request->post('type'));
       $session = Yii::$app->session;
       $session->open();
       $cart = new Cart();
       if($type == 2){
            $cart->deleteItemDiatery($id);
       }else{
            $cart->deleteItem($id);
       }
       return $_SESSION['cart.sum'];
   }
   public function actionAjaxQty(){
       $id = Yii::$app->request->post('id');
       $value = Yii::$app->request->post('value');
       $type = Yii::$app->request->post('type');
       $value = intval($value);
       $type = intval($type);
       $session = Yii::$app->session;
       $session->open();
       $cart = new Cart();
       if($type == 2){
           $cart->ajaxCartCalculateDiatery($id, $value);
       }else{
           $cart->ajaxCartCalculate($id, $value);
       }
       
       return $_SESSION['cart.sum'];
   }
   
   public function actionAjaxFilling(){
       $session = Yii::$app->session;
       $session->open();
       $id = intval(Yii::$app->request->post('id'));
       $idNew = intval(Yii::$app->request->post('idNew'));

       $filling = Filling::findOne($idNew);

       if(empty($filling)) {
           return false;
       }
       if(isset($_SESSION['cart'][$id])){

            $_SESSION['cart'][$idNew] = $_SESSION['cart'][$id];
            $_SESSION['cart'][$idNew]['name'] = $filling->name;
            
            unset($_SESSION['cart'][$id]);
       }
       return true;
   }
   
   public function actionCheckStatus(){
       $session = Yii::$app->session;
       $session->open();
       if(!empty($_SESSION['cart'])){
           if(isset($_SESSION['cart']['diatery'])){
               return count($_SESSION['cart']) + count($_SESSION['cart']['diatery']) - 1;
           }else{
               return count($_SESSION['cart']);
           }
            
       }else{
           return 0;
       }
       
   }  
}
