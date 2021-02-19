<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%filling}}`.
 */
class m200220_001102_create_filling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%filling}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'price' => $this->decimal(),
            'min_weight' => $this->string(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%filling}}');
    }
}
