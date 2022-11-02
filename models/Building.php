<?php

namespace app\models;

use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%buildings}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $location
 * @property string|null $address
 * @property float|null $longitude
 * @property float|null $latitude
 * @property string|null $description
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property BuildingFloor[] $buildingFloors
 * @property Office[] $offices
 */
class Building extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%buildings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['name', 'location', 'address'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

    /**
     * Gets query for [[BuildingFloors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuildingFloors()
    {
        return $this->hasMany(BuildingFloor::class, ['fk_building' => 'id']);
    }

    /**
     * Gets query for [[Offices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::class, ['fk_building' => 'id']);
    }
}
