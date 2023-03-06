<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response, array $args) {
        $controller = $this->get('NumberBumblerController');
        return $controller->home($request, $response, $args);
    })->setName('startPage');

    $app->get('/fib/{depth}', function (Request $request, Response $response, array $args) {
        $controller = $this->get('NumberBumblerController');
        return $controller->fibonacci($request, $response, $args);
    })->setName('fibonacciPage');

    $app->get('/fizzbuzz/{from}/{to}', function (Request $request, Response $response, array $args) {
        $controller = $this->get('NumberBumblerController');
        return $controller->fizzBuzzer($request, $response, $args);
    })->setName('fizzbuzz');
};
