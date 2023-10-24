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
        $likes=0;
        $dislikes=0;
        $imgsrc=$_POST["image-src"];
        $time = floor(microtime(true));
        $rank = $dislikes-$likes+$time;
        date_default_timezone_set('Asia/Kolkata');
        $date = date("F j, Y, g:i a");
        // echo $heading;
        // echo " ";
        // echo $content;
        // echo " ";
        // echo " ";
        $sql="INSERT INTO `bloglist` (`rank`,`UserId`, `heading`, `content`,`image-source`,`likes`,`dislikes`,`Time`,`date`) VALUES ('$rank','$userid', '$heading',
        '$content','$imgsrc','$likes','$dislikes','$time','$date');";

        $res=mysqli_query($conn,$sql);
        if($res)
            header("location:index.html");
        else
            echo "Error occurred!!!while entering data into the database";
}

?>