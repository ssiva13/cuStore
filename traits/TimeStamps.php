<?php


/**
 * Created by ssiva on 23/10/2022
 */


namespace app\traits;

use Carbon\Carbon;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

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
    public function afterFind(){
        $this->date_created = ($this->date_created) ? Carbon::parse($this->date_created)->toFormattedDayDateString() : $this->date_created;
        $this->date_modified = ($this->date_modified) ? Carbon::parse($this->date_modified)->toFormattedDayDateString() : $this->date_modified;
        if($this->hasAttribute('last_login_at') && $this->last_login_at){
            $this->last_login_at = Carbon::parse($this->last_login_at)->toFormattedDayDateString() .  ' ' . Carbon::parse($this->last_login_at)->toTimeString();
        }
        if($this->hasAttribute('status')){
            $this->status = $this->status ? Html::tag('span', 'Active', ['class' => 'badge bg-success']) : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
        }
        if($this->hasAttribute('active')){
            $this->active = $this->active ? Html::tag('span', 'Active', ['class' => 'badge bg-success']) : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
        }
    }

    public function beforeValidate(){
        $this->date_created = ($this->date_created) ? Carbon::parse($this->date_created) : $this->date_created;
        $this->date_modified = ($this->date_modified) ? Carbon::parse($this->date_modified) : $this->date_modified;
        if($this->hasAttribute('last_login_at') && $this->last_login_at){
            $this->last_login_at = Carbon::parse($this->last_login_at);
        }
    }
}