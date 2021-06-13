<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use app\modules\api\resources\OrderResource;
use yii\filters\Cors;
/**
 * Description of OrderController
 *
 * @author NickName
 */
class OrderController extends ActiveController{
    
    
    
    public $modelClass = OrderResource::class;
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
            ],
        ]);
    }
    
}
