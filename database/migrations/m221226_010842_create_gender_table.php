<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gender}}`.
 */
class m221226_010842_create_gender_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gender}}', [
            'slug' => $this->string(20)->unique()->notNull()->comment('Gender Slug'),
            'name' => $this->string(20)->comment('Gender Name'),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        
        $this->addPrimaryKey('pk_on_slug', '{{%gender}}', 'slug');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gender}}');
    }
}
