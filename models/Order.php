<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $filling_id
 * @property float|null $weight
 * @property float|null $total_price
 * @property int|null $date
 * @property int|null $created_at
 * @property int|null $status
 * @property string|null $customer_name
 * @property string|null $customer_phone
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_WORKING = 2;
    const ORDER_STATUS_DONE = 0;
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors() {
        return [
                [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
//                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'filling_id', 'date', 'created_at', 'status'], 'integer'],
            [['weight', 'total_price'], 'number'],
            [['customer_name', 'customer_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'filling_id' => 'Filling ID',
            'weight' => 'Weight',
            'total_price' => 'Total Price',
            'date' => 'Date',
            'created_at' => 'Created At',
            'status' => 'Status',
            'customer_name' => 'Customer Name',
            'customer_phone' => 'Customer Phone',
        ];
    }
    
    public function makeOrder(){
        echo 'asd3';
        $this->status = self::ORDER_STATUS_NEW;
        return $this->save();
    }
}
