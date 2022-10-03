
<?php

require '../vendor/autoload.php';
require '../src/config/db.php';
$id = $_GET['id'];
$bid=$_GET['bid'];

$q1 = "DELETE from blog where id='$bid'";
$r1 = mysqli_query($connect, $q1);

header("Location: viewotherblog.php/$id");


?>
