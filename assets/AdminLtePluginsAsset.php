<?php

namespace app\assets;

class AdminLtePluginsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

    public $css = [
        'fontawesome-free/css/all.min.css',
        'sweetalert2/sweetalert2.min.css',
        'toastr/toastr.min.css',
    ];
    public $js = [
        'sweetalert2/sweetalert2.min.js',
        'toastr/toastr.min.js',
    ];

}