<?php
include 'C:\xampp\htdocs\Final\db_connect.php';
$blogid=$_GET['blogid'];
// $updateSql="UPDATE `bloglist` SET `isAllowed`=0 WHERE `Blog_id`='$temp'" ;
// $deleteSql="DELETE FROM `bloglist` WHERE `Blog_id`='$temp'";
// $updateRes=mysqli_query($conn,$updateSql);
// if($updateRes){
//     header("location:admin.php");
// }
// else{
//     echo "Delete operation can't be performed";
// }


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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- ICON -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
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
            <?php
include 'db_connect.php';

$existsSql="SELECT * FROM `bloglist` WHERE `isAllowed`='1' and `Blog_id`='$blogid'";
$res=mysqli_query($conn,$existsSql);
$num=mysqli_num_rows($res);
if($num>0){
    while($row=mysqli_fetch_assoc($res)){
        ?>
            <!-- <div class="form"></div> -->
            <!-- Displaying Data Read From Database -->
            <?php 
        
        // $blog_writer = $row['UserId']; 
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
            <?php 
            // echo $blog_heading;
            // echo $blog_content;
            // echo $blog_img;
            echo " 
        
                    <!--addPost -->
                    <article id='addPost' class='active' style='padding-left:30px'>
                        <a href='index.html'>
                            <ion-icon name='close-outline' class='close-btn' style='top:5%'></ion-icon>
                        </a>
                        <h2 class='major'>Modify Post</h2>
                        <form method='post' action='modify.php?blogid=$blogid'>
                            <div class='fields'>
                                <div class='field half'>
                                    <label for='heading'>Title
                                    </label>
                                    <input type='text' name='heading' id='heading'>
                                </div>
                                <div class='field half'>
                                    <label for='email'>Image</label>
                                    <input type='text' name='image-src' id='image'>
                                </div>
                                <div class='field'>
                                    <label for='message'>Content</label>
                                    <textarea name='content' id='message' rows='4'></textarea>
                                </div>
                            </div>
                            <ul class='actions'>
                                <li><input type='submit' value='modify' class='primary'></li>
                                <li><input type='reset' value='Reset' id='resetBtn'></li>
                            </ul>
                        </form>
                    </article>

                    <script>
                        document.querySelector('#Heading').value = `$blog_heading`;
                        document.querySelector('#message').value = `$blog_content`;
                        document.querySelector('#image').value = `$blog_img`;
                    </script>
        
                    
        "
    ?>
            <?php 
                }
            }
    ?>
            <!-- Footer -->
            <footer id="footer" style="display:none">
                <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
            </footer>

        </div>

        <!-- BG -->
        <div id="bg"></div>
        <!-- Scripts -->
        <script>
        document.querySelector("#resetBtn").addEventListener("click", () =>
            location.reload()
        );
        </script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!-- <script src="assets/js/main.js"></script> -->



</body>

</html>