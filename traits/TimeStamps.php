<?php


/**
 * Created by ssiva on 23/10/2022
 */


namespace app\traits;

use Carbon\Carbon;
use yii\behaviors\TimestampBehavior;

trait TimeStamps
{
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_created',
                'updatedAtAttribute' => 'date_modified',
                'value' => Carbon::now()
            ],
        ];
    }
}