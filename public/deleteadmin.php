<?php

require '../vendor/autoload.php';
require '../src/config/db.php';
$id = $_GET['id'];
echo $id;

$q1 = "DELETE from admin where id='$id'";
$r1 = mysqli_query($connect, $q1);
if($r1){
	header("Location:view1.php");
}



?>
