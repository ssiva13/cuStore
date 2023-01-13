<?php

namespace app\models;

use Yii;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
 * @property-read array $allDepartments
 * @property Staff[] $staff
 *
 *
 */
class Position extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%positions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['fk_department'], 'required'],
            [['fk_department'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['slug'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
            [['slug'], 'unique'],
            [
                ['fk_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['fk_department' => 'id'],
                'message' => '{attribute} is invalid. See '. Url::to(['/apiV1/department'], true)
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'fk_department' => 'Department',
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
     * @return ActiveQuery
     */
    public function getFkDepartment(): ActiveQuery
    {
        return $this->hasOne(Department::class, ['id' => 'fk_department']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return ActiveQuery
     */
    public function getStaff(): ActiveQuery
    {
        return $this->hasMany(Staff::class, ['fk_position' => 'id']);
    }
    
    public function getAllDepartments(): array
    {
        $departments = ArrayHelper::map(Department::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $departments);
    }
    
}
