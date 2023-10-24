<?php
//include db configuration file

include_once("config.php");
 
if(isset($_POST["content_txt"])) 
{	
	$contentToSave = filter_var($_POST["content_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	// echo $contentToSave;
	
	$requestContent = explode("__",$contentToSave); // arr[0] is empty start with arr[1]
	// print_r($requestContent);
	if($requestContent[1] == 'like')
	{
		$existsSql=" SELECT * FROM `user_opinion_on_blogs` WHERE `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';";
		$res=mysqli_query($connecDB,$existsSql);
		$num=mysqli_num_rows($res);
		if($num>0){
				while($row=mysqli_fetch_assoc($res)){
					// echo $row['Liked'];
					// echo $row['Disliked'];
					// $blog_status = $row['Liked'];
					if($row['Liked'] == '1')
					{
						// Already Liked
						if(mysqli_query($connecDB,"UPDATE bloglist SET `likes` =`likes`-1 WHERE `Blog_id`=$requestContent[3];"))
						{
							// DELETE FROM table_name WHERE some_column = some_value
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `Liked` = 0 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';"))
							{

							}
							else{
								echo('Unable to connect to database FOr user_opinion_on_blogs');
							}
						}
						else
						{
							echo('Unable to connect to database');
						}

					}
					else if($row['Disliked'] == '1')
					{
						//  Already Disliked
						if(mysqli_query($connecDB,"UPDATE bloglist SET `likes` =`likes`+1,`dislikes` =`dislikes`-1 WHERE `Blog_id`=$requestContent[3];"))
						{
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `Liked` = 1,`Disliked` = 0 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';")) 
							{
				
							}
							else{
								echo('Unable to connect to database');
							}
						}
						else
						{
							echo('Unable to connect to database');
						}
					}
					else
					{
						// Nither Nor
						if(mysqli_query($connecDB,"UPDATE bloglist SET `likes` =`likes`+1 WHERE `Blog_id`=$requestContent[3];"))
						{
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `Liked` = 1 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';"))
							{
				
							}
							else{
								echo('Unable to connect to database');
							}

						}
						else{
							echo('Unable to connect to database');
						}
					}
			// 		else
			// 		{
			// 		//  echo $blog_status;								
			// // echo $val;
			// 	}
			}
		}
		else{
			if(mysqli_query($connecDB,"UPDATE bloglist SET `likes` =`likes`+1 WHERE `Blog_id`=$requestContent[3];"))
			{
				if(mysqli_query($connecDB,"INSERT INTO user_opinion_on_blogs(UserId,BlogId,Liked) VALUES('$requestContent[4]','$requestContent[3]','1')"))
				{
	
				}
				else{
					echo('Unable to connect to database');
				}
				//   $my_id = mysqli_insert_id($connecDB);
				//   echo '<li id="item_'.$my_id.'" class="item-list">';
				//   echo $contentToSave.'</li>';
			}
			else{
				echo('Unable to connect to database');
			}
		 }
	}
	else if($requestContent[1] == 'dislike')
	{
		// echo('Disliked');

		$existsSql=" SELECT * FROM `user_opinion_on_blogs` WHERE `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';";
		$res=mysqli_query($connecDB,$existsSql);
		$num=mysqli_num_rows($res);
		if($num>0){
				while($row=mysqli_fetch_assoc($res)){
					// echo $row['Liked'];
					// echo $row['Disliked'];
					// $blog_status = $row['Liked'];
					if($row['Disliked'] == '1')
					{
						// Already DisLiked
						if(mysqli_query($connecDB,"UPDATE bloglist SET `dislikes` =`dislikes`-1 WHERE `Blog_id`=$requestContent[3];"))
						{
							// DELETE FROM table_name WHERE some_column = some_value
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `DisLiked` = 0 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';"))
							{

							}
							else{
								echo('Unable to connect to database FOr user_opinion_on_blogs');
							}
						}
						else
						{
							echo('Unable to connect to database');
						}

					}
					else if($row['Liked'] == '1')
					{
						//  Already liked
						if(mysqli_query($connecDB,"UPDATE bloglist SET `likes` =`likes`-1,`dislikes` =`dislikes`+1 WHERE `Blog_id`=$requestContent[3];"))
						{
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `Liked` = 0,`Disliked` = 1 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';")) 
							{
				
							}
							else{
								echo('Unable to connect to database');
							}
						}
						else
						{
							echo('Unable to connect to database');
						}
					}
					else
					{
						// Nither Nor
						if(mysqli_query($connecDB,"UPDATE bloglist SET `dislikes` =`dislikes`+1 WHERE `Blog_id`=$requestContent[3];"))
						{
							if(mysqli_query($connecDB,"UPDATE `user_opinion_on_blogs` SET `Disliked` = 1 where `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';"))
							{
				
							}
							else{
								echo('Unable to connect to database');
							}

						}
						else{
							echo('Unable to connect to database');
						}
					}
			// 		else
			// 		{
			// 		//  echo $blog_status;								
			// // echo $val;
			// 	}
			}
		}
		else{
			if(mysqli_query($connecDB,"UPDATE bloglist SET `dislikes` =`dislikes`+1 WHERE `Blog_id`=$requestContent[3];"))
			{
				if(mysqli_query($connecDB,"INSERT INTO user_opinion_on_blogs(UserId,BlogId,Disliked) VALUES('$requestContent[4]','$requestContent[3]','1')"))
				{
	
				}
				else{
					echo('Unable to connect to database');
				}
				//   $my_id = mysqli_insert_id($connecDB);
				//   echo '<li id="item_'.$my_id.'" class="item-list">';
				//   echo $contentToSave.'</li>';
			}
			else{
				echo('Unable to connect to database');
			}
		 }
	}
	// print_r($requestContent);
	// alert('REsponse');
	// $existsSql=" SELECT `content` FROM `add_delete_record` WHERE `id` = 1;";
    // $res=mysqli_query($connecDB,$existsSql);
    // $num=mysqli_num_rows($res);
    // if($num>0){
    //     while($row=mysqli_fetch_assoc($res)){
            
            
            
    //           $blog_writer = (int)$row['content']; 
    //           echo $blog_writer;									
	// // echo $val;
	// 	}
	// }
	// else{
	// 	$blog_writer = 0;
	// }
// 	if(mysqli_query($connecDB,"UPDATE add_delete_record SET `content` =$blog_writer+1 WHERE `id`=1"))
// 	{
// 		  $my_id = mysqli_insert_id($connecDB);
// 		  echo '<li id="item_'.$my_id.'" class="item-list">';
// 		  echo $contentToSave.'</li>';
// 	}
 
       $existsSql = "SELECT likes,dislikes FROM bloglist WHERE `Blog_id`=$requestContent[3];";
	// =" SELECT * FROM `user_opinion_on_blogs` WHERE `BlogId` = '$requestContent[3]' and `UserId`= '$requestContent[4]';";
		$res=mysqli_query($connecDB,$existsSql);
		$num=mysqli_num_rows($res);
		if($num>0){
				while($row=mysqli_fetch_assoc($res)){
					echo $row['likes']-$row['dislikes'];
					
				}
			}
		
		$existsSql = "SELECT * FROM bloglist WHERE `Blog_id`=$requestContent[3];";
		$res=mysqli_query($connecDB,$existsSql);
		$num=mysqli_num_rows($res);
		if($num>0){
			while($row=mysqli_fetch_assoc($res))
			{
				$like_value = (int)$row['likes'];
				$dislike_value = (int)$row['dislikes'];
				$time_value = (int)$row['Time'];
				
			}
			$like_value *= 1000;
			$dislike_value *=1000;
			
			
		}
		$rank = $like_value-$dislike_value+$time_value;
		// echo "<br>";
		// echo $rank;
		// $existsSql1 = "UPDATE `bloglist` set `rank` = $rank WHERE `Blog_id`=$requestContent[3];";
		// $res1=mysqli_query($connecDB,$existsSql1);
		// $num1=mysqli_num_rows($res1);

		$existsSql = "UPDATE `bloglist` set `rank` = $rank WHERE `Blog_id`=$requestContent[3];";
		mysqli_query($connecDB,$existsSql);
		
}
?>