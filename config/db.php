<?php

$config = [];

if(file_exists(__DIR__.'/db.local.php')){
    $config = require_once __DIR__.'/db.local.php';
}

return array_merge([
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=apidicake2',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
], $config);
