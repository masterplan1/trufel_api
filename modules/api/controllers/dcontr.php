<?php

namespace app\modules\api\controllers;

use yii\rest\Controller;
use app\models\Product;
/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $paramsName = \Yii::$app->request->get('name');
//        $requestParams = \Yii::$app->getRequest()->getQueryParam($name)
        return ['name' => $requestParams];
    }
}
