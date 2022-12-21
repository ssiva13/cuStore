<?php
/**
 * Created by ssiva on 20/11/2022
 */

namespace app\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@vendor';
    
    public $css = [
        'select2/select2/dist/css/select2.min.css',
        'apalfrey/select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.min.css',
    ];
    public $js = [
        'select2/select2/dist/js/select2.full.js',
    ];
}