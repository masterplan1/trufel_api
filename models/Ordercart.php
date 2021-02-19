<?php

namespace app\models;

use Yii;
use app\models\Orderitems;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
 * @property string|null $comment
 */
class Ordercart extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_DONE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordercart';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'delivery', 'payment'], 'integer'],
            [['name', 'date', 'address', 'phone', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'qty' => 'Qty',
            'sum' => 'Sum',
            'name' => 'Name',
            'status' => 'Status',
            'delivery' => 'Delivery',
            'payment' => 'Payment',
            'date' => 'Date',
            'address' => 'Address',
            'phone' => 'Phone',
            'comment' => 'Comment',
        ];
    }
    
    public function getOrderitems(){
        return $this->hasMany(Orderitems::class, ['order_id' => 'id']);
    }
    
    public function makeOrder(){
        if(isset($_SESSION['cart'])){
            $this->qty = $_SESSION['cart.qty'];
            $this->sum = $_SESSION['cart.sum'];
            $this->status = self::STATUS_NEW;
            $this->save();
            
            foreach ($_SESSION['cart'] as $key => $item){
                if($key == 'diatery') continue;
                $orderItem = new Orderitems();
                $orderItem->order_id = $this->id;
                $orderItem->type = $_SESSION['category'];
                $orderItem->product_id = $key;   
                $orderItem->name = $item['name'];   
                $orderItem->price = $item['price'];   
                $orderItem->qty_item = $item['qty'];   
                $orderItem->sum_item = $item['price']*$item['qty'];
                $orderItem->save();
            }
            if(isset($_SESSION['cart']['diatery'])){
                foreach ($_SESSION['cart']['diatery'] as $key => $item){
                    $orderItemDiatery = new Orderitems();
                    $orderItemDiatery->order_id = $this->id;
                    $orderItemDiatery->type = Orderitems::TYPE_DIATERY;
                    $orderItemDiatery->product_id = $key;   
                    $orderItemDiatery->name = $item['name'];   
                    $orderItemDiatery->price = $item['price'];   
                    $orderItemDiatery->qty_item = $item['qty'];   
                    $orderItemDiatery->sum_item = $item['price']*$item['qty'];
                    $orderItemDiatery->save();
                }
            }
            return true;  
        }else{
            return false;
        }
        
    }
    
    public function sendMail(){
        $result = Yii::$app->mailer->compose()
                ->setFrom('masterplan1804@gmail.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Нове замовлення')
                ->setTextBody('Текст повідомлення')
                ->send();
        var_dump($result);
        exit;
    }
}
