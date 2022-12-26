<?php

namespace app\models;

use Yii;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%gender}}".
 *
 * @property string $slug Gender Slug
 * @property string|null $name Gender Name
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Staff[] $staff
 */
class Gender extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gender}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['slug', 'name'], 'string', 'max' => 20],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slug' => 'Gender Slug',
            'name' => 'Gender Name',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['gender' => 'slug']);
    }
}
