<?php
/**
 * Created by ssiva on 05/11/2022
 */

namespace app\widgets;

use Yii;
use yii\grid\ActionColumn as BaseActionColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ActionColumn extends BaseActionColumn
{
    public $header = 'Actions';
    
    public $additionalOptions = [
    
    ];
    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'pencil-alt');
        $this->initDefaultButton('delete', 'trash', [
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]
        ]);
    }
    /**
     * Initializes the default button rendering callback for single button.
     * @param string $name Button name as it's written in template
     * @param string $iconName The part of Bootstrap glyphicon class that makes it unique
     * @param array $additionalOptions Array of additional options
     * @since 2.0.11
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        $additionalOptions = ArrayHelper::merge($this->additionalOptions, $additionalOptions);
        if (!isset($this->buttons[$name]) && str_contains($this->template, '{' . $name . '}')) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $tag = 'button';
                        $title = '<i class="fas fa-eye"></i>';
                        $additionalOptions = [
                            'value' => $url,
                            'class' => 'btn btn-outline-info border-0 showModalButton',
                            'title' => "View",
                        ];
                        break;
                    case 'update':
                        $tag = 'button';
                        $title = '<i class="fa fa-pencil-alt"></i>';
                        $additionalOptions = [
                            'value' => $url,
                            'class' => 'btn btn-outline-warning border-0 showModalButton',
                            'title' => "Edit",
                        ];
                        break;
                    case 'delete':
                        $tag = 'a';
                        $title = '<i class="fas fa-trash"></i>';
                        $additionalOptions = [
                            'value' => $url,
                            'class' => 'btn btn-outline-danger btn-transition border-0',
                            'title' => "Delete",
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ]
                        ];
                        break;
                    default:
                        $tag = 'a';
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('i', '', ['class' => "fas fa-$iconName"]);
                return Html::tag($tag, $icon, $options);
            };
        }
    }
    
    
}