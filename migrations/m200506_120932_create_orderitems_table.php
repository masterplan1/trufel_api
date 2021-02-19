<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orderitems}}`.
 */
class m200506_120932_create_orderitems_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orderitems}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'type' => $this->integer(10),
            'product_id' => $this->integer(10),
            'name' => $this->string(255),
            'price' => $this->integer(),
            'qty_item' => $this->integer(),
            'sum_item' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orderitems}}');
    }
}
