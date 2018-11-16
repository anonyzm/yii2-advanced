<?php
$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ .'/.env');

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));