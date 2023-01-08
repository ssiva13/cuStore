<?php

/* @var $this yii\web\View */
/* @var $model yii\db\ActiveRecord */
/* @var $relAttributes array */
/* @var $form yii\bootstrap5\ActiveForm */

foreach ($relAttributes as $field => $relAttribute){
    if(count($model->{$relAttribute}) === 1 ) {
        $message = strtr('No {label} found. Add more {label} to continue!', [ '{label}' =>  pluralize($model->getAttributeLabel($field)) ]);
        $model->addError($field, $message);
    }
}

