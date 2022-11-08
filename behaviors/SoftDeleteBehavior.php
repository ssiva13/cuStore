<?php

namespace app\behaviors;

use yii\behaviors\TimestampBehavior;

/**
 * Created by ssiva on 04/11/2022
 *
 * @property bool $replaceRegularDelete
 * @property bool $useRestoreAttributeValuesAsDefaults
 */
class SoftDeleteBehavior extends TimestampBehavior
{
    const EVENT_BEFORE_SOFT_DELETE = 'beforeSoftDelete';
    const EVENT_AFTER_SOFT_DELETE = 'afterSoftDelete';
    const EVENT_BEFORE_FORCE_DELETE = 'beforeForceDelete';
    const EVENT_AFTER_FORCE_DELETE = 'beforeForceDelete';
    const EVENT_BEFORE_RESTORE = 'beforeRestore';
    const EVENT_AFTER_RESTORE = 'afterRestore';
    
    public string $deletedAtAttribute = 'deleted_at';
    
    public bool $withTimestamp = false;
    
    public function init()
    {
        if ($this->withTimestamp) {
            parent::init();
        }
        
        $this->attributes = array_merge($this->attributes, [
            static::EVENT_BEFORE_SOFT_DELETE => $this->deletedAtAttribute,
        ]);
    }
}
