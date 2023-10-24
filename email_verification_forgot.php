<?php
session_start();
// $showMSG=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $otp=$_POST['otp'];
    $emailid=$_SESSION['email_id'];
    // $showMSG=$emailid;
    // echo $showMSG;
    $existsSql="SELECT * FROM `forgot_otp_verify` WHERE `email`='$emailid' AND `verification_code`='$otp'";
    $existsRes=mysqli_query($conn,$existsSql);
    $existsNumrows=mysqli_num_rows($existsRes);
    if($existsNumrows>0){
        header("location:resetPassword.php");
    }
    else{
        $showError="Invalid OTP";
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
                <div class="mainDiv">
                    <div class="cardStyle">
                        <form action="email_verification_forgot.php" method="post">
                            <h2 class="formTitle">
                                Verifying OTP
                            </h2>
                            <br>
                            <?php
                             if($showError){
                                echo '<div class="alert alert-danger" role="alert">
                                        '.$showError.'
                                    </div><br>';
                            }
                            // if($showMSG){
                            //     echo '<div class="alert alert-danger" role="alert">
                            //             '.$showMSG.'
                            //         </div><br>';
                            // }
                            ?>
                            <div class="inputDiv">

                                <input type="text" id="otp" name="otp" required
                                    placeholder="Enter the OTP">
                            </div>
                            <br>
                            <div class="buttonWrapper">
                                <input type="submit" value="Next" id="submitButton">
                            </div>
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


</body>

</html>