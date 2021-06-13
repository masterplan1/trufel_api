<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ordercart}}`.
 */
class m200506_103951_create_ordercart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ordercart}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'qty' => $this->integer(10),
            'sum' => $this->integer(),
            'name' => $this->string(255),
            'status' => $this->integer(10),
            'delivery' => $this->integer(10),
            'payment' => $this->integer(10),
            'date' => $this->string(255),
            'address' => $this->string(),
            'phone' => $this->string(255),
            'comment' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ordercart}}');
    }
}
