<?php

require '../../src/config/db.php';

if (isset($_POST['submit'])) {
    
    $id=$_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $read = $_POST['read'];
    $delete = $_POST['delete'];
    $update = $_POST['update'];

      
    $query = "UPDATE admin SET username='$username', password='$password', readblog='$read',deleteblog='$delete',updateblog='$update' where id='$id'";
	$re1 = mysqli_query($connect, $query);

    header("Location: ../view1.php");
    
}


?>