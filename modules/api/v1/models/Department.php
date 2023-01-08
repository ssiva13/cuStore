<?php
/**
 * Created by ssiva on 08/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Department as DepartmentModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read void $links
 */
class Department extends DepartmentModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'department_id' => 'id',
            'key' => 'slug',
            'department_name' => 'name',
            'details' => 'description',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/department/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/department/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/department/delete/', 'id' => $this->id], true),
        ];
    }
}