<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Orderitems;
/**
 * This is the model class for table "ordercart".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $qty
 * @property int|null $sum
 * @property string|null $name
 * @property int|null $status
 * @property int|null $delivery
 * @property int|null $payment
 * @property string|null $date
 * @property string|null $address
 * @property string|null $phone
 * @property string $comment
 */
class Ordercart extends \yii\db\ActiveRecord
{
    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_ACTIVE = 2;
    const ORDER_STATUS_COMPLETE = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordercart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'qty', 'sum', 'status', 'delivery', 'payment'], 'integer'],
            [['comment'], 'required'],
            [['comment'], 'string'],
            [['name', 'date', 'address', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'created_at' => 'Дата створення',
            'qty' => 'Загальна кількість',
            'sum' => 'Вартість',
            'name' => 'Ім\'я замовника',
            'status' => 'Статус',
            'delivery' => 'спосіб доставки',
            'payment' => 'спосіб оплати',
            'date' => 'Дата видачі',
            'address' => 'Адреса',
            'phone' => 'контактний номер',
            'comment' => 'Коментар',
        ];
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
//            self::ORDER_STATUS_NEW => 'нове',
            self::ORDER_STATUS_ACTIVE => 'активне',
            self::ORDER_STATUS_COMPLETE => 'виконане',
        ];
    }
    public function getOrderitems(){
        return $this->hasMany(Orderitems::class, ['order_id' => 'id']);
    }
    public function getDeliveryName(){
        return Yii::$app->params['deliveryType'][$this->delivery];
    }
    public function getPaymentName(){
        return Yii::$app->params['paymentType'][$this->delivery];
    }
    
    public function statusChange(){
 
        if($this->status == 1){
            $this->status = 2;
            $this->save(false, ['status']);

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
