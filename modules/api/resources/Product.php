<?php

namespace app\modules\api\resources;
/**
 * Description of ProductResource
 *
 * @author NickName
 */
class Product extends \app\models\Product{
    public function fields() {
        return [
            'id',
            'name',
            'type',
            'category_id',
            'status',
            'image' => function($model){
                $img = $model->getImage();
                return $img->getUrl();
            },
            'price'
        ];
    }
}
