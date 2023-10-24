<?php
    include 'db_connect.php';
    
    $existsSql="SELECT * FROM `bloglist` ORDER BY `rank` DESC";
    $res=mysqli_query($conn,$existsSql);
    $num=mysqli_num_rows($res);
    if($num>0){
        while($row=mysqli_fetch_assoc($res))
        {
              $blog_writer = $row['UserId']; 
              $blog_heading = $row['heading']; 
              $blog_content =  $row['content'];
              $blog_img = $row['image-source']; 
              
              $blog_id = $row['Blog_id'];
              $like = $row['likes'];
              $dislike = $row['dislikes'];
              $rank = ($row['Time']%100000000)-($like-$dislike); 
              echo $rank;
            //   $user_id = $_SESSION['userid'];
            //   echo $idType;
            //  echo "<img src='$blog_img' >"; 
        }
    }
?>