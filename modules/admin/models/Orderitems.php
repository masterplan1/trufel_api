<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Product;

/**
 * This is the model class for table "orderitems".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $type
 * @property int|null $product_id
 * @property string|null $name
 * @property int|null $price
 * @property int|null $qty_item
 * @property int|null $sum_item
 */
class Orderitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'type', 'product_id', 'price', 'qty_item', 'sum_item'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'type' => 'Type',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'price' => 'Price',
            'qty_item' => 'Qty Item',
            'sum_item' => 'Sum Item',
        ];
    }
    public function typeName(){
        
        if($this->type == -1){
            return '-';
        }else{
            return Product::findOne($this->type)->name;
        }
    }
    
    public function getImg(){
        
        if($this->type == -1){
            $model = Product::findOne($this->product_id);
            
        }else{
            $model = Product::findOne($this->type);
        }
        $img = $model->getImage();
        return "<img src='{$img->getUrl('x100')}'>";
    }
    
}
