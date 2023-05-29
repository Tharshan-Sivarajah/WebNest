
<html>

	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="jquery.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
	<style>
		.post-row{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
		
		.post-container{
			width: 100%;
			background: #e8e9f3;
			border-radius: 6px;
			padding: 20px;
			color: #fff;
			margin: 20px 0;
			
		}	
        
        .user-profile{
            display:flex;
            align-items:center;
            
        }

        .user-profile img{
            width:45px;
            border-radius:50%;
            margin-right:10px;
        }

        .user-profile p{
            margin-bottom:-5px;
            font-weight:500;
            color:#fff;
        }

        .user-profile small{
            font-size:12px;
            
        }
        .post-img{
            width: 100%;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        @media(max-width: 600px){
            .post-img{
			width:100%;
            height:60%;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        }
	</style>

	
<body>			
			
			<?php

				include "../db-connect.php";

				$sql="SELECT post_id,user_id,post_img,post_text, DATE_FORMAT(created_at,'%Y-%d-%m') AS 'date' FROM post ORDER BY post_id DESC";
				$res=mysqli_query($conn,$sql);
				
				
				while($fetch= mysqli_fetch_assoc($res))
				{
					$p_id=$fetch['post_id'] ;

					$sql2="SELECT u.Name AS 'Name',up.image AS 'image'
							FROM post AS p INNER JOIN users AS u 
							ON p.user_id= u.user_id INNER JOIN user_profile_pic AS up 
							ON u.user_id= up.user_id WHERE p.post_id= $p_id";
					$res2= mysqli_query($conn,$sql2);
					$row= mysqli_fetch_assoc($res2);
					$post_id= $fetch['post_id'];

			?>
				<br>
		<div style="width:50%;">
			<div class="post-container" style="background:#222155;border-radius:7px;margin-left:20%;">
					<div class="post-row" id="post<?php echo $fetch['post_id']; ?> ">
							<div class="user-profile">
								<img src="../profile_Image/<?php echo $row['image']; ?>" class="rounded" style="width:50px;height:50px;">
									<div>
									<p><?php echo $row['Name']; ?></p><br>
									<span style="color:#fff"><?php echo $fetch['date'] ?></span>
									</div>
							</div>
							<!-- <iconify-icon icon="iwwa:option" width="20"></iconify-icon> -->
							<?php echo "<a href='delete_post_img.php?Ad_dp_id= $post_id'>" ?>
							<iconify-icon icon="material-symbols:delete-outline-sharp" style="color: white;" width="30" name="delete_post"></iconify-icon></a>
					
					</div>
				<br>

				<?php echo $fetch['post_text'] ?> <br><br>
				<?php
					$pic=$fetch['post_img']; 
					if($pic !=="")
					{
				?>
					<img src="../image/<?php echo $pic; ?>"  class="post-img" height="500px">
				<?php } ?>

					<div class="post-row">
						
					</div>
				<br>

					<div class="post-row">
						<div class="activity-icons">
		
						
						</div>			
					</div>
			</div>
		</div>
			<?php
				}
			
			?>



<script src="js/bootstrap.js" type="text/javascript"></script> 
</body>
</html>





		