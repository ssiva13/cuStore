<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%building_floors}}`.
 */
class m221019_225607_create_building_floors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%building_floors}}', [
            'id' => $this->primaryKey()->unsigned(),
            'floor_number' => $this->integer(2)->notNull(),
            'floor_code' => $this->string(25)->notNull(),
            'fk_building' => $this->integer()->unsigned()->notNull(),
            'description' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);

        $this->addForeignKey(
            'fk_building',
            '{{%building_floors}}',
            'fk_building',
            '{{%buildings}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createIndex(
            'floor_code_IDX',
            '{{%building_floors}}',
            'floor_code'
        );
        $this->createIndex(
            'slug_IDX',
            '{{%building_floors}}',
            ['fk_building', 'floor_number', 'floor_code'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%building_floors}}');
    }
}
