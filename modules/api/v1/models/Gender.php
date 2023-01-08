<?php

namespace app\modules\api\v1\models;

use app\models\Gender as GenderModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * Created by ssiva on 08/01/2023
 *
 * @property-read array $links
 */
class Gender extends GenderModel implements Linkable
{
    public function fields(): array
    {
        return [
            'key' => 'slug',
            'gender' => 'name',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/gender/update/', 'id' => $this->slug], true),
            'view' => Url::to(['/apiV1/gender/view/', 'id' => $this->slug], true),
            'delete' => Url::to(['/apiV1/gender/delete/', 'id' => $this->slug], true),
        ];
    }
}