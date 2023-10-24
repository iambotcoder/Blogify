<?php

    include 'C:\xampp\htdocs\Final\db_connect.php';
    // $temp= $_SESSION['blogheading'];
    $temp=$_GET['data'];
    // echo $temp;
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


                        </div>


                    </div>
                </div>

                <a href="viewallstoriesAdmin.php">
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