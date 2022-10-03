<?php

require '../../src/config/db.php';


if (isset($_POST['submit'])) {
    
    $id=$_POST['id'];
    $bid=$_POST['bid'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    echo $content;
      
    $query = "UPDATE blog SET title='$title', content='$content', lastedited=NOW(), editedby='$id'  where id='$bid'";
    $re1 = mysqli_query($connect, $query);
    if($re1){
    	header("Location: ../viewblog.php/$id");
    }
    
    
}



?>