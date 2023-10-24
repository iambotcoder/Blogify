<?php
$login=false;
$showError=false;
$showAlet=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $userid=$_POST["userid"];
    $password=$_POST["password"];
    if(!strcmp($userid,"admin") && !strcmp($password,"admin"))
    {
        header("location:adminpanel/admin.php");
    }
    $existsSql="SELECT * FROM `userinfo` WHERE Userid='$userid'";
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    if($num>0){
        while($row=mysqli_fetch_assoc($res)){
            if(password_verify($password,$row['password'])){
                $isAllowed = $row['isAllowed'];
                if($isAllowed == '0')
                {
                    $showError = "An administrator has blocked you from running this app";
                }
                else{
                    session_start();
                    $login=true;
                    $_SESSION['loggedin']=true;
                    $_SESSION['userid']=$userid;
                    header("location:index.html");
                }
                
                
                
            }
            else{
                $showError=true;
                $showError="Invalid Password";
            }
            
        }
    }
    else{
        $showError=true;
        $showError= "Invalid UserId";
    }
   
}

?>


<html class="hydrated">

<head>
    <title>Dimension by HTML5 UP</title>
    <meta charset="utf-8">

    <style data-styles="">
    ion-icon {
        visibility: hidden
    }

    .hydrated {
        visibility: inherit
    }
    </style>
    <link rel="stylesheet" href="profilepage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- ICON -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap");

    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg, #232324, #0f0e0f);
        height: 100vh;
        overflow: hidden;
    } */

    .login-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: rgb(44, 43, 43);
        border-radius: 10px;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid cyan;
    }

    .login-center h1 {
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid rgb(177, 169, 169);
        color: #e9f4fb;
    }

    .login-center form {
        padding: 0 40px;
        box-sizing: border-box;
    }

    .login-txt_field input:focus {
        background-color: none;
        border: transparent;
        outline: none;
    }

    form .login-txt_field {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
    }

    .login-txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
    }

    .login-txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: 0.5s;
    }

    .login-txt_field span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: 0.5s;
    }

    .login-txt_field input:focus~label,
    .login-txt_field input:valid~label {
        top: -5px;
        color: #2691d9;
    }

    .login-txt_field input:focus~span::before,
    .login-txt_field input:valid~span::before {
        width: 100%;
    }

    .login-pass {
        margin: -5px 0 20px 5px;
        color: #a6a6a6;
        cursor: pointer;
    }

    .login-pass:hover {
        text-decoration: underline;
    }

    input[type="submit"] {
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: #2691d9;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
    }

    input[type="submit"]:hover {
        border-color: #2691d9;
        transition: 0.5s;
    }

    .login-signup_link {
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
    }

    .login-signup_link a {
        color: #2691d9;
        text-decoration: none;
    }

    .login-signup_link a:hover {
        text-decoration: underline;
    }

    .login-head {
        text-align: center;
    }
    </style>
</head>

<body class="vsc-initialized is-article-visible">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->

        <div id="main" style="width: 30rem;">


            <!-- Intro -->
            <!-- <ion-icon name="caret-up-circle-outline" style="height:50px;width:auto"></ion-icon> -->
            <!-- Profile -->
            <article id="login" class="active" style="padding-left:30px">
                <div class="login-head">
                    <h1>Login</h1>
                </div>
                <?php
    if($showError){
        echo '<div class="alert alert-danger" role="alert">
        '.$showError.'
      </div>';
    }
    ?>
                <form method="post">
                    <div class="login-txt_field">
                        <input type="text" name="userid" style="border:none" required />
                        <span></span>
                        <label>UserId</label>
                    </div>
                    <div class="login-txt_field">
                        <input type="password" name="password" style="border:none" required />
                        <span></span>
                        <label>Password</label>
                    </div>
                    <div class="login-pass"><a href="forgotpass.php">Forgot Password?</a></div>
                    <input type="submit" value="Login" />
                    <div class="login-signup_link">Not a member? <a href="register.php">Signup</a></div>
                </form>
                <!-- <div class="login-center">
                    
                </div> -->


            </article>
        </div>
        <div id="bg"></div>
        <!-- Footer -->
        <footer id="footer" style="display: none;">
            <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>
    </div>
    <!-- BG -->
    <div id="bg"></div>
</body>

</html>