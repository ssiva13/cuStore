<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Honorific as HonorificModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read array $links
 */
class Honorific extends HonorificModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'abbreviation' => 'abbreviation',
            'slug' => 'slug',
            'title' => 'name',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/honorific/update/', 'id' => $this->slug], true),
            'view' => Url::to(['/apiV1/honorific/view/', 'id' => $this->slug], true),
            'delete' => Url::to(['/apiV1/honorific/delete/', 'id' => $this->slug], true),
        ];
    }
}
