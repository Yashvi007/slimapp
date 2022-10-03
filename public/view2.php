<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
$container = $app->getContainer();
    $container['renderer'] = new PhpRenderer("./templates");
    


$app->get('/', function (Request $request, Response $response, $args){

    return $this->renderer->render($response, "/viewblog.html");
});

$app->run();