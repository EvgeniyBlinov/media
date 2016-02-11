<?php
use lib\ApiResponse;
///*******************             router        ****************************/
//set json Content-Type
$app->group('/api/v1', function () use ($app) {
    $app->group('/volume', function () use ($app) {
        $app->map('/down', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $status = system('amixer -c 0 -q set Master 3%- unmute');
            if ($status !== false) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');

        $app->map('/up', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $status = system('amixer -c 0 -q set Master 3%+ unmute');
            if ($status !== false) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
    });

    $app->group('/key', function () use ($app) {
        $app->map('/space', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $XAUTHORITY = 'export XAUTHORITY=/home/user/.Xauthority; ';
            $status = system(/*$XAUTHORITY . */'export DISPLAY=:0.0; xdotool key space');
            if ($status !== false) {
                //$status = 200;
            } else {
                //$status = 500;
            }
                echo "<pre>";var_dump(
                $status
                );die;
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
    });
});
