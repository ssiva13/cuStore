<?php

namespace app\assets;

class AdminLtePluginsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    
    public $css = [
        'fontawesome-free/css/all.min.css',
        'sweetalert2/sweetalert2.min.css',
        'toastr/toastr.min.css',
        'datatables-bs4/css/dataTables.bootstrap4.min.css',
        'datatables-buttons/css/buttons.bootstrap4.min.css',
    ];
    public $js = [
        'sweetalert2/sweetalert2.min.js',
        'toastr/toastr.min.js',
        'datatables/jquery.dataTables.min.js',
        'datatables-bs4/js/dataTables.bootstrap4.min.js',
        'datatables-buttons/js/dataTables.buttons.min.js',
        'datatables-buttons/js/buttons.bootstrap4.min.js',
    ];
    
}