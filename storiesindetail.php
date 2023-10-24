<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    
    exit;
}
// $userid=$_SESSION['userid'];
$userid = $_SESSION['userid'] ;
// echo $userid;
?>


<?php

    include 'db_connect.php';
    // $temp= $_SESSION['blogheading'];
    $temp=$_GET['data'];
    echo $temp;
    $existsSql="SELECT * FROM `bloglist` WHERE Blog_id='$temp'";
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    if($num>0){
        ?>
<!-- <h2>Details of the post</h2> -->
<?php
        while($row=mysqli_fetch_assoc($res)){
              $blog_writer = $row['UserId']; 
              $blog_heading = $row['heading']; 
              $blog_content =  $row['content'];
              $blog_img = $row['image-source']; 
              $blog_date = $row['date'];
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

    p {
        text-align: justify;
    }

    .storyindetail-heading {
        font-size: 23px;

    }

    .details-grid-container-element {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
        /* border: 1px solid black; */
        width: 100%;
    }

    .details-grid-child-element {
        margin: 10px;
        /* border: 1px solid red; */
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
</head>

<body class="vsc-initialized is-article-visible">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->

        <div id="main" style="">


            <!-- Intro -->
            <!-- <ion-icon name="caret-up-circle-outline" style="height:50px;width:auto"></ion-icon> -->

            <!-- Profile -->

            <article id="profile" class="active" style="">

                <div class="profile_header__wrapper">
                    <header></header>
                    <div class="profile_cols__container">

                        <div class="story">
                            <div class="storyindetail-heading">
                                <strong><?php echo $blog_heading;?></strong>
                            </div>
                            <div class="storyindetail-image">
                                <span class="image main"><img src="<?php echo $blog_img;?>">
                                </span>
                            </div>
                            <div class="storyindetail-content">
                                <p><?php echo $blog_content; ?></p>
                            </div>
                            <div class="author">
                                <div class="details-grid-container-element">
                                    <div class="details-grid-child-element">
                                        <h3><?php echo  $blog_writer;?></h3>
                                    </div>

                                    <div class="details-grid-child-element" style="text-align:right">
                                        <h4><?php echo $blog_date; ?><h4>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

                <a href="stories.php">
                    <ion-icon name="close-outline" class="close-btn"></ion-icon>
                </a>
            </article>



        </div>

        <!-- Footer -->
        <footer id="footer" style="display: none;">
            <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>

    </div>

    <!-- BG -->
    <div id="bg"></div>



</body>

</html>