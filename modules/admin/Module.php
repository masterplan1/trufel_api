<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
    
//    public function behaviors() {
////        parent::behaviors();
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
////                'only' => ['logout', 'login'],
//                'rules' => [
//                    [
////                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                    [
//                        'actions' => ['login'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                ],
//            ],
////            'verbs' => [
////                'class' => VerbFilter::className(),
////                'actions' => [
////                    'delete' => ['POST'],
////                ],
////            ],
//        ];
//    }
}
