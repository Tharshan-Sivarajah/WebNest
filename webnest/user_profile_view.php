
<?php
	
	session_start();
	include 'db-connect.php';

	include_once 'Comment.php';
	$com = new Comment();

	

$user_id=$_SESSION['user_id'];

//if user has clicked the like or unlike button
if(isset($_POST['action'])){
	$post_id = $_POST['post_id'];
	$action = $_POST['action'];

	switch($action){
		case 'like':
			$sql="INSERT INTO post_like (post_id,L_user_id,rating_action) VALUES($post_id,$user_id,'$action') ON DUPLICATE KEY UPDATE rating_action ='unlike' ";
			
		break;

		case 'unlike':
			$sql="DELETE FROM post_like where L_user_id = $user_id AND post_id= $post_id";
		break;

		default:
		break;
	}

	mysqli_query($conn,$sql);
	echo getcount($post_id);
	exit(0);
}




function getcount($id){
	include 'db-connect.php';

	$rating= array();

	$like_query="SELECT COUNT(*) FROM post_like WHERE post_id= $id AND rating_action= 'like' ";
	$dislike_query="SELECT COUNT(*) FROM post_like WHERE post_id= $id AND rating_action= 'dislike' ";


	$like_rs=mysqli_query($conn,$like_query);
	$dislike_rs=mysqli_query($conn,$dislike_query);

	$likes=mysqli_fetch_array($like_rs);
	$dislikes=mysqli_fetch_array($dislike_rs);

	$rating =[
		'likes'=>$likes[0],
		'dislikes'=>$dislikes[0],
	];

	return json_encode($rating);
}


	function getlikes($id)
	{
		include 'db-connect.php';

		$sql="SELECT COUNT(*) FROM post_like WHERE post_id= $id AND rating_action= 'like' ";
		$rs=mysqli_query($conn,$sql);
		$result=mysqli_fetch_array($rs);

		return $result[0];

	}

	function userliked($post_id)
	{
		include 'db-connect.php';

		$user_id=$_SESSION['user_id'];

		$sql="SELECT * FROM post_like WHERE L_user_id= $user_id AND post_id= $post_id AND rating_action= 'like' ";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			return true;
		}else{
			return false;
		}

	}

	
?>


<html>

	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="jquery.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
	<style>
		.fa{
			margin-left:10px;
		}	
		
	</style>

	
<body>			
			
			<?php

				
				$sql="SELECT post_id,user_id,post_img,post_text, DATE_FORMAT(created_at,'%Y-%d-%m') AS 'date' FROM post WHERE user_id=$user_id ORDER BY post_id DESC";
				$res=mysqli_query($conn,$sql);
				
				
				while($fetch= mysqli_fetch_assoc($res))
				{
					$p_id=$fetch['post_id'] ;
					
					$sql2="SELECT u.Name AS 'Name',up.image AS 'image',p.post_id
							FROM post AS p INNER JOIN users AS u 
							ON p.user_id= u.user_id INNER JOIN user_profile_pic AS up 
							ON u.user_id= up.user_id WHERE p.post_id= $p_id";
					$res2= mysqli_query($conn,$sql2);
					$row= mysqli_fetch_assoc($res2);
						

			?>
				<br><br>
		<div class="post-container" style="background:#081c45;border-radius:7px;">
				<div class="post-row" id="post<?php echo $fetch['post_id'] ?> ">
					<div class="user-profile">
						
					<img src="profile_Image/<?php echo $img; ?>" class="rounded" >
						<div>
						<p><?php echo $row['Name']; ?></p>
						<span style="color:#fff"><?php echo $fetch['date'] ?></span>
						</div>
					</div>
					<!-- <iconify-icon icon="iwwa:option" width="20"></iconify-icon> -->
					
					<?php echo "<a href='user_delete_post.php?udp_id= $p_id '>" ?>
					<iconify-icon icon="material-symbols:delete-outline-sharp" style="color: white;" width="30"></iconify-icon></a>
				</div>
				<br>

				<?php echo $fetch['post_text'] ?> <br><br>
				<?php
					$pic=$fetch['post_img']; 
					if($pic !=="")
					{
				?>
					<img src="image/<?php echo $pic; ?>"  class="post-img" height="500px">
				<?php } ?>
				<div class="post-row">
					
				</div>
				<br>

				<div class="post-row">
				<div class="activity-icons">
					<div><i 
							<?php if(userliked($fetch['post_id'])): ?>
								class="fa fa-thumbs-up like-btn" 
							<?php else: ?>
								class="fa fa-thumbs-o-up like-btn" 
							<?php endif ?>
							
							data-id="<?php echo $fetch['post_id'] ?>" style="font-size:24px;"  name=" clike" ></i><span style="margin-left:10px" class="likes" ><?php echo getlikes($fetch['post_id']) ?></span>
					</div>
						
					<input type="hidden" value="<?php  echo $postid=$fetch['post_id'] ?>" name="name">
					
			<!-- ------------------comments------------------------------------------------------->
			<div style="margin-left:50px;margin-top:17px;" data-bs-toggle="modal" data-bs-target="#postview<?=$fetch['post_id']?>" ><iconify-icon icon="material-symbols:comment-outline-rounded" width="25" height="25"></iconify-icon>
									
						<?php 
								
								$result = $com->com_count();
								while ($data = $result->fetch_assoc()) {
									if($data['p_id']== $postid)
									{
						?>
										
						<span style="margin-left:10px" ><?php echo $data['count']; ?> </span> <?php } } ?>
					</div>		
					
				</div>			
					
				
			</div>
			
			<div>
					
					<div class= "modal fade" id="postview<?=$fetch['post_id']?>" tabindex= "-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
						<div class="modal-dialog  modal-dialog-centered">
							<div class="modal-content">

									<div class="modal-body">
										<div>
											<h4><?php echo $fetch['post_text'] ?></h4> <br>
											<?php
												$pic=$fetch['post_img']; 
												if($pic !=="")
												{
											?>
												<img src="image/<?php echo $pic; ?>" width="100%" >
											<?php } ?>

										</div>
											<br><br>
										<div>
											<?php
												
																		
												$result = $com->index();
												while ($data = $result->fetch_assoc()) {
													if($data['p_id']== $fetch['post_id'])
													{
														?>
													<div>
														<div><img src="profile_Image/<?php echo $data['image'] ?>" style="width:35px; height:35px;border-radius:40px;">
														<span style="margin-left:10px;font-size:12px;color:#000;"><?php echo $com->dateFormat($data['comment_time']); ?></span><br>
														<span style="margin-left:50px;font-size:15px;color:#000;"><?php echo $data['Name']; ?></span>
														<div style="margin-left:50px;color:#000;"><?php echo $data['comments'] ?></div></div>
													</div><br>
													<?php 
													}	
												} 
											?>
											<form action="post_comment.php" method="post">
						
												<input type="hidden" value="<?php  echo $postid=$fetch['post_id'] ?>" name="name">
												<input type="hidden" value="<?php  echo $user_id ?>" name="cid">
												<input type="hidden" value="<?php  echo $rese_id=$fetch['user_id'] ?>" name="res_id">
												<textarea name="comment"  class="form-control" rows="1"  placeholder="comment"></textarea>
													
												<div><input  type="submit" name="submit" value="Sent" class="btn btn-primary p-1 cbtn" style="margin-left:90%; margin-top:10px;"></div>
											
											</form>	
										</div>

									</div>

							</div>
							
						</div>

					</div>	

			
			</div> 
		</div>	
		
		
				
			<?php
				}
			
			?>

<script type="text/javascript">
 var  display = 0;

    function hide(){

        if( display==0)
        {
			document.getElementById("show_com").style.display= "block";
            display=1;
        }
        else
        {
            document.getElementById("show_com").style.display= "none";
            display=0;
        }
        
    }

</script>

<script src="js/bootstrap.js" type="text/javascript"></script> 
<script src="like.js"></script>



</script>
</body>
</html>





		