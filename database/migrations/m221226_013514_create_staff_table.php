<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 */
class m221226_013514_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'staff_number' => $this->string(6)->unique()->notNull()->comment('Staff Number'),
            'staff_email' => $this->string(50)->unique()->notNull()->comment('Staff Email'),
            'first_name' => $this->string(30)->notNull()->comment('First Name'),
            'last_name' => $this->string(30)->notNull()->comment('Last Name'),
            'fk_user' => $this->integer()->unsigned()->notNull()->comment('User ID'),
            'honorific' => $this->string(10)->comment('Title/Honorific'),
            'full_name' => $this->string(50)->notNull()->comment('Full Name'),
            'staff_extension' => $this->string(5)->null()->comment('Staff Extension'),
            'country_code' => $this->string(4)->null()->comment('Country Code'),
            'phone_prefix' => $this->integer(3)->null()->comment('Phone Prefix'),
            'phone_number' => $this->integer(9)->null()->comment('Phone Number'),
            'fk_department' => $this->integer()->unsigned()->null()->comment('Department ID'),
            'fk_position' => $this->integer()->unsigned()->null()->comment('Job Position'),
            'fk_office' => $this->integer()->unsigned()->null()->comment('Office ID'),
            'gender' => $this->string(20)->comment('Gender'),
            'date_created' => $this->timestamp()->notNull()->comment('Date Created')->defaultExpression('CURRENT_TIMESTAMP'),
            'date_modified' => $this->timestamp()->null()->comment('Date Modified')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null()->comment('Date Deleted'),
        ]);
        $this->addForeignKey(
            'fk_staff_office',
            '{{%staff}}',
            'fk_office',
            '{{%offices}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_staff_department',
            '{{%staff}}',
            'fk_department',
            '{{%departments}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_staff_user',
            '{{%staff}}',
            'fk_user',
            '{{%users}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_staff_position',
            '{{%staff}}',
            'fk_position',
            '{{%positions}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_staff_honorific',
            '{{%staff}}',
            'honorific',
            '{{%honorifics}}',
            'abbreviation',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_staff_gender',
            '{{%staff}}',
            'gender',
            '{{%gender}}',
            'slug',
            'NO ACTION',
            'NO ACTION'
        );
        
        $this->createIndex(
            'un_staff_phone',
            '{{%staff}}',
            ['country_code','phone_prefix','phone_number'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%staff}}');
    }
}
