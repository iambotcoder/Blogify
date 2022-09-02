<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
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
Welcome -<?php echo $_SESSION['userid'] ?>
    <header>HEADER</header>
    <nav>NAVBAR</nav>
    <section>
        <a href="addContent.html"> Add Content + </a>
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div>4</div>
    </section>
    <footer>FOOTER</footer>
</body>

</html>