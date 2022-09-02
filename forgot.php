
<?php
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'db_connect.php';
    $idVal=$_POST["idValue"];
    $idType=$_POST["select-id"];
    $existsSql="SELECT * FROM `userinfo` WHERE `$idType`='$idVal'";
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    // echo $idType;
    // echo $idVal;
    if($num>0){
        while($rows=mysqli_fetch_assoc($res))
        { 
            // echo $rows['Name'];echo "<br>";
            // echo $rows['Gender'];echo "<br>";
            // echo $rows['DOB'];echo "<br>";
            // echo $rows['UserId'];echo "<br>";
            // echo $rows['password'];echo "<br>";
            session_start();
            $_SESSION['idValue']=$idVal;
            $_SESSION['idType']=$idType;
            header("location:securityQuestion.php");
      
       }
         //    echo $row;
        // echo $rows['Name'];echo "<br>";
        // echo $rows['Gender'];echo "<br>";
        // echo $rows['DOB'];echo "<br>";
        // echo $rows['UserId'];echo "<br>";
        // echo $rows['password'];echo "<br>";

        
    }
    else
    echo "Invalid User_id";
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
    <form action="forgot.php" method="post">
        <select name="select-id">
            <option value="UserId">user id</option>
            <option value="email">email id</option>
        </select>

        <input type="text" name="idValue" placeholder="Enter User Id"><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>
