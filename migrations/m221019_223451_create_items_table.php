<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m221019_223451_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(50)->notNull(),
            'slug' => $this->string(50)->notNull()->unique(),
            'fk_item_category' => $this->integer()->unsigned()->notNull(),
            'description' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);

        $this->addForeignKey(
            'fk_item_category',
            '{{%items}}',
            'fk_item_category',
            '{{%item_categories}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createIndex(
            'name_IDX',
            '{{%items}}',
            'name'
        );
        $this->createIndex(
            'slug_IDX',
            '{{%items}}',
            'slug',
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%items}}');
    }
}
