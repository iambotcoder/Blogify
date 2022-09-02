<?php
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $userid=$_POST["userid"];
    $password=$_POST["password"];
    $existsSql="SELECT * FROM `userinfo` WHERE Userid='$userid'";
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    if($num>0){
        while($row=mysqli_fetch_assoc($res)){
            if(password_verify($password,$row['password'])){
                session_start();
                $login=true;
                $_SESSION['loggedin']=true;
                $_SESSION['userid']=$userid;
                header("location:HomePage.php");
            }
            else
            echo "Invalid password";
        }
    }
    else
    echo "Invalid username";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/SERANA/Blogify/login.php" method="post">
        <input type="text" name="userid"><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Login"><br>
        <a href="forgot.php">Forgot Password</a><br>
        <a href="HomePage.html">Home Page(Temporary)</a><br>
        <a href="Register.html">Register</a><br>
        <a href="AdminPanel.html">Admin</a>
    </form>
</body>

</html>