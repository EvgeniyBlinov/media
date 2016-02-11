<?php
use lib\Config;

require APP_ROOT_PATH . '/src/config/local.php';
defined('APP_DEBUG') or define('APP_DEBUG', true);
if (APP_DEBUG) {
    error_reporting(E_ALL & ~E_DEPRECATED);
}
//defined('APP_DB_DEBUG') or define('APP_DB_DEBUG', false);

//switch ($_SERVER['SERVER_NAME']) {
    //default :
        //define('APPLICATION_MYSQL_DB_NAME', 'media');
        //define('APPLICATION_MYSQL_USER', 'root');
        //define('APPLICATION_MYSQL_PASS', 'root');
        //break;
//}

Config::$confArray = array(
    'init' => array(
        'debug'               => APP_DEBUG,
        'mode'                => 'production',
        'templates.path'      => APP_ROOT_PATH . '/src/templates'
    ),
    'production' => array(
        'parameters' => array(
        ),
        'auth' => array(
            'cookies.secret_key'  => '2ef7f9029474ca8a9c955ab18f996f5b',
        ),
        //'db' => array(
            //'mysql' => array(
                //'connect' => array(
                    //'host'     => 'localhost',
                    //'port'     => '3306',
                    //'dbname'   => APPLICATION_MYSQL_DB_NAME,
                    //'user'     => APPLICATION_MYSQL_USER,
                    //'password' => APPLICATION_MYSQL_PASS,
                    //'charset' => 'utf8'
                //)
            //)
        //)
    )
);

Config::$env = 'production';
