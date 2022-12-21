<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%items}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $fk_item_category
 * @property string|null $description
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property-read mixed $allCategories
 * @property ItemCategory $fkItemCategory
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%items}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'fk_item_category', 'date_created'], 'required'],
            [['fk_item_category'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 150],
            [['slug'], 'unique'],
            [['fk_item_category'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::class, 'targetAttribute' => ['fk_item_category' => 'id']],
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
            'fk_item_category' => 'Category',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }
    
    /**
     * Gets query for [[FkItemCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkItemCategory()
    {
        return $this->hasOne(ItemCategory::class, ['id' => 'fk_item_category']);
    }
    
    public function getAllCategories()
    {
        $categories = ArrayHelper::map(ItemCategory::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $categories);
    }
}
