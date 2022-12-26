<?php

use yii\db\Migration;

/**
 * Class m221226_011625_update_auth_table
 */
class m221226_011625_update_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%auth}}',
            'date_created',
            $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP')
        );
        $this->addColumn(
            '{{%auth}}',
            'date_modified',
            $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP')
        );
        $this->addColumn(
            '{{%auth}}',
            'deleted_at',
            $this->timestamp()->null()->comment('Date Deleted')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221226_011625_update_auth_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221226_011625_update_auth_table cannot be reverted.\n";

        return false;
    }
    */
}
