<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filling".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $category_id
 * @property float|null $price
 * @property string|null $min_weight
 * @property int|null $status
 */
class Filling extends \yii\db\ActiveRecord
{
    public $img;
    const FILLING_STATUS_INACTIVE = 0;
    const FILLING_STATUS_ACTIVE = 1;
    const FILLING_STATUS_CANDYBAR = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filling';
    }
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'img'], 'string'],
            [['category_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['name', 'min_weight'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'min_weight' => 'Min Weight',
            'status' => 'Status',
        ];
    }
    public static function getCandybarCategoriesNames(){
        $arr = [];
        foreach (Yii::$app->params['fillingCandybarCategory'] as $key => $val){
            $arr[$key] = $val['name'];
        }
        return $arr;
    }
    
}
