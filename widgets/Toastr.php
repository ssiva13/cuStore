<?php

namespace app\widgets;

use yii\base\Widget;
use \yii\bootstrap5\Widget as BsWidget;
use yii\helpers\Json;

class Toastr extends Widget
{
    const TYPE_INFO = 'info';
    const TYPE_ERROR = 'error';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';

    const POSITION_TOP_RIGHT = 'toast-top-right';
    const POSITION_TOP_LEFT = 'toast-top-left';
    const POSITION_TOP_CENTER = 'toast-top-center';
    const POSITION_TOP_FULL_WIDTH = 'toast-top-full-width';
    const POSITION_BOTTOM_RIGHT = 'toast-bottom-right';
    const POSITION_BOTTOM_LEFT = 'toast-bottom-left';
    const POSITION_BOTTOM_CENTER = 'toast-bottom-center';
    const POSITION_BOTTOM_FULL_WIDTH = 'toast-bottom-full-width';

    const EASING_SWING = 'swing';
    const EASING_LINEAR = 'linear';

    const ANIMATION_SLIDE_DOWN = 'slideDown';
    const ANIMATION_SLIDE_UP = 'slideUp';
    const ANIMATION_FADE_IN = 'fadeIn';
    const ANIMATION_FADE_OUT = 'fadeOut';
    const ANIMATION_SHOW = 'show';
    const ANIMATION_HIDE = 'hide';

    /**
     * @var string The alert type. This is one of the [[ALERT_TYPE_*]] constants.
     */
    public $type;

    /**
     * @var string The title to render
     */
    public $title;

    /**
     * @var string The main message to render
     */
    public $message;

    /**
     * @var bool Whether to show the close button
     */
    public $closeButton = false;

    /**
     * @var bool Is it debug mode?
     */
    public $debug = false;

    /**
     * @var bool Show the newest on top or at the end?
     */
    public $newestOnTop = true;

    /**
     * @var bool Whether to show a progress bar
     */
    public $progressBar = true;

    /**
     * @var string The position of the toast. One of the [[POSITION_*]] constants.
     */
    public $positionClass = self::POSITION_TOP_RIGHT;

    /**
     * @var bool Whether to show duplicate toasts.
     */
    public $preventDuplicates = true;

    /**
     * @var string A [[\yii\web\JsExpression]] with a js function which will be executed on click.
     */
    public $onclick = null;

    /**
     * @var string The animation duration in milliseconds until the toast appears
     */
    public $showDuration = 300;

    /**
     * @var string The animation duration in milliseconds until the toasts is hidden
     */
    public $hideDuration = 1000;

    /**
     * @var string How long the toast will display without user interaction
     */
    public $timeOut = 5000;

    /**
     * @var string How long the toast will display after a user hovers over it
     */
    public $extendedTimeOut = 1000;

    /**
     * @var string The animation easing to use while showing. One of the [[EASING_*]] constants.
     */
    public $showEasing = self::EASING_SWING;

    /**
     * @var string The animation easing to use while showing. One of the [[EASING_*]] constants.
     */
    public $hideEasing = self::EASING_SWING;

    /**
     * @var string The animation method to use while showing. One of the [[ANIMATION_*]] constants.
     */
    public $showMethod = self::ANIMATION_FADE_IN;

    /**
     * @var string The animation method to use while hiding. One of the [[ANIMATION_*]] constants.
     */
    public $hideMethod = self::ANIMATION_FADE_OUT;

    /**
     * @var bool Whether or not to dismiss the toast on tap.
     */
    public $tapToDismiss = true;

    /**
     * @var array Manually override all client options here.
     */
    public $clientOptions = [];

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();

        if (empty($this->clientOptions)) {
            $this->clientOptions = [
                'closeButton' => $this->closeButton,
                'debug' => $this->debug,
                'newestOnTop' => $this->newestOnTop,
                'progressBar' => $this->progressBar,
                'positionClass' => $this->positionClass,
                'preventDuplicates' => $this->preventDuplicates,
                'onclick' => $this->onclick,
                'showDuration' => $this->showDuration,
                'hideDuration' => $this->hideDuration,
                'timeOut' => $this->timeOut,
                'extendedTimeOut' => $this->extendedTimeOut,
                'showEasing' => $this->showEasing,
                'hideEasing' => $this->hideEasing,
                'showMethod' => $this->showMethod,
                'hideMethod' => $this->hideMethod,
                'tapToDismiss' => $this->tapToDismiss,
            ];
        }
    }

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $options = Json::encode($this->clientOptions);
        $js = "toastr.{$this->type}(\"{$this->message}\", \"{$this->title}\", {$options});";

        $this->view->registerJs($js);
    }
}