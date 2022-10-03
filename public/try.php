<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';
include('../src/config/db.php');

$app = new \Slim\App;


$app->get('/', function (Request $request, Response $response, $args) {
	$html=<<<HTML 
	
	<body>
		<h5>Admin page</h5>
	</body>
	
	HTML;

	$response->getBody()->write("yo");
    return $response;
});

$app->run();
?>