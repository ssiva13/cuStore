<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_categories}}`.
 */
class m221019_222242_create_item_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_categories}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item_categories}}');
    }
}
