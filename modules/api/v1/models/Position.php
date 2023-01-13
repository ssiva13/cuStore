<?php
/**
 * Created by ssiva on 13/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Position as PositionModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read array $links
 */
class Position extends PositionModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'position_id' => 'id',
            'key' => 'slug',
            'position' => 'name',
            'department' => 'fk_department',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/position/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/position/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/position/delete/', 'id' => $this->id], true),
        ];
    }
}