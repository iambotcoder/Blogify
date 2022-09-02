<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];
    $userid=$_POST["unique-id"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $answer=$_POST["answer"];
    $email=$_POST["email"];
    if($password==$cpassword){
        //
        $hash=password_hash($password,PASSWORD_BCRYPT);
        $sql="INSERT INTO `userinfo` (`Name`, `Gender`, `DOB`,`email`, `UserId` ,`password`,`answer`) VALUES ('$name', '$gender', '$dob','$email', '$userid', '$hash','$answer');";
        $res=mysqli_query($conn,$sql);
        if($res)
        echo "Data inserted successfully into the database";
        else
        echo "Error occurred!!!while entering data into the database";
    }
    else
    echo "Password didn't matched!!!";

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/SERANA/Blogify/Register.php" method="post">
        <input type="text" name="name" placeholder="Enter Name"><br>
        <select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">other</option>
        </select>
        <input type="date" name="dob"><br>
        <input type="text" name="unique-id" placeholder="Enter Unique Id"><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <input type="password" name="cpassword" placeholder="Enter password again"><br>
        <input type="email" name="email" placeholder="Enter Email id "><br>
        <p> Security Question</p>
        <select>
            <option>select</option>
            <option>What was the make and model of your first bike?</option>
            <option>In what city or town did your parents meet?</option>
        </select><br>
        <input type="text" name="answer" placeholder="Enter Answer"><br>
        <input type="submit" value="Login"><br>
        <a href="forgot.php">Forgot Password</a><br>
        <a href="login.php">Login</a>
    </form>
</body>

</html>