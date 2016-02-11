<?php
use lib\ApiResponse;
///*******************             router        ****************************/
//set json Content-Type
$app->group('/api/v1', function () use ($app) {
    $app->group('/volume', function () use ($app) {
        $app->map('/down', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            if ($status = system('amixer -c 0 -q set Master 3%- unmute')) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
    });
});

$app->group('/api/v1', function () use ($app) {
    $app->group('/volume', function () use ($app) {
        $app->map('/up', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            if ($status = system('amixer -c 0 -q set Master 3%+ unmute')) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
    });
});