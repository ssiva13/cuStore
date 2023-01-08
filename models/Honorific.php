<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };

/**
 * This is the model class for table "{{%honorifics}}".
 *
 * @property string $abbreviation Title/Honorific Abbreviation
 * @property string $slug Title/Honorific Slug
 * @property string $name Title/Honorific Name
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Staff[] $staff
 */
class Honorific extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%honorifics}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abbreviation', 'slug', 'name'], 'required'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['abbreviation'], 'string', 'max' => 10],
            [['slug', 'name'], 'string', 'max' => 20],
            [['abbreviation'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'abbreviation' => 'Title/Honorific Abbreviation',
            'slug' => 'Title/Honorific Slug',
            'name' => 'Title/Honorific Name',
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
        return $this->hasMany(Staff::class, ['honorific' => 'abbreviation']);
    }
}
