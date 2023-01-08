<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%buildings}}`.
 */
class m221019_223135_create_buildings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%buildings}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(50)->notNull(),
            'location' => $this->string(50),
            'address' => $this->string(50),
            'longitude' => $this->decimal(11,8),
            'latitude' => $this->decimal(10,8),
            'description' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        $this->createIndex(
            'name_IDX',
            '{{%buildings}}',
            'name'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%buildings}}');
    }
}
