<?php
/**
 * Created by ssiva on 10/01/2023
 */

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\ItemCategory;

class ItemCategoryController extends ActiveController
{
    public $modelClass = ItemCategory::class;
}
