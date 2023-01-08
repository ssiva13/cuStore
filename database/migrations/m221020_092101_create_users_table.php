<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221020_092101_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'username' => $this->string(30)->unique()->notNull()->comment('Username'),
            'email' => $this->string(50)->unique()->notNull()->comment('Email Address'),
            'password' => $this->string(150)->notNull()->comment('Password'),
            'access_token' => $this->string(32)->null()->comment('Access Token'),
            'auth_key' => $this->string(32)->null()->comment('Auth Key'),
            'active' => $this->integer(1)->notNull()->defaultValue(1)->comment('Status'),
            'last_login_at' => $this->timestamp()->comment('Last Login'),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
