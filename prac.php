<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <input type='text' value=$blog_heading class="blogHeading"><br>
    <input type='text' value=$blog_content class="blogContent"><br>
    <input type='text' value=$blog_img class="blogImg"><br>
    <?php
include 'db_connect.php';
$blogid=$_GET['blogid'];
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
        
        
            echo $blog_heading;
            echo $blog_content;
            echo $blog_img;
            // echo "";
            echo"
                    <script>
                        document.querySelector('.blogHeading').value = `$blog_heading`;
                        document.querySelector('.blogContent').value = `$blog_content`;
                        document.querySelector('.blogImg').value = `$blog_img`;
                    </script>
                ";
    //         echo " 
        
    //                 <!--addPost -->
    //                 <article id='addPost' class='active' style='padding-left:30px'>
    //                     <a href='index.html'>
    //                         <ion-icon name='close-outline' class='close-btn' style='top:5%'></ion-icon>
    //                     </a>
    //                     <h2 class='major'>Post</h2>
    //                     <form method='post' action='#'>
    //                         <div class='fields'>
    //                             <div class='field half'>
    //                                 <label for='heading'>Title
    //                                 </label>
    //                                 <input type='text' name='heading' id='heading'>
    //                             </div>
    //                             <div class='field half'>
    //                                 <label for='email'>Image</label>
    //                                 <input type='text' name='image-src' id='image'>
    //                             </div>
    //                             <div class='field'>
    //                                 <label for='message'>Content</label>
    //                                 <textarea name='content' id='message' rows='4'></textarea>
    //                             </div>
    //                         </div>
    //                         <ul class='actions'>
    //                             <li><input type='submit' value='Post' class='primary'></li>
    //                             <li><input type='reset' value='Reset' id='resetBtn'></li>
    //                         </ul>
    //                     </form>
    //                 </article>

    //                 <script>
    //                     console.log($blog_heading);
    //                 </script>";
                }
            }
    ?>
</body>

</html>