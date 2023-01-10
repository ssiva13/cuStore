<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Building as BuildingModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read array $links
 */
class Building extends BuildingModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'building_id' => 'id',
            'building_name' => 'name',
            'details' => 'description',
            'location' => 'location',
            'address' => 'address',
            'longitude' => 'longitude',
            'latitude' => 'latitude',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/building/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/building/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/building/delete/', 'id' => $this->id], true),
        ];
    }
}
