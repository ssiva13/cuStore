<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Office as OfficeModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read void $links
 */
class Office extends OfficeModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'office_id' => 'id',
            'code' => 'office_code',
            'name' => 'office_name',
            'floor_id' => 'fk_building_floor',
            'building_id' => 'fk_building',
            'details' => 'description',

        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/office/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/office/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/office/delete/', 'id' => $this->id], true),
        ];
    }
}