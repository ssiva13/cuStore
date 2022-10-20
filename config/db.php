<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => env('DB_CONNECTION').':host='.env('DB_HOST').';dbname='.env('DB_DATABASE'),
    'username' => env('DB_USER'),
    'password' => env('DB_PASSWORD'),
    'charset' => env('DB_CHARSET'),
    'tablePrefix' => env('TABLE_PREFIX'),

    'enableSchemaCache' => YII_ENV_PROD,
    'schemaCacheDuration' => (YII_ENV_PROD) ? 60 : 0,
    'schemaCache' => 'cache',
];
