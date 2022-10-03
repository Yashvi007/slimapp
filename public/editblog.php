<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
$container = $app->getContainer();
    $container['renderer'] = new PhpRenderer("./templates");


$app->get('/{id}/{bid}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $bid=$args['bid'];
    
    return $this->renderer->render($response, "/editblog.html", array('id' => $id, 'bid'=>$bid));
});

$app->run();





