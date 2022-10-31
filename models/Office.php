<?php

namespace app\models;

use app\traits\SoftDeletes;
use app\traits\TimeStamps;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%offices}}".
 *
 * @property int $id
 * @property int $office_name
 * @property string $office_code
 * @property int $fk_building
 * @property int $fk_building_floor
 * @property string|null $description
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Building $fkBuilding
 * @property BuildingFloor $fkBuildingFloor
 */
class Office extends ActiveRecord
{
    use SoftDeletes, TimeStamps;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%offices}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_name', 'office_code', 'fk_building', 'fk_building_floor'], 'required'],
            [['office_name', 'fk_building', 'fk_building_floor'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['office_code'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 150],
            [['fk_building', 'office_code', 'fk_building_floor'], 'unique', 'targetAttribute' => ['fk_building', 'office_code', 'fk_building_floor']],
            [['fk_building_floor'], 'exist', 'skipOnError' => true, 'targetClass' => BuildingFloor::class, 'targetAttribute' => ['fk_building_floor' => 'id']],
            [['fk_building'], 'exist', 'skipOnError' => true, 'targetClass' => Building::class, 'targetAttribute' => ['fk_building' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_name' => 'Office Name',
            'office_code' => 'Office Code',
            'fk_building' => 'Fk Building',
            'fk_building_floor' => 'Fk Building Floor',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

    /**
     * Gets query for [[FkBuilding]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkBuilding()
    {
        return $this->hasOne(Building::class, ['id' => 'fk_building']);
    }

    /**
     * Gets query for [[FkBuildingFloor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkBuildingFloor()
    {
        return $this->hasOne(BuildingFloor::class, ['id' => 'fk_building_floor']);
    }
}
