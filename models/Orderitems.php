<?php

namespace app\models;

use Yii;
use app\models\Ordercart;
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
    const TYPE_DIATERY = -1;
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
    
    public function getOrdercart(){
        return $this->hasOne(Ordercart::class, ['id' => 'order_id']);
    }

}
