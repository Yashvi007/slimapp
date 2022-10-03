<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';


$app = new \Slim\App;


$app->get('/', function (Request $request, Response $response, $args) {
    $html = <<<HTML
    <link rel="stylesheet"  type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body style="background-image:linear-gradient(to right,#5f5f5f,#f5f5f5)">
        <div class="container" style="margin-top: 200px; color: blue;">
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
                        <div class="card-body" style="background-color: #f5f5f5;">
                        <div style="text-align: center; color: black; ">
                            Welcome dear superadmin
                        </div>
                    <form method="post" class="form-box px-3">
                           
                        <div class="form-input">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-input">
                            <label style="margin-top: 10px;">Password</label>
                            <input type="password" name="password" placeholder="Enter Password"class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block" style="margin-top: 20px; background-color: #666666; color: white;" >LOGIN</button>

                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>     
    <!--<html>
    <form method="POST">
        <label>Name: <input name="name"></label>
        <label>Password: <input name="password"></label>
        <input type="submit">

    </form>
</html> -->
HTML;
    $response->getBody()->write($html);
    return $response;
});

$app->post('/', function (Request $request, Response $response, $args): Response {
    $data = $request->getParsedBody();
    include('../src/config/db.php');

    #echo $data;
    echo json_encode($data);
    $name=$data['name'];
    $password=$data['password'];
    #$h=json_decode($data);
    #echo $h;

    $query="SELECT * from superadmin where username='$name' and password='$password'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
         echo "<script>alert('You have logged in as an admin')</script>";
         header("Location: dashboard.php");
        exit();
    }
    else{
        echo "<script>alert('invalid details entered')</script>";
        header("Location:loginsadmin.php");
        exit();
    }
    $html = var_export($data, true);
    #echo gettype($html);
    #echo json_encode($html);
    $response->getBody()->write($html);

    return $response;

});
#require '../src/routes/login.php';
$app->run();
?>