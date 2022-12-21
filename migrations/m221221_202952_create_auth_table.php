<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth}}`.
 */
class m221221_202952_create_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'fk_user' => $this->integer()->unsigned()->notNull(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ]);
    
        $this->addForeignKey(
            'fk_auth_user',
            '{{%auth}}',
            'fk_user',
            '{{%users}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auth}}');
    }
}
