<?php

namespace app\models;

use app\traits\{SoftDeleteTrait, TimeStampsTrait, ValidationTrait};
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%item_categories}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Item[] $items
 */
class ItemCategory extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%item_categories}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['slug'], 'string', 'max' => 25],
            [['name'], 'string', 'max' => 30],
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
            'name' => 'Name',
            'slug' => 'Slug',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

//    /**
//     * Gets query for [[Items]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getItems()
//    {
//        return $this->hasMany(Item::class, ['fk_item_category' => 'id']);
//    }
}
