<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\BuildingFloor as BuildingFloorModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read array $links
 */
class BuildingFloor extends BuildingFloorModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'floor_id' => 'id',
            'building_id' => 'fk_building',
            'floor_number' => 'floor_number',
            'floor_code' => 'floor_code',
            'details' => 'description',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/building-floor/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/building-floor/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/building-floor/delete/', 'id' => $this->id], true),
        ];
    }
}