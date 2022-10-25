<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%offices}}`.
 */
class m221019_230353_create_offices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%offices}}', [
            'id' => $this->primaryKey()->unsigned(),
            'office_name' => $this->integer(30)->notNull(),
            'office_code' => $this->string(30)->notNull(),
            'fk_building' => $this->integer()->unsigned()->notNull(),
            'fk_building_floor' => $this->integer()->unsigned()->notNull(),
            'description' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        $this->addForeignKey(
            'fk_building_office',
            '{{%offices}}',
            'fk_building',
            '{{%buildings}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_building_floor',
            '{{%offices}}',
            'fk_building_floor',
            '{{%building_floors}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createIndex(
            'office_code_IDX',
            '{{%offices}}',
            'office_code'
        );
        $this->createIndex(
            'slug_IDX',
            '{{%offices}}',
            ['fk_building', 'office_code', 'fk_building_floor'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%offices}}');
    }
}
