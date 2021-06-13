<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\resources;
/**
 * Description of Filling
 *
 * @author NickName
 */
class Filling extends \app\models\Filling{
    public function fields() {
        return [
            'id',
            'name',
            'description',
            'category_id',
            'min_weight',
            'price',
            'image' => function($model){
                $img = $model->getImage();
                return $img->getUrl();
            }
        ];
    }
}
