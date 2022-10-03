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
        <div class="container" style="margin-top: 100px; color: blue;">
        <div class="col-md-12">
            <div class="row">
               
                <div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
                        <div class="card-body" style="background-color: #f5f5f5;">
                        <div style="text-align: center; color: black; ">
                            Add Admin
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
 
                        <div class="form-input" style="padding-left: 140px; padding-top: 20px;">
                            <input type="checkbox" name="read" value = 1   style="margin-top: 10px; "> Read
                            </div>

                        <div class="form-input" style="padding-left: 140px; padding-top: 20px;">
                            <input type="checkbox" name="update" value = 1 style="margin-top: 10px;"> Update</div>
                        <div class="form-input" style="padding-left: 140px; padding-top: 20px;">
                            <input type="checkbox" name="delete" value = 1 style="margin-top: 10px;"> Delete</div>
 
                        
 
                        <button type="submit" class="btn btn-block" style="margin-top: 20px; background-color: #666666; color: white;" >ADD DETAILS TO DATABASE</button>
 
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>    
    
HTML;
    $response->getBody()->write($html);
    return $response;
});
 


$app->post('/', function (Request $request, Response $response, $args): Response {
    $data = $request->getParsedBody();
    include('../src/config/db.php');
    
    $name=$data['name'];
    $password=$data['password'];
 
    $read_a = isset($data['read']) ? 1 : 0;
    $update_a = isset($data['update']) ? 1 : 0;
    $delete_a = isset($data['delete']) ? 1 : 0;

    $query="INSERT INTO admin(username , password ,readblog ,updateblog,deleteblog ) VALUES('$name','$password','$read_a','$update_a','$delete_a')";
 
    $result =mysqli_query($connect,$query);
    if($result){
        $row=mysqli_fetch_array($result);
         echo "<script>alert('DATA added')</script>";
         header("Location: dashboard.php");
        exit();
    }
    else{
        echo "<script>alert('invalid details entered')</script>";
        header("Location: addadmin.php");
        exit();
    }
    $html = var_export($data, true);
    $response->getBody()->write($html);
    return $response;
 
});

$app->run();
?>
