<?php


/**
 * Created by ssiva on 02/11/2022
 */


namespace app\traits;

use Carbon\Carbon;

trait ValidationTrait
{
    public function beforeValidate()
    {
        if(!$this->isNewRecord){
            $this->date_created = ($this->date_created) ? Carbon::parse($this->date_created) : $this->date_created;
            $this->date_modified = ($this->date_modified) ? Carbon::parse($this->date_modified) : $this->date_modified;
        }
        if($this->hasAttribute('slug')){
            $this->slug = slug($this->slug);
        }
        return parent::beforeValidate();
    }
}