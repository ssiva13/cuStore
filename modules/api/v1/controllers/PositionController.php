<?php
/**
 * Created by ssiva on 13/01/2023
 */

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\Position;

class PositionController extends ActiveController
{
    public $modelClass = Position::class;
}