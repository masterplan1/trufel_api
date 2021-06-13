<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\modules\api\resources\CommentsResource;
use yii\filters\Cors;
/**
 * Description of CommentController
 *
 * @author NickName
 */
class CommentController extends ActiveController{
    
    public $modelClass = CommentsResource::class;
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class,
        ]); 
    }
}
