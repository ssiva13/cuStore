<?php
/**
 * Created by ssiva on 08/01/2023
 */

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\Department;

class DepartmentController extends ActiveController
{
    public $modelClass = Department::class;
}
