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

		/*comment modal box*/
		/* Float cancel and delete buttons and add an equal width */
			.cancelbtn, .deletebtn {
			float: left;
			width: 50%;
			}

			/* Add a color to the cancel button */
			.cancelbtn {
			background-color: #ccc;
			color: black;
			}

			/* Add a color to the delete button */
			.deletebtn {
			background-color: #f44336;
			}

			/* Add padding and center-align text to the container */
			.container2 {
			padding: 16px;
			}

			/* The Modal (background) */
			.modal2 {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: #474e5d;
			padding-top: 50px;
			}

			/* Modal Content/Box */
			.modal2-content {
			background-color: #fefefe;
			margin: 15% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
			border: 1px solid #888;
			width: 80%; /* Could be more or less, depending on screen size */
			height:auto;
			}

			/* Style the horizontal ruler */
			hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
			}
			
			/* The Modal Close Button (x) */
			.close {
			position: absolute;
			right: 35px;
			top: 15px;
			font-size: 40px;
			font-weight: bold;
			color: #f1f1f1;
			}

			.close:hover,
			.close:focus {
			color: #f44336;
			cursor: pointer;
			}

			/* Clear floats */
			.clearfix::after {
			clear: both;
			display: table;
			}

			/* Change styles for cancel button and delete button on extra small screens */
			@media screen and (max-width: 300px) {
			.cancelbtn, .deletebtn {
				width: 100%;
			}
			}
		/*comment modal box*/
		
	</style>

	
<body>			
			
			<?php


				$sql="SELECT post_id,user_id,post_img,post_text, DATE_FORMAT(created_at,'%Y-%d-%m') AS 'date' FROM post ORDER BY post_id DESC";
				$res=mysqli_query($conn,$sql);
				
				
				while($fetch= mysqli_fetch_assoc($res))
				{
					$p_id=$fetch['post_id'] ;

					$sql2="SELECT u.user_id,u.Name AS 'Name',up.image AS 'image',u.Email, u.Gender AS 'sex'
							FROM post AS p INNER JOIN users AS u 
							ON p.user_id= u.user_id INNER JOIN user_profile_pic AS up 
							ON u.user_id= up.user_id WHERE p.post_id= $p_id";
					$res2= mysqli_query($conn,$sql2);
					$row= mysqli_fetch_assoc($res2);
		

			?>
			<br>
			<div class="post-container" style="background:#081c45;border-radius:7px;">
					<div class="post-row" id="post<?php echo $fetch['post_id'] ?> ">
							<div class="user-profile">
							
								<img src="profile_Image/<?php  echo $row['image']; ?>" class="rounded" >
									<div>
									<p><?php echo $row['Name']; ?></p>
									<span style="color:#fff"><?php echo $fetch['date'] ?></span>
									</div>
							</div>
									<iconify-icon icon="iwwa:option" width="20" data-bs-toggle="modal" data-bs-target="#report<?=$fetch['post_id']?>" style="cursor: pointer;"></iconify-icon>
									
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

										if(mysqli_num_rows($result)==0)
										{
										?>
											<span style="margin-left:10px" >0</span> 

									<?php

										}
										else{

										
										while ($data = $result->fetch_assoc()) {
											if($data['p_id']== $postid)
											{
								?>
											
							<span style="margin-left:10px" ><?php echo $data['count']; ?> </span> <?php } } } ?>
							
						</div>		
					
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


							<div class= "modal fade" id="report<?=$fetch['post_id']?>" tabindex= "-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
										<div class="modal-content">

											<div class="modal-body">
												<div>
													<a href="#" style=" text-decoration: none;color:#000;" data-bs-toggle="modal" data-bs-target="#post_report<?=$fetch['post_id']?>">Report</a><br><br>
													<a href="image/<?php echo $fetch['post_img']; ?>" style=" text-decoration: none;color:#000;" download>Download</a>
												</div>
											</div>

										</div>

								</div>
								
							</div>


							<form method="post" action="sent_report.php">	
							<div class= "modal fade" id="post_report<?=$fetch['post_id']?>" tabindex= "-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
												
											<div class="modal-body">
												<h3 style="font-weight:bold; color:#081c45">Report</h3><br>
												<div>
												
			
													<input type="hidden" value="<?php  echo $postid=$fetch['post_id'] ?>" name="post_id">
													<input type="hidden" value="<?php  echo $uemail=$row['user_id']; ?>" name="r_userid">
													<input type="hidden" value="<?php  echo $row['Email']; ?>" name="mail">
													<input type="hidden" value="<?php  echo $usid=$row['user_id']; ?>" name="report_id">

													<label for="">Report user Name</label>
													<input type="text" class="form-control" value="<?php echo $row['Name']; ?>" name="username" style="font-weight:bold;border-color:#081c45" disabled>
												</div><br>

												<div>
													<label for="">Report</label><br>
													<textarea  class="form-control" style="font-weight:bold;border-color:#081c45" name="report" required></textarea>
												</div>
												<br><br>
												<div>
													<input type="submit" value="Submit" name="ok" style="background-color:#081c45;color:#fff;padding:7px;border-radius:7px;">
												</div>
											</div>
										
										</div>

										

								</div>
								
							</div>
						</form>
			<?php
				}
			
			?>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script src="js/bootstrap.js" type="text/javascript"></script> 
<script src="like.js"></script>
<script src="all.js"></script>



</body>
</html>





		