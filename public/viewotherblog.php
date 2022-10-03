<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
$container = $app->getContainer();
    $container['renderer'] = new PhpRenderer("./templates");
    


$app->get('/{id}', function (Request $request, Response $response, array $args) {
    $id=$args['id'];
    return $this->renderer->render($response, "/viewotherblogadmin.html", array('id' => $id));
});

$app->run();