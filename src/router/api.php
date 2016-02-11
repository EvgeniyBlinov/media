<?php
use lib\ApiResponse;
function xdotool($key)
{
    $user = defined('USER') ? constant('USER') : $_SERVER['USER'];
    $XAUTHORITY = "export XAUTHORITY=/home/$user/.Xauthority; ";
    return system("$XAUTHORITY export DISPLAY=:0; xdotool key $key");
}
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
            $status = xdotool('space');
            if ($status !== false) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
        $app->map('/left', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $status = xdotool('Left');
            if ($status !== false) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
        $app->map('/right', function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $status = xdotool('Right');
            if ($status !== false) {
                $status = 200;
            } else {
                $status = 500;
            }
            $app->halt(200, (new ApiResponse(array(), array(compact('status')))));
        })
            ->via('GET');
    });
});
