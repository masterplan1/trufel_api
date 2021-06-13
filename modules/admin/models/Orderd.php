<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Product;
use app\modules\admin\models\Filling;

/**
 * This is the model class for table "orderd".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $filling_id
 * @property float|null $weight
 * @property float|null $total_price
 * @property string|null $date
 * @property int|null $created_at
 * @property int|null $status
 * @property string|null $customer_name
 * @property string|null $customer_phone
 */
class Orderd extends \yii\db\ActiveRecord
{
    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_ACTIVE = 2;
    const ORDER_STATUS_COMPLETE = 3;
    /**
     * {@inheritdoc}
     */
    public $product_img;
    public $filling_img;
    
    public static function tableName()
    {
        return 'orderd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'filling_id', 'created_at', 'status'], 'integer'],
            [['weight', 'total_price'], 'number'],
            [['date', 'customer_name', 'customer_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'product_id' => 'Назва оформлення',
            'filling_id' => 'Назва начинки',
            'weight' => 'Вага',
            'total_price' => 'Вартість',
            'date' => 'Дата видачі',
            'created_at' => 'Дата створення',
            'status' => 'Статус',
            'customer_name' => 'Ім\'я замовника',
            'customer_phone' => 'Номер замовника',
            'product_img' => 'Оформлення',
            'filling_img' => 'Начинка',
        ];
    }
    public function getProduct(){
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
    
    public function getOrderStatus(){
        if($this->status == self::ORDER_STATUS_NEW){
            return '<div style="background:green; color:white; text-align:center;">нове</div>';
        }
        if($this->status == self::ORDER_STATUS_ACTIVE){
            return '<div style="background:yellow; text-align:center;">активне</div>';
        }
        if($this->status == self::ORDER_STATUS_COMPLETE){
            return '<div style="background:grey; color:white; text-align:center;">виконане</div>';
        }
    }
    public static function filterOrderStatus(){
        return [
            self::ORDER_STATUS_NEW => 'нове',
            self::ORDER_STATUS_ACTIVE => 'активне',
            self::ORDER_STATUS_COMPLETE => 'виконане',
        ];
    }
     public static function updateOrderStatus(){
        return [
            self::ORDER_STATUS_ACTIVE => 'активне',
            self::ORDER_STATUS_COMPLETE => 'виконане',
        ];
    }
    public function statusChange(){
 
        if($this->status == 1){
            $this->status = 2;
            $this->save(false, ['status']);

        }
    }
    public function getFillingImg(){
        $filling = $this->fillingById();
        if($filling){
            $img = $filling->getImage();
            return "<img src='{$img->getUrl('x100')}'>";
        }
    }
    public function getProductImg(){
        $product = $this->productById();
        if($product){
            $img = $product->getImage();
            return "<img src='{$img->getUrl('x100')}'>";
        }
    }
    public function fillingById(){
        $filling = Filling::findOne($this->filling_id);
        if($filling){
            return $filling;
        }else{
            return false;
        }
    }
    public function productById(){
        if($this->productExist()){
            return Product::findOne($this->product_id) ?? false;
        }else{
            return false;
        }
    }
    public function productExist(){
        if($this->product_id == -1 || $this->product_id == -2){
            return false;
        }
        return true;
    }
    public function weightValue(){
        $filling = Filling::findOne($this->filling_id);
        $fillingCategory = $filling->category_id;
        if($fillingCategory == 4){
            return 'шт.';
        }
        else{
            return 'кг.';
        }
    }
    public static function countNewStatus(){
        $orders = self::findAll(['status' => self::ORDER_STATUS_NEW]);
        if($orders){
            return '('.count($orders).')';
        }else{
            return '';
        }
    }
}
