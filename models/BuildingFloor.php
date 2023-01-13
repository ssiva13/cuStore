<?php

namespace app\models;

use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%building_floors}}".
 *
 * @property int $id
 * @property int $floor_number
 * @property string $floor_code
 * @property int $fk_building
 * @property string|null $description
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Building $fkBuilding
 * @property-read mixed $allBuildings
 * @property Office[] $offices
 */
class BuildingFloor extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%building_floors}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['floor_number', 'floor_code', 'fk_building'], 'required'],
            [['floor_number', 'fk_building'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['floor_code'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 150],
            [['fk_building', 'floor_number', 'floor_code'], 'unique', 'targetAttribute' => ['fk_building', 'floor_number', 'floor_code']],
            [
                ['fk_building'], 'exist', 'skipOnError' => true, 'targetClass' => Building::class, 'targetAttribute' => ['fk_building' => 'id'],
                'message' => '{attribute} is invalid. See '. Url::to(['/apiV1/building'], true)
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor_number' => 'Floor Number',
            'floor_code' => 'Floor Code',
            'fk_building' => 'Building',
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
     * Gets query for [[Offices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::class, ['fk_building_floor' => 'id']);
    }
    
    public function getAllBuildings()
    {
        $buildings = ArrayHelper::map(Building::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $buildings);
    }
    
    public static function allBuildingFloors($building_id){
        $building = Building::findOne($building_id);
        $floors = ArrayHelper::map($building->buildingFloors, 'id', 'name');
        return $building->buildingFloors;
    }
}
