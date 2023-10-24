<?php
include 'C:\xampp\htdocs\Final\db_connect.php';
$temp=$_GET['data'];
$updateSql="UPDATE `bloglist` SET `isAllowed`=1 WHERE `Blog_id`='$temp'" ;
// $deleteSql="DELETE FROM `bloglist` WHERE `Blog_id`='$temp'";
$updateRes=mysqli_query($conn,$updateSql);
if($updateRes){
    header("location:bannedPostList.php");
}
else{
    echo "Delete operation can't be performed";
}


?>