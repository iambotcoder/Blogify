<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    
    exit;
}
// $userid=$_SESSION['userid'];
// $userid = $_SESSION['userid'] ;
$userid=$_GET['userid'];
// echo $userid;
?>
<?php
include 'db_connect.php';
// $userid=$_GET['user_id'];
// $userid="subd_123";

// echo $user_id;
$name;
$email;
// $sqlini= "SELECT * FROM `user_opinion_on_blogs` WHERE UserId='$userid'";
$sqlini= "SELECT * FROM `userinfo` WHERE UserId='$userid'";
$res=mysqli_query($conn,$sqlini);
$num=mysqli_num_rows($res);
if($num>0){
    while($row=mysqli_fetch_assoc($res)){
        $name=$row['Name'];
        $email=$row['email'];
    }
    
    // echo $name;
    // echo $email;
}



$sqlini= "SELECT * FROM `user_opinion_on_blogs` WHERE UserId='$userid'";
$res=mysqli_query($conn,$sqlini);
$num=mysqli_num_rows($res);
$likes=0;
$dislikes=0;
if($num>0){
    while($row=mysqli_fetch_assoc($res)){
        $likes=$likes+(int)$row['Liked'];
        $dislikes=$dislikes+(int)$row['Disliked'];
    }
}
// echo $userid;
$sqlini1= "SELECT * FROM `bloglist` WHERE UserId='$userid'";
$res1=mysqli_query($conn,$sqlini1);
$posts=mysqli_num_rows($res1);
// echo $likes;
// echo $dislikes;
// echo $posts;
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
    <link rel="stylesheet" href="/Final/assets/css/main.css">
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
                        <div class="profile_left__col">
                            <div class="profile_img__container">
                                <img src="
                                    https://png.pngtree.com/png-clipart/20190516/original/pngtree-users-vector-icon-png-image_3725294.jpg"
                                    alt=" Anna Smith">

                            </div>
                            <h2><?php echo $name ?></h2>
                            <p>Blogger</p>
                            <p><?php echo $email ?></p>

                            <ul class="profile_about">
                                <li><span><?php echo $posts; ?></span>Posts</li>
                                <li><span><?php echo $likes; ?></span>liked</li>
                                <li><span><?php echo $dislikes; ?></span>disliked</li>
                            </ul>

                            <div class="profile_content">


                                <ul>
                                    <li><i class="fab fa-twitter"></i></li>
                                    <i class="fab fa-pinterest"></i>
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-dribbble"></i>
                                </ul>
                            </div>
                        </div>
                        <div class="profile_right__col">
                            <nav>
                                <ul>
                                    <li><a href="/Final/profile.php" class="profile_active">My Post</a></li>
                                    <li><a href="/Final/likedpost.php">Liked Posts</a></li>
                                    <li><a href="/Final/dislikepost.php">DisLiked Posts</a></li>
                                    <li><a href="/Final/bannedpost.php">Banned Posts</a></li>
                                </ul>
                            </nav>

                            <div class="profile_photos">

                                <?php
                include 'db_connect.php';
                
                $existsSql="SELECT * FROM `bloglist` WHERE `isAllowed`='1' and `UserId`='$userid'";
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
                        $user_id = $_SESSION['userid'];
                        //   echo $idType;
                        //  echo "<img src='$blog_img' >"; 
                        // echo $blog_id;
                        ?>

                                <!-- <h2 id='like-dislike'><h2> -->
                                <?php echo " 
                        <div class='story$blog_id'>
                            <div class='grid-div'>
                            <a href='#'><strong>$blog_heading </strong>
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

                            </div>
                        </div>
                    </div>
                </div>

                <a href="index.html">
                    <ion-icon name="close-outline" class="close-btn" style="top: 1%;"></ion-icon>
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