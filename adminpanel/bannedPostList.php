<html class="hydrated">

<head>
    <title>Dimension by HTML5 UP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <style data-styles="">
    ion-icon {
        visibility: hidden
    }

    .hydrated {
        visibility: inherit
    }

    .userName {
        vertical-align: middle;
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

        <div id="main">


            <!-- Intro -->
            <!-- <ion-icon name="caret-up-circle-outline" style="height:50px;width:auto"></ion-icon> -->
            <!-- Profile -->

            <article id="admin" class="active" style="width:80rem">
                <div class="container" style="height: fit-content;">
                    <div class="content">
                        <div class="cards">
                            <div class="card">
                                <div class="box" style="border: none;">
                                    <?php
                                    include 'C:\xampp\htdocs\Final\db_connect.php';
                                    $userSql="SELECT * FROM `userinfo`";
                                    $userRes=mysqli_query($conn,$userSql);
                                    $usercount=mysqli_num_rows($userRes);
                                ?>
                                    <h1><?php echo $usercount;  ?></h1>
                                    <h3>Users</h3>
                                </div>
                                <div class="icon-case">
                                    <img src="students.png" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="box" style="border: none;">
                                    <?php
                                    include 'C:\xampp\htdocs\Final\db_connect.php';
                                    $postSql="SELECT * FROM `bloglist` wHERE `isAllowed`='1'";
                                    $postRes=mysqli_query($conn,$postSql);
                                    $postcount=mysqli_num_rows($postRes);
                                ?>
                                    <h1><?php echo $postcount; ?></h1>
                                    <h3>POSTS</h3>
                                </div>
                                <div class="icon-case">
                                    <img src="teachers.png" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="box" style="border: none;">
                                    <?php
                                    $likecount=0;
                                    include 'C:\xampp\htdocs\Final\db_connect.php';
                                    $likeSql="SELECT * FROM `bloglist` WHERE `likes`>0";
                                    $likeRes=mysqli_query($conn,$likeSql);
                                    $likenumrows=mysqli_num_rows($likeRes);
                                    if($likenumrows>0){
                                        while($rows=mysqli_fetch_assoc($likeRes)){
                                            $likecount+=$rows['likes'];
                                        }
                                    }
                                ?>
                                    <h1><?php echo $likecount; ?></h1>
                                    <h3>Liked</h3>
                                </div>
                                <div class="icon-case">
                                    <img src="schools.png" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="box" style="border: none;">
                                    <?php
                                    $dislikecount=0;
                                    include 'C:\xampp\htdocs\Final\db_connect.php';
                                    $dislikeSql="SELECT * FROM `bloglist` WHERE `dislikes`>0";
                                    $dislikeRes=mysqli_query($conn,$dislikeSql);
                                    $dislikenumrows=mysqli_num_rows($dislikeRes);
                                    if($dislikenumrows>0){
                                        while($rows=mysqli_fetch_assoc($dislikeRes)){
                                            $dislikecount+=$rows['dislikes'];
                                        }
                                    }
                                ?>
                                    <h1><?php echo $dislikecount; ?></h1>
                                    <h3>Disliked</h3>
                                </div>
                                <div class="icon-case">
                                    <img src="income.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="content-2">
                            <div class="recent-payments">
                                <div class="title">
                                    <h2>Posts</h2>
                                    <!-- <a href="/Final/adminpanel/viewallstoriesAdmin.php" class="btn">View All</a> -->
                                    <a href="/Final/adminpanel/admin.php" class="">Normal Posts</a>
                                </div>
                                <table style="margin: 0;">
                                    <tbody>
                                        <tr>
                                            <th>Blog ID</th>
                                            <th>Blog Heading</th>
                                            <th>Author</th>
                                            <th></th>
                                            <th>Option</th>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="" style="overflow: auto;height: 450px;">
                                    <table>
                                        <tbody>

                                            <?php
                                            include 'C:\xampp\htdocs\Final\db_connect.php';
                                            $postsSql="SELECT * FROM `bloglist` where `isAllowed`='0'";
                                            $postsRes=mysqli_query($conn,$postsSql);
                                            $postsnumrows=mysqli_num_rows($postsRes);
                                            if($postsnumrows>0){
                                                

                                        ?>
                                            <?php while($rowpost=mysqli_fetch_assoc($postsRes)){ 
                                            $blogid=$rowpost['Blog_id'];?>
                                            <tr>
                                                <td><?php echo $rowpost['Blog_id']; ?></td>
                                                <td><?php echo $rowpost['heading']; ?></td>
                                                <td><?php echo $rowpost['UserId']; ?></td>
                                                <td><a href="/Final/adminpanel/viewallstoriesindetailAdmin.php?data=<?php echo $blogid ?>"
                                                        class="btn">View</a></td>
                                                <td><a href="/Final/adminpanel/restorestoryAdmin.php?data=<?php echo $blogid ?>"
                                                        class="btn">Restore</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="new-students">
                                <div class="title">
                                    <h2>Users</h2>
                                    <a href="#" class="">View All</a>
                                </div>
                                <table style="margin: 0;">
                                    <tbody>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>option</th>

                                        </tr>
                                </table>
                                <div class="list" style="overflow: auto;height: 450px;">
                                    <table class="userInfo">
                                        <?php
                                            include 'C:\xampp\htdocs\Final\db_connect.php';
                                            $usersSql="SELECT * FROM `userinfo`";
                                            $usersRes=mysqli_query($conn,$usersSql);
                                            $usersnumrows=mysqli_num_rows($usersRes);
                                            if($usersnumrows>0){

                                        ?>
                                        <?php while($rowsuser=mysqli_fetch_assoc($usersRes)){?>
                                        <tr>
                                            <td><img src="user.png" alt=""></td>
                                            <td class="userName">
                                                <a
                                                    href="/Final/adminpanel/showprofilepage.php?userid=<?php echo $rowsuser['UserId'] ?>">
                                                    <?php echo $rowsuser['UserId']?>

                                                </a>
                                            </td>
                                            <td style="vertical-align:middle">
                                                <a href="/Final/adminpanel/deleteuserAdmin.php?data=<?php echo $rowsuser['UserId'] ?>"
                                                    class="btn">block
                                                </a>
                                                <!-- </ion-icon> -->
                                            </td>
                                            <!-- <td><img src="info.png" alt=""></td> -->
                                        </tr>
                                        <?php
                                        }
                                    }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

    </div>
    <div id=" bg">
    </div>
    <!-- Footer -->
    <footer id="footer" style="display: none;">
        <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </footer>
    <!-- BG -->
    <div id="bg"></div>


</body>

</html>