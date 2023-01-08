<?php

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\Gender;

class GenderController extends ActiveController
{
    public $modelClass = Gender::class;
    
}
