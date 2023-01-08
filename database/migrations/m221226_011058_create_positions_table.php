<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%positions}}`.
 */
class m221226_011058_create_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%positions}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'fk_department' => $this->integer()->unsigned()->notNull()->comment('Department ID'),
            'slug' => $this->string(20)->unique()->comment('Position Slug'),
            'name' => $this->string(20)->comment('Position Name'),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        $this->addForeignKey(
            'fk_position_department',
            '{{%positions}}',
            'fk_department',
            '{{%departments}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%positions}}');
    }
}
