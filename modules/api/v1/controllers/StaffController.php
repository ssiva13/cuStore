<?php
/**
 * Created by ssiva on 13/01/2023
 */

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\Staff;

class StaffController extends ActiveController
{
    public $modelClass = Staff::class;
}