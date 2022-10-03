<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->get('/hello/{name}/{id}', function (Request $request, Response $response, array $args) {
	include('../src/config/db.php');
	$name = $args['name'];
    $id=$args['id'];
	$query="SELECT * from superadmin where username='$name' and password='$id'";
	$result=mysqli_query($connect,$query);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_array($result);
		 echo "<script>alert('You have logged in as an admin')</script>";
     	 header("Location: ../../../dashboard.php");
		exit();
	}
	else{
		echo "<script>alert('invalid details entered')</script>";
	}
}); 



?>