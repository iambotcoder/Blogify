<html class="hydrated">

<head>
    <title>Dimension by HTML5 UP</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <style data-styles="">
    ion-icon {
        visibility: hidden
    }

    .hydrated {
        visibility: inherit
    }
    </style>
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

        <!-- Header -->


        <!-- Main -->

        <div id="main">

            <!-- Intro -->
            <!-- <ion-icon name="caret-up-circle-outline" style="height:50px;width:auto"></ion-icon> -->

            <article id="profile" class="active">

                <div class="profile_photos" style="margin-left: 3%;">

                    <?php
                include 'db_connect.php';
                
                $existsSql="SELECT * FROM `bloglist` WHERE `isAllowed`='1'";
                $res=mysqli_query($conn,$existsSql);
                $num=mysqli_num_rows($res);
                if($num>0){
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                    <!-- <div class="form"></div> -->
                    <!-- Displaying Data Read From Database -->
                    <?php 
                        
                        $blog_writer = $row['UserId']; 
                        $blog_heading = $row['heading']; 
                        $blog_content =  $row['content'];
                        $blog_img = $row['image-source']; 
                        
                        $blog_id = $row['Blog_id'];
                        $like = $row['likes'];
                        $dislike = $row['dislikes'];
                        $like_dislikeDisplay = ($like-$dislike);
                        $rank = ($row['Time']%100000000)-($like-$dislike); 
                        //   echo $rank;
                        // $user_id = $_SESSION['userid'];
                        //   echo $idType;
                        //  echo "<img src='$blog_img' >"; 
                        // echo $blog_id;
                        ?>

                    <!-- <h2 id='like-dislike'><h2> -->
                    <?php echo " 
                        <div class='story$blog_id'>
                            <div class='grid-div'>
                            <a href='/Final/adminpanel/viewallstoriesindetailAdmin.php?data=$blog_id'><strong>$blog_heading </strong>
                                        <span class='image main'><img src=' $blog_img '></span></a>
                                
                            </div>
                        </div>"
                    ?>
                    <?php 
                                }
                            }
                     ?>




                    <!-- <div>
                                    <p>HEAD</p>
                                    <img src="img/img_1.avif" alt="Photo">
                                </div>
                                <div>
                                    <p>HEAD</p>
                                    <img src="img/img_2.avif" alt="Photo">
                                </div>
                                <div>
                                    <p>HEAD</p>
                                    <img src="img/img_3.avif" alt="Photo">
                                </div>
                                <div>
                                    <p>HEAD</p>
                                    <img src="img/img_4.avif" alt="Photo">
                                </div>
                                <div>
                                    <p>HEAD</p>
                                    <img src="img/img_5.avif" alt="Photo">
                                </div> -->
                    <a href="admin.php">
                        <ion-icon name="close-outline" class="close-btn" style="top: 1%;"></ion-icon>
                    </a>
            </article>
        </div>

    </div>



    <!-- BG -->
    <div id="bg"></div>


</body>

</html>