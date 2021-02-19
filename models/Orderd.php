<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

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
class Orderd extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_WORKING = 2;
    const ORDER_STATUS_DONE = 0;

    public static function tableName() {
        return 'orderd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['product_id', 'filling_id', 'created_at', 'status'], 'integer'],
                [['weight', 'total_price'], 'number'],
                [['date', 'customer_name', 'customer_phone'], 'string', 'max' => 255],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
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

    public function makeOrder() {
        $this->status = self::ORDER_STATUS_NEW;
        return $this->save();
    }
    
    public static function sendMail(){
        Yii::$app->mailer->compose()
                ->setFrom('masterplan1804@gmail.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Нове замовлення')
                ->setTextBody('Тест повідомлення')
                ->send();
    }

}
