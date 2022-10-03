<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
 
require '../vendor/autoload.php';
require '../src/config/db.php';
 
 
$app = new \Slim\App;
 
$app->get('/', function (Request $request, Response $response, $args) {
    $html = <<< HTML
    <link rel="stylesheet"  type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body style="background-image:linear-gradient(to right,#5f5f5f,#f5f5f5)">
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="col-md-12">
            <div class="row">
                        <div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
 
                            <div class="card-body" style="background-color: #f5f5f5;">
                                <h5 class="text-center my-3 title">CREATE A NEW POST</h5>
                                <form method="post" class="form-box px-3">
 
 
                                    <div class="form-input">
                                   
                                    </div>
                                    <br>
                                    <div class="form-input">
                                        <label>POST TITLE</label>
                                            <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter the title">
                                    </div>
                                    <br>
                                    <div class="form-input">
                                            <label>Username</label>
                                            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Enter your ID">
                                        </div>
                                    <br>
 
                                    <div class="form-group">
                                    <label for="comment">WRITE POST </label>
                                    <textarea class="form-control" rows="5" id="comment" name="postblog"></textarea>
                                    </div>
                                   
                                    <button type="submit"  class="btn btn-block" >SUBMIT</button>
                                </form>
                            </div>
                     
 
 
 
            </div>
</div>
</div>
 
</body>    
   
 
HTML;
    $response->getBody()->write($html);
    return $response;
});
#<textarea class="form-control" rows="5" id="comment" name="postblog"></textarea>
$app->post('/', function (Request $request, Response $response, $args): Response {
    $data = $request->getParsedBody();
    include('../src/config/db.php');
 
    #echo $data;
    echo json_encode($data);
    $title = $data['title'];
 
    $name=$data['name'];
    $content=$data['postblog'];
 
    $query="INSERT INTO blog(title , content , lastedited , author,editedby) VALUES('$title','$content',NOW(),'$name','$name')";
 
    $result =mysqli_query($connect,$query);
    if($result) {
 
         echo "<script>alert('DATA added')</script>";
         header("Location: dashboardadmin.php/$name");
        exit();
    }
    else{
        echo "<script>alert('invalid details entered')</script>";
        header("Location: login.php");
        exit();
    }
    $html = var_export($data, true);
    #echo gettype($html);
    #echo json_encode($html);
    $response->getBody()->write($html);
 
    return $response;
 
});
$app->run();
?>
