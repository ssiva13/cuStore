<?php

namespace app\models;

use Yii;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%positions}}".
 *
 * @property int $id ID
 * @property int $fk_department Department ID
 * @property string|null $slug Position Slug
 * @property string|null $name Position Name
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Department $fkDepartment
 * @property Staff[] $staff
 */
class Position extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%positions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_department'], 'required'],
            [['fk_department'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['slug', 'name'], 'string', 'max' => 20],
            [['slug'], 'unique'],
            [['fk_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['fk_department' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_department' => 'Department ID',
            'slug' => 'Position Slug',
            'name' => 'Position Name',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

    /**
     * Gets query for [[FkDepartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'fk_department']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['fk_position' => 'id']);
    }
}
