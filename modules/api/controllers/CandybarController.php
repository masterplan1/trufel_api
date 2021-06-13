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

/**
 * Description of CandybarController
 *
 * @author NickName
 */
class CandybarController extends Controller{
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class,
        ]); 
    }
    
    public function actionIndex(){
        return Yii::$app->params['fillingCandybarCategory'];
    }
}
