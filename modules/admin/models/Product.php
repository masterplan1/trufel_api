<?php

namespace app\modules\admin\models;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $type
 * @property int|null $price
 * @property int|null $category_id
 * @property int|null $status
 */

class Product extends \yii\db\ActiveRecord
{
    
    public $image;
    
    const SCENARIO_CREATE = 'create';
    
    public static function tableName()
    {
        return 'product';
    }
    
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['image', 'description', 'category_id', 'type', 'price', 'name', 'status'];
        return $scenarios;
    }
    
    public function behaviors() {
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
            [['image', 'name', 'category_id', 'type'], 'required', 'on' => self::SCENARIO_CREATE],
            [['description'], 'string'],
            [['type', 'category_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['price'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'description' => 'Опис',
            'type' => 'Тип',
            'category_id' => 'Категорія',
            'price' => 'Ціна',
            'status' => 'Статус',
            'image' => 'Фото',
        ];
    }
    public static function showStatus(){
        return [
            1 => 'активний',
            0 => 'неактивний',
            
        ];
    }
    public function getTypename(){
        return Yii::$app->params['productType'][$this->type];
    }
    public function getCategory(){
        return Yii::$app->params['productCategory'][$this->type][$this->category_id];
    }
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
