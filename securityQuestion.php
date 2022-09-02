<!-- <?php
// session_start();
// $idValue = $_SESSION['idValue'];
// $idType = $_SESSION['idType'];
// echo $idValue;
// echo $idType;
?> -->

<?php
session_start();
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $answer=$_POST["answer"];
    $idValue = $_SESSION["idValue"];
    $idType = $_SESSION['idType'];
    // echo $idType;
    // echo $idValue;
    $existsSql="SELECT * FROM `userinfo` WHERE answer='$answer' and `$idType` = '$idValue'";
    // and `$idType`='$idValue'
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    if($num>0){
        while($rows=mysqli_fetch_assoc($res))
        { 
            // echo" Correct Answer";
            header("location:resetPassword.php");
       }
         //    echo $row;
        // echo $rows['Name'];echo "<br>";
        // echo $rows['Gender'];echo "<br>";
        // echo $rows['DOB'];echo "<br>";
        // echo $rows['UserId'];echo "<br>";
        // echo $rows['password'];echo "<br>";
    }
    else
    echo "Invalid Security Answer";
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
    <form action="securityQuestion.php" method="post">
        <input type="text" name="answer" placeholder="Enter Security Key"><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>