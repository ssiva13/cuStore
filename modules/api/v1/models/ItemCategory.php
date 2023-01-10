<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\ItemCategory as ItemCategoryModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read array $links
 */
class ItemCategory extends ItemCategoryModel implements Linkable
{
    
    /**
     * @inheritDoc
     */
    public function fields(): array
    {
        return [
            'cat_id' => 'id',
            'slug' => 'slug',
            'name' => 'name',
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/item-category/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/item-category/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/item-category/delete/', 'id' => $this->id], true),
        ];
    }
}