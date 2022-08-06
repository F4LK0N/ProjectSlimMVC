<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\DevController;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello World!");
    return $response;
});

$app->get('/DEV[/{endpoints:.*}]', function (Request $request, Response $response, array $endpoints) {
    $controller = new DevController($request,$response, $endpoints);
    return $response;
});

$app->run();
