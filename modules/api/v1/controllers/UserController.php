<?php
/**
 * Created by ssiva on 14/01/2023
 */

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\User;

class UserController extends ActiveController
{
    public $modelClass = User::class;
}