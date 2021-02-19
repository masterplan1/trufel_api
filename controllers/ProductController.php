<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller; 
use app\models\Product;
use yii\web\Response;
use app\models\Filling;
use Yii;

/**
 * Description of ProductController
 *
 * @author NickName
 */
class ProductController extends Controller{
    
    public function actionCategory($id){
        
        $products = Product::find()->where(['type' => $id, 'status' => 1])->limit(Yii::$app->params['productPerPageLimit'])->orderBy(['id' => SORT_ASC])->all();

        
        if ($id == 4 || $id == 5) {

            return $this->render('desert', [
                        'products' => $products,
                        'id' => $id,
            ]);
        }
        
              
        return $this->render('category', [
            'products' => $products,
            'id' => $id,       
            ]);
    }
    
    public function actionFilter(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $categoryId = Yii::$app->request->post('categoryId');
        $typeId = Yii::$app->request->post('typeId');
        $limit = Yii::$app->request->post('limit') ?? Yii::$app->params['productPerPageLimit'];
        
        $categoryId = intval($categoryId);
        $typeId = intval($typeId);
        if($categoryId !==0){
           $productsByCategory = Product::find()->where(['type' => $typeId, 'category_id' => $categoryId, 'status' => Product::PRODUCT_STATUS_ACTIVE])
                ->limit($limit)->all(); 
        }else{
            $productsByCategory = Product::find()
                ->limit($limit)->where(['type' => $typeId, 'status' => Product::PRODUCT_STATUS_ACTIVE])->all();
        }
        
        if($productsByCategory){
            
            $productsWithImages = [];
            $i = 0;
            foreach ($productsByCategory as $item){
                $img = $item->getImage();
                
                $productsWithImages[$i]['name'] = $item->name;
                $productsWithImages[$i]['id'] = $item->id;
                $productsWithImages[$i]['category_id'] = $item->category_id;
//                $productsWithImages[$i]['description'] = $item->description;
                $productsWithImages[$i]['image'] = $img->getUrl();
                $i++;
            }
            return [
                'success' => true,
                'items' => $productsWithImages,
            ];
        }else{
            return [
                'success' => false,
                'errors' => 'error',
            ];
        }
    }
    
    public function actionDeserts() {
        $typeId = Yii::$app->request->post('typeId');
        $categoryId = Yii::$app->request->post('categoryId');
        $limit = Yii::$app->request->post('limit') ?? Yii::$app->params['productPerPageLimit'];
        
//        $products = [1];
        
        if($categoryId){
            $products = Product::find()->where(['type' => $typeId, 'category_id' => $categoryId, 'status' => 1])->limit($limit)->all();
//            $products = Product::find()->where(['type' => $categoryId, 'status' => 1])->limit(Yii::$app->params['productPerPageLimit'])->all();
        }else{
            $products = Product::find()->where(['type' => $typeId, 'status' => 1])->limit($limit)->all();
        }

        return $this->renderAjax('desert_ajax', [
                    'products' => $products,
                    'id' => $typeId,
        ]);
    }

}
