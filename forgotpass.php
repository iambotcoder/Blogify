<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// $login=false;
$showError=false;
if(isset($_POST['ok']))
{
    include 'db_connect.php';
    $email_id=$_POST['idValue'];
    $exist="SELECT * FROM `userinfo` WHERE `email`='$email_id'";
    $resexist=mysqli_query($conn,$exist);
    $numrow=mysqli_num_rows($resexist);
    if($numrow==0){
        $showError="Email-id doesn't exist";
    }
    else
    {
        $mail = new PHPMailer(true);
    try 
    {
 
                  
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'blogifyonly4us@gmail.com';                    
        $mail->Password   = 'blobvctxmjmxqufi';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    


        $mail->setFrom('blogifyonly4us@gmail.com', 'Php mail verification');

        $mail->addAddress($email_id);             


        $mail->isHTML(true);                               
        $verification_code=substr(number_format(time() * rand(),0,'',''),0,6);
        $mail->Subject = 'Email Verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">'. $verification_code . '</b></p>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        $existSql="SELECT * FROM `forgot_otp_verify` WHERE `email`='$email_id'";
        $existRes=mysqli_query($conn,$existSql);
        $existNumrow=mysqli_num_rows($existRes);
        if($existNumrow>0){
            $updatesql="UPDATE `forgot_otp_verify` SET `verification_code`='$verification_code' WHERE `email`='$email_id'";
            $updateRes=mysqli_query($conn,$updatesql);
            if(!$updateRes)
            $showError="Error occurred!!while modifying!!";
            else{
                session_start();
                $_SESSION['email_id']=$_POST['idValue'];
                header("location:email_verification_forgot.php");
                }

        }
        else{
            $sql="INSERT INTO `forgot_otp_verify` (`email`,`verification_code`) VALUES ('$email_id','$verification_code');";
            $res=mysqli_query($conn,$sql);
            if(!$res)
            $showError="Error occurred!!!while entering data into the database!!";
            else{
            session_start();
            $_SESSION['email_id']=$_POST['idValue'];
            header("location:email_verification_forgot.php");
            }
        }
        
       
    }
    catch (Exception $e) 
    {
        $showError= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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


    .forgot-head {
        text-align: center;
    }

    .dob-details {

        margin-left: 12%;
    }

    .nxtBtn {
        position: center;
    }

    .nxtBtn button {
        margin-left: 78%;

        /* background-color: teal; */
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

            <article id="forgot" class="active" style="padding-left:30px">
                <div class="wrapperMain">
                    <div class="forgot-head">
                        <h2>Account recovery</h2>
                    </div>
                    <?php
                        if($showError){
                        echo '<div class="alert alert-danger" role="alert">
                            '.$showError.'
                                </div>';
                        }
                    ?>
  
                    <div class="main">
                        <form action="forgotpass.php" method="post">
                            <!-- <select class="form-control form-control-sm" name="select-id" required>
                                <option value="UserId">User-id</option>
                                <option value="email">Email-id</option>
                            </select> -->
                            <br>
                            <div class="user">
                                <input class="form-control" type="text" placeholder="Enter Email-id"
                                    name="idValue" required />
                            </div><br>
                            <!-- <div class="quest">
                                <label></label>
                            </div> -->
                            <!-- <div class="quesdropdown">
                                <select name="ques" required>
                                    <option>Choose the Security Question</option>
                                    <option value="what was you first bike">what was you first bike ?</option>
                                    <option value="what was your first mobile">what was your first mobile ?</option>
                                    <option value="what was you first car">what was you first car ?</option>
                                </select>
                            </div> -->
                            <!-- <label>answer</label> -->
                            <!-- <input type="text" placeholder="user" name="user" /> -->
                            <!-- <div class="security_answer">
                                <input class="form-control" type="text" name="answer"
                                    placeholder="Answer of Security Question" required />
                            </div> -->

                            <!-- <button type="button">ok</button> -->
                            <div class="nxtBtn">
                                <input type="submit" value="Next" name=" ok">
                            </div>

                            <!-- <label>answer</label> -->
                        </form>
                    </div>
                </div>
            </article>

        </div>
    </div>


    <div id="bg"></div>
    <!-- Footer -->
    <footer id="footer" style="display: none;">
        <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </footer>
    <!-- BG -->
    <div id="bg"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>