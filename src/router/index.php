<?php
///*******************             router        ****************************/
//set json Content-Type
//$app->response->headers->set('Content-Type', 'application/json');

$app->group('/', function () use ($app) {
    $app->map('/', function () use ($app) {
        $revision = time();
        $app->render('index.php', compact('revision'));
        //$app->halt(200, file_get_contents(APP_ROOT_PATH . '/src/templates/index.html'));
    })
        ->via('GET');
});
