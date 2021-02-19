<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m200308_005857_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orderd}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'filling_id' => $this->integer(),
            'weight' => $this->decimal(8, 0),
            'total_price' => $this->integer(),
            'date' => $this->string(),
            'created_at' => $this->integer(),
            'status' => $this->integer(),
            'customer_name' => $this->string(),
            'customer_phone' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orderd}}');
    }
}
