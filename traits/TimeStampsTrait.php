<?php


/**
 * Created by ssiva on 23/10/2022
 */


namespace app\traits;

use Carbon\Carbon;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\log\Logger;

trait TimeStampsTrait
{
    public string $status_string;
    public string $active_string;
    public string $date_created_string;
    public string $date_modified_string;
    public string $last_login_at_string;
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
    public function afterFind(){
        $this->date_created_string = ($this->date_created) ? Carbon::parse($this->date_created)->toFormattedDayDateString() : '';
        $this->date_modified_string = ($this->date_modified) ? Carbon::parse($this->date_modified)->toFormattedDayDateString() : '';
        if($this->hasAttribute('last_login_at') && $this->last_login_at){
            $this->last_login_at_string = Carbon::parse($this->last_login_at)->toFormattedDayDateString() .  ' ' . Carbon::parse($this->last_login_at)->toTimeString();
        }
        if($this->hasAttribute('status')){
            $this->status_string = $this->status ? Html::tag('span', 'Active', ['class' => 'badge bg-success']) : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
        }
        if($this->hasAttribute('active')){
            $this->active_string = $this->active ? Html::tag('span', 'Active', ['class' => 'badge bg-success']) : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
        }
    }

}