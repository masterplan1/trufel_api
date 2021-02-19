<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200229_203248_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'type' => $this->integer(),
            'price' => $this->decimal(),
            'category_id' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
