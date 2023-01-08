<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m221019_231010_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'name' => $this->string(50)->notNull()->comment('Department Name'),
            'slug' => $this->string(30)->notNull(),
            'description' => $this->string(150)->null(),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        $this->createIndex(
            'slug_IDX',
            '{{%departments}}',
            'slug',
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%departments}}');
    }
}
