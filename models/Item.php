<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use yii\helpers\Url;

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
class Item extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%items}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'slug', 'fk_item_category'], 'required'],
            [['fk_item_category'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 150],
            [['slug'], 'unique'],
            [
                ['fk_item_category'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::class, 'targetAttribute' => ['fk_item_category' => 'id'],
                'message' => '{attribute} is invalid. See '. Url::to(['/apiV1/item-category'], true)
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
     * @return ActiveQuery
     */
    public function getFkItemCategory(): ActiveQuery
    {
        return $this->hasOne(ItemCategory::class, ['id' => 'fk_item_category']);
    }
    
    public function getAllCategories(): array
    {
        $categories = ArrayHelper::map(ItemCategory::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $categories);
    }
}
