<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Item as ItemModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read void $links
 */
class Item extends ItemModel implements Linkable
{
    
    /**
     * @inheritDoc
     */
    public function fields(): array
    {
        return [
            'item_id' => 'id',
            'cat_id' => 'fk_item_category',
            'slug' => 'slug',
            'name' => 'name',
            'details' => 'description',
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/item/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/item/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/item/delete/', 'id' => $this->id], true),
        ];
    }
}
