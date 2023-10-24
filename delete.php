<?php
include 'db_connect.php';
$blogid=$_GET['blogid'];//here we will be receiving that blogid which will be deleted when we click the delete button
$deleteSql="DELETE FROM `bloglist` WHERE `Blog_id`='$blogid'";
$deleteRes=mysqli_query($conn,$deleteSql);
if($deleteRes){
    header("location:index.html");
}
else{
    echo "Delete operation can't be performed";
}

?>