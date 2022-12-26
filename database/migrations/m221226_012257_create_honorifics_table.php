<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%honorifics}}`.
 */
class m221226_012257_create_honorifics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%honorifics}}', [
            'abbreviation' => $this->string(10)->unique()->notNull()->comment('Title/Honorific Abbreviation'),
            'slug' => $this->string(20)->unique()->notNull()->comment('Title/Honorific Slug'),
            'name' => $this->string(20)->notNull()->comment('Title/Honorific Name'),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
    
        $this->addPrimaryKey('pk_on_abbreviation', '{{%honorifics}}', 'abbreviation');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%honorifics}}');
    }
}
