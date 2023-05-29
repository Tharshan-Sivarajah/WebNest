<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$user=$_SESSION['fbuser'];

		include 'db-connect.php';

		$query1=mysqli_query($conn,"select * from users where Email='$user'");
		$rec1=mysqli_fetch_array($query1);
		$userid=$rec1[0];

		$_SESSION['user_id']= $userid;
		$query2=mysqli_query($conn,"select * from user_profile_pic where user_id=$userid");
		$rec2=mysqli_fetch_array($query2);

		$name=$rec1[1];
		$gender=$rec1[4];
		$img=$rec2[2];
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTP-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WebNest</title>
	<link rel="stylesheet" href="webstyle.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style=" background:#16213e;">

    <nav style=" background:#0f3460;">
        <div class="nav-left">
		<img src="pro/logowt.png" class="logo" width="15%" height="15%" >
           
        </div>
        <div class="nav-right">

            <div class="search-box">

                <img src="" alt="">
                <input type="text" placeholder="search">
            </div>

            <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                <img src="pro/user_profilepic/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" width="40" height="40">

            </div>

        </div>
		<!-- ----setting-menu-->
		<div class="setting-menu">
			<div id="dark-btn" >
				<span></span>

			</div>

			<div class="setting-menu-inner">

				<div class="user-profile">
					<img src="m1.png" width="25" height="25">
					<div>
					<p>John Nicholson</p>
					
					</div>
				</div>
								
				<hr>
				<div class="setting-links">
				<a href="#" class="btn btn-light"><iconify-icon icon="bi:gear" style="color: #203ef3;" width="37" height="37"></iconify-icon>Manage Profile<img src=""><img src=""><img src=""></a>
				</div>

				

				<div class="setting-links">
				<a href="#" class="btn btn-light"><iconify-icon icon="ic:baseline-log-out" style="color: #203ef3;" width="37" height="37"></iconify-icon>Logout <img src=""><img src=""><img src=""><img src=""></a>
					
				</div>

			</div>
			

		</div>
    </nav>


    <div class="container">
        
        <div class="left-sidebar">
            <div class="imp-links">

			
			</ul>
			<li class="dropdown">
                <a href="#" id="dropdown-toggle" onclick="show_hide()"><img src="m1.png" >Notification<span class="label label-pill label-danger count" style="border-radius:10px;"></a>
                <div id="noti" class="comt-section" style=" width: 90%; background:#fff; box-shadow: 0 0 10px rgba((0), 0, 0, 0.4); border-radius: 4px; position:absolute; top:110%; display:none;" >
					<ul id="drop-down">
						<a href="#" color="#fff">Friends</a>
					</ul>
				</div>
			</li>
			
				<a href="#"><img src="m1.png" >Friends</a>
                <a href="#"><img src="m1.png" >Message</a>
                <a href="pro/logout.php"><img src="m1.png" >Logout</a>

                <a href="#">See More</a>
            </div>

            <div class="shortcut-links">
				<br>
                <h5 style="color:#fff">Reports</h5><br>
				
				<form method="post" action="">
				<label style="color:#fff">Your Reports</label>
				<textarea name="report" class="form-control" placeholder="say something"></textarea><br>
				<input type="submit" class="btn btn-primary p-1" name="rep_sub">
				</form>

            </div>
        </div>

       <div class="main-content">
			<div class="story-gallery">
				
		</div>
		
		<div class="write-post-container" style="background:#0f1830;">
			<div class="user-profile">
				<img src="pro/user_profilepic/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>"  width= "60" height="50">
				<div class="">
				<p>John Nicholson</p>
				<small> Public</small>
				</div>
			</div>


		<?php
			include 'action.php';

			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				
				$post= new Post_cls();
				$result= $post->create_post($_POST,$_FILES['post_img']);
				
			}

				$getpost= getpost();

		?>


			
			<div class="post-input-container" >
				<textarea rows="3" placeholder="What's on your mind John..?"></textarea>
				<div class="add-post-links">
					<?php 
						include 'post.php';
					?>
					<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpost" name="btn-post">post</a>
				</div>
			</div>
		
		</div>



		<div class="post-container" style="background:#0f1830;">
			
			<?php

				include 'viewpost.php';
			
			?>


		</div>


		

		<button type="button" class="load-more-btn">Load More</button>
		
		
		</div>
		<!---------right-sidebar----------------------------------------------->
        <div class="right-sidebar" style="background:#fff;">
            <div class="sidebar-title">
                <h4 style="color:#000">Friends</h4>
            </div>

			<?php
              echo"<div>";
			  	// $conn=mysqli_connect("localhost","root","","webnest");
                  $sql="select user_id,Name,Gender,Email from users";
                  $do=mysqli_query($conn,$sql);
				 
				 

                         if(mysqli_num_rows($do)==0)
                          {
                              echo "<center><h3 class=text-danger>No Records</center></h3>";
                          }
                          else
                          {
                              echo "<center><table class='table table-striped table-hover'>";

                                  while ($row=mysqli_fetch_array($do))
                                  {
										$rid=$row['user_id'];
										$Uname= $row['Name'];
										$pic_query=mysqli_query($conn, "select * from user_profile_pic where user_id = $rid");

										$f_gen= $row['Gender'];
										$f_name= $row['Email'];
									   $pic=mysqli_fetch_array( $pic_query);
									   $f_img=$pic['image'];
					
                                      echo "<tr >";
									  echo "<td><img src='pro/user_profilepic/. $f_gen./. $f_name./Profile/. $f_img .' style=width:25px; height:25px;>"; 
                                      echo "<span style=margin-left:10px;>". $Uname ."</span>";
                                      echo "</td>";
                                                                         
									
                                      $sql2="select reseiver_acc from requests where sender_acc= $userid";
                                      $res2=mysqli_query($conn,$sql2);
									  
									  $row2=mysqli_fetch_array($res2);
											
											
												$get_rec=$row2['reseiver_acc'];
												
													if($get_rec==$rid)
													{
														echo"<td>";
														echo"<form method='POST' action=''>";  
														echo"<input type='submit' class='btn btn-primary' value='Request' disabled  >";
														echo"</form>";
														echo"</td></tr>";
															
													}
													else
													{
										
													echo"<td>";
													echo"<form method='POST' action=''>";  
													echo"<a href='request.php?uid=$userid&sid=$rid' class='btn btn-primary'  name='re'>Remove</a>";
													echo"</form>";
													echo"</td></tr>";

													
														
													}
											                                   
                                      
                                  	}
                              
                              	echo "</table></center>";                        	
												 
							
						  }
                      
              echo"</div";

    ?>
	<br><br>
	
<!-- ------------------------------friend requests -->
		
			
        </div>
    </div>

	<div class="footer">


		
	</div>
	<script src="showhide.js">
	<script src="script.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</body>
</html>
<?php
	}
	else
	{
		echo "<script>location.replace(' pro/index2.php')</script>";
	}
?>


<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
	
   $('#drop-down').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// load new notifications
$(document).on('click', '#dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>

