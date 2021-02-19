<?php

namespace app\modules\admin\models;

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
    
    public $image;
    
    const SCENARIO_CREATE = 'create';
    const SCENARIO_CANDYBAR = 'candybar';
    
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['image', 'description', 'category_id', 'price', 'name', 'status', 'min_weight'];
        $scenarios[self::SCENARIO_CANDYBAR] = ['category_id', 'name', 'status'];
        return $scenarios;
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
    public static function tableName()
    {
        return 'filling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'name', 'description', 'price'], 'required', 'on' => self::SCENARIO_CREATE],
            [['description'], 'string'],
            [['category_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['name', 'min_weight'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
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
            'category_id' => 'Категорія',
            'price' => 'Ціна',
            'image' => 'Фото',
            'min_weight' => 'Мін. вага',
            'status' => 'Статус',
        ];
    }
    public static function showStatus(){
        return [
            1 => 'активний',
            0 => 'неактивний',
        ];
    }
    public static function showStatusForCandybar(){
        return [
            10 => 'кендібар',
            0 => 'неактивний',
        ];
    }
    public function getCategory(){
        return Yii::$app->params['fillingCategory'][$this->category_id];
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
    public function statusView() {
        $res = '';
        switch ($this->status) {

            case 1:
                $res = '<span class="text-success">активний</span>';
                break;
            case 10:
                $res = 'кедібар';
                break;
            default :
                $res = '<span class="text-danger">неактивний</span>';
        }
        return $res;
    }
    
    public function categoryAll(){
        $first = Yii::$app->params['fillingCandybarCategory'];
        $second = Yii::$app->params['fillingCategory'];
        foreach ($first as $key=>$val){
            $second[$key] = $val;
        }
        return $second[$this->category_id];
    }
    public static function getCandybarCategoriesNames(){
        $arr = [];
        foreach (Yii::$app->params['fillingCandybarCategory'] as $key => $val){
            $arr[$key] = $val['name'];
        }
        return $arr;
    }

}
