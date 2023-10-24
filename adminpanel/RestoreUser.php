<?php
include 'C:\xampp\htdocs\Final\db_connect.php';
$temp=$_GET['data'];

$updateSql="UPDATE `userinfo` SET `isAllowed`=1 WHERE `UserId`='$temp'" ;
// $deleteSql="DELETE FROM `bloglist` WHERE `Blog_id`='$temp'";
$updateRes=mysqli_query($conn,$updateSql);
if($updateRes){
    header("location:admin.php");
}
else{
    echo "Restore operation can't be performed";
}


?>