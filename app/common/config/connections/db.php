<?php
$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.getenv('MYSQL_HOST').';dbname='.getenv('MYSQL_DATABASE'),
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASSWORD'),
    'charset' => 'utf8',
];

if(YII_ENV_PROD) {
    $dbConfig = \yii\helpers\ArrayHelper::merge($dbConfig, [
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 60,
        'schemaCache' => 'cache',
    ]);
}

return $dbConfig;
