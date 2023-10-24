<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
    $login=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'db_connect.php';
        $userid=$_SESSION["userid"];
        $heading=$_POST["heading"];
        $content=$_POST["content"];
        $blogid=$_GET['blogid'];//here we will be retrieving blogid with the help of get which will be passed when we will be click on modify button
        $likes=0;
        $dislikes=0;
        $imgsrc=$_POST["image-src"];
        $time = floor(microtime(true));
        $rank = $dislikes-$likes+$time;
        $rank = $rank+1000;
        // echo $heading;
        // echo " ";
        // echo $content;
        // echo " ";
        // echo " ";
        $Updatesql="UPDATE `bloglist` SET `rank`='$rank',`heading`='$heading',`content`='$content',`image-source`='$imgsrc',`isAllowed`=1 WHERE `Blog_id`='$blogid'";

        $Updateres=mysqli_query($conn,$Updatesql);
        if($Updateres)
            header("location:index.html");
        else
            echo "Error occurred!!!while entering data into the database";
}

?>