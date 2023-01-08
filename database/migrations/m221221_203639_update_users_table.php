<?php

use yii\db\Migration;

/**
 * Class m221221_203639_update_users_table
 */
class m221221_203639_update_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%users}}',
            'password_reset_token',
            $this->string(50)->after('password')->comment('Password Reset Token')
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221221_203639_update_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_203639_update_users_table cannot be reverted.\n";

        return false;
    }
    */
}
