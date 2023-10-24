<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$showError=false;
$passwordValidationerror=false;
$validationmsg=false;
$emailValidationerror=false;
$useridValidationerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $name=$_POST["uname"];
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $uid=$_POST["uid"];
    // $question=$_POST["ques"];
    // $answer=$_POST["answer"];
    if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)){
        $passwordValidationerror=true;
        $validationmsg1="Invalid Password entered!!!";
    }
    else if(!preg_match('/^[a-zA-Z][a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}+$/',$email)){
        $emailValidationerror=true;
        $validationmsg2="Invalid Email entered!!!";
    }
    else if(!preg_match('/^[a-zA-Z][a-zA-Z\d\._@]+[a-zA-Z\d]+$/',$uid)){
        $useridValidationerror=true;
        $validationmsg3="Invalid Userid entered!!!";
    }
    else{
    $existSqluid="SELECT * FROM `userinfo` WHERE `UserId`='$uid'";
    $existResuid=mysqli_query($conn,$existSqluid);
    $existNumrowsuid=mysqli_num_rows($existResuid);
    $existSqlemail="SELECT * FROM `userinfo` WHERE `email`='$email'";
    $existResemail=mysqli_query($conn,$existSqlemail);
    $existNumrowsemail=mysqli_num_rows($existResemail);
    if($existNumrowsuid>0 && $existNumrowsemail>0){
        $showError="Userid/Email already exists";
    }
    else if($existNumrowsuid>0){
        $showError="Userid already exists!!";
    }
    else if($existNumrowsemail>0){
        $showError="Email already exists!!";
    }
    else{
        if($password==$cpassword){
            //
            $mail = new PHPMailer(true);

        try {
 
                  
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'blogifyonly4us@gmail.com';                    
            $mail->Password   = 'blobvctxmjmxqufi';                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

  
            $mail->setFrom('blogifyonly4us@gmail.com', 'Php mail verification');

            $mail->addAddress($email);             


            $mail->isHTML(true);                               
            $verification_code=substr(number_format(time() * rand(),0,'',''),0,6);
            $mail->Subject = 'Email Verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">'. $verification_code . '</b></p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            $hash=password_hash($password,PASSWORD_BCRYPT);
            $sql="INSERT INTO `userinfo` (`Name`, `Gender`, `DOB`,`email`, `UserId` ,`password`,`verification_code`) VALUES ('$name', '$gender', '$dob','$email', '$uid', '$hash','$verification_code');";
            $res=mysqli_query($conn,$sql);
            if(!$res)
            $showError="Error occurred!!!while entering data into the database!!";
            // header("location:login.php");
            session_start();
            $_SESSION['email']=$_POST['email'];
            header("location:email_verification.php");
    }       catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
            
        }
        else{
            $showError="Password didn't matched!!";
        }
    }

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




    input[type="submit"] {
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: transparent;

        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
    }

    input[type="submit"]:hover {
        border-color: #2691d9;
        /* background-color: gray; */
        transition: 0.5s;

    }


    .login-head {
        text-align: center;
    }

    .dob-details {

        margin-left: 12%;
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
                <form action="register.php" method="post">
                    <div class="login-head">
                        <h1>Registration</h1>
                    </div>
                    <div class="error">
                    <?php
                    if($showError){
                            echo '<div class="alert alert-danger" role="alert">
                                    '.$showError.'
                                </div><br>';
                    }
                    if($passwordValidationerror){
                        echo '<div class="alert alert-danger" role="alert">
                                    '.$validationmsg1.'
                                </div><br>';
                    }
                    if($emailValidationerror){
                        echo '<div class="alert alert-danger" role="alert">
                                    '.$validationmsg2.'
                                </div><br>';
                    }
                    if($useridValidationerror){
                        echo '<div class="alert alert-danger" role="alert">
                                    '.$validationmsg3.'
                                </div><br>';
                    }
                    ?>
                    </div>
                    <div class="user-detials">
                        <div class="input-box">
                            <input type="text" name="uname" placeholder="Enter Name" required><br>
                        </div>
                    </div>
                    <div class="user-detials">
                        <div class="input-box">
                            <!-- <span class="detials">E-Mail</span> -->
                            <input type="text" name="email" placeholder="Enter Mail" required><br>
                        </div>
                    </div>

                    <div class="user-detials">
                        <div class="input-box">
                            <!-- <span class="detials"> Password</span> -->
                            <input type="password" name="password" placeholder="Enter new password" required><br>
                        </div>
                    </div>

                    <div class="user-detials">
                        <div class="input-box">
                            <!-- <span class="detials">Confirm Password</span> -->
                            <input type="password" name="cpassword" placeholder="Type Password again" required><br>
                        </div>
                    </div>
                    <div class="user-detials">
                        <div class="input-box">
                            <span class="detials">Userid</span>
                            <input type="text" name="uid" placeholder="Enter User id" required><br>
                        </div>
                    </div>
                    <div class="user-detials" style="border:solid 1px white;">
                        <div class="input-box">
                            <span class="detials dob-detail" style="margin-left:3%;">Date of Birth:</span>
                            <input type="date" name="dob" style="margin-left: 2rem;background: none;border:none"><br>
                        </div>
                    </div>
                    <br>
                    <div class="user-detials">
                        <div class="input-box">
                            <span class="detials">Gender</span>

                            <select name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">other</option>
                            </select>

                            <!-- <div>
                                <br>
                                <span class="detials">Security Question</span>
                                <select name="ques">
                                    <option value="what was you first bike">what was you first bike?</option>
                                    <option value="what was your first mobile">what was your first mobile?</option>
                                    <option value="what was you first car">what was you first car?</option>
                                </select>
                                <br>

                                <input type="text" name="answer" placeholder="Answer" required><br>
                            </div> -->
                        </div>
                    </div>
                    <br>
                    <input type="submit" value="submit"><br>

                </form>
        </div>
    </div>
    </article>
    <div id="bg"></div>
    <!-- Footer -->
    <footer id="footer" style="display: none;">
        <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </footer>
    <!-- BG -->
    <div id="bg"></div>


</body>

</html>