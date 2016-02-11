<?php
use lib\Config;

defined('APP_WEB_ROOT_PATH') or define('APP_WEB_ROOT_PATH', __DIR__);
defined('APP_ROOT_PATH') or define('APP_ROOT_PATH', dirname(__DIR__));

require(implode(DIRECTORY_SEPARATOR, [APP_ROOT_PATH, 'vendor', 'autoload.php']));
//require(implode(DIRECTORY_SEPARATOR, [APP_ROOT_PATH, 'vendor', 'slim', 'slim', 'Slim', 'Slim.php']));
//\Slim\Slim::registerAutoloader();
require(implode(DIRECTORY_SEPARATOR, [APP_ROOT_PATH, 'src', 'config', 'config.php']));


$app = new \Slim\Slim(Config::$confArray['init']);

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(Config::$confArray['production']);
});

//// Only invoked if mode is "development"
//$app->configureMode('development', function () use ($app) {
    //$app->config(\lib\Config::$confArray['development']);
//});

// Automatically load router files
$routers = glob(APP_ROOT_PATH . '/src/router/*.php');
foreach ($routers as $router) {
    require $router;
}

$app->run();
