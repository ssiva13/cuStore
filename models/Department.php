<?php

namespace app\models;

use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%departments}}".
 *
 * @property int $id ID
 * @property int $name Department Name
 * @property string $slug
 * @property string|null $description
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 */
class Department extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%departments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['slug'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 150],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Department Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }
}
