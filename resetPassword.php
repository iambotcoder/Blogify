<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $password=$_POST["password"];   
    $cpassword=$_POST["cpassword"];
    session_start();
    $idVal = $_SESSION['idValue'];
    $idType = $_SESSION['idType'];
    if($password==$cpassword){
        //
        $hash=password_hash($password,PASSWORD_BCRYPT);
        // UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;
        $sql="UPDATE userinfo SET password = '$hash' where `$idType`='$idVal'";
        // "update otptable set OTP='$otp' where Email='$email'"
        
        $res=mysqli_query($conn,$sql);
        if($res)
        echo "Password updated successfully into the database";
        else
        echo "Error occurred!!!while updating data into the database";
    }
    else
    echo "Password didn't matched!!!";

}

?>
<form action="/SERANA/Blogify/resetPassword.php" method="post">
    <input type="password" name="password" placeholder="Enter password"><br>
    <input type="password" name="cpassword" placeholder="Enter password again"><br>
    <input type="submit" value="reset"><br>
    <a href="login.php">Login</a>
</form>