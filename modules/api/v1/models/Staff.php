<?php
/**
 * Created by ssiva on 13/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\Staff as StaffModel;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 *
 * @property-read void $links
 */
class Staff extends StaffModel implements Linkable
{
    
    public function fields(): array
    {
        return [
            'staff_id' => 'id',
            'user_id' => 'fk_user',
            'staff_number' => 'staff_number',
            'staff_email' => 'staff_email',
            'title' => 'honorific',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'full_name' => 'full_name',
            'country_code' => 'country_code',
            'phone_number' => 'phone_number',
            'phone_prefix' => 'phone_prefix',
            'phone' => function (Staff $model) {
                return $model->country_code. '(' .$model->phone_prefix. ')' .$model->phone_number;
            },
            'office_code' => 'staff_extension',
            'role' => 'fk_position',
            'department' => 'fk_department',
            'office' => 'fk_office',
            'gender' => 'gender',
        ];
    }
    /**
     * @inheritDoc
     */
    public function getLinks(): array
    {
        return [
            'edit' => Url::to(['/apiV1/staff/update/', 'id' => $this->id], true),
            'view' => Url::to(['/apiV1/staff/view/', 'id' => $this->id], true),
            'delete' => Url::to(['/apiV1/staff/delete/', 'id' => $this->id], true),
        ];
    }
}