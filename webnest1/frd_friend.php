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
	<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>
<body style=" background:#01112d;">

<nav style=" background:#0d2956;">
        <div class="nav-left">
		<span style="font-size:30px;cursor:pointer;color:#fff;" class="bar_icon" onclick="openNav()">&#9776;</span>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<img src="pro/logowt.png" style="width: 60px; margin-left: 10px;" >

			<li class="dropdown">
			<a href="#" class="notification" id="dropdown-toggle" onclick="show_hide()"><iconify-icon icon="ic:baseline-notifications" style="color: white;" width="30"></iconify-icon>&nbsp Notification<span class="label label-pill label-danger count badge" style="border-radius:10px;top: 25px;left: 60%;">3</a>
                <div id="noti" class="comt-section" style=" width: 90%; background:#fff; box-shadow: 0 0 10px rgba((0), 0, 0, 0.4); border-radius: 4px; position:absolute; top:110%; display:none;" >
					<ul id="drop-down">
						<a href="" color="#fff">Friends</a>
					</ul>
				</div>
			</li>
			
			<br>
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp Friends</a>
                <a href="#"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="frd_home.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp<span class="btn btn-danger"> Profile</span></a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
            

                
		</div>
            <img src="pro/logowt.png" class="logo" width="15%" height="15%" >
           
        </div>
        <div class="nav-right">
<!-- --------------------------------search_box ----------------------------------->
            <div class="nav-notif">

			<a href="#" class="notification" id="dropdown-toggle" onclick="show_hide()"><span class="label label-pill label-danger count badge" style="border-radius:10px;top:25px;left:84%;">3</span><iconify-icon icon="ic:baseline-notifications" style="color: white;" width="30"></iconify-icon></a>
                
            </div>

            <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                <img src="profile_Image/<?php echo $img; ?>" width="40" height="40">

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

			<!-- <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a> 
				<ul class="dropdown-menu"></ul>
				</li> -->
				
				<br>
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp<span class="btn btn-danger"> Friends</span></a>
                <a href="#"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="user_proflie.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp Profile</a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
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

       <div style="background:#fff; width:40%; border-radius:2%; margin-top:2%;">
	   	<div style="margin-left:10%; margin-top:5%;">
				<p style="color:#000; "><b>Friends Requests</b></p>	
			</div>
			<div>

				<table class="table table-striped table-hover">
				<?php
					
						$sql_frd="SELECT r.sender_acc,u.Name,up.image FROM requests AS r INNER JOIN users AS u 
								  ON r.sender_acc= u.user_id INNER JOIN user_profile_pic AS up
								  ON u.user_id= up.user_id WHERE r.reseiver_acc= $userid AND r.r_status=0";
						$do_frd=mysqli_query($conn,$sql_frd);
					if(mysqli_num_rows($do_frd)==0)
					{
						echo "<td>No Friends Requests</td>";
						
					}
					else
					{

						while($row_frd=mysqli_fetch_array($do_frd))
						{
							$res_id=$row_frd['sender_acc'];
				?>
					
							<tr>
								<td><img src="m1.png" width="30px" height="30px"></td>
								<td><?php echo $row_frd['Name']; ?> </td>
								<td></td>
								<form method="post">
								<td><input type="submit" class="btn btn-primary" value="Add Friend" name="add">
								<input type="submit" class="btn btn-primary" value="Cancel" ></td>
								</form>
							</tr>
					
					<?php
							} 
						}
					?>
				</table>
			</div>
			
			<br><br>
			<div>
				 <?php
					echo"<div>";
					$sql="select user_id,Name,Gender,Email from users";
					$do=mysqli_query($conn,$sql);
					
					

							if(mysqli_num_rows($do)==0)
							{
								echo "<center><h3 class=text-danger>No Records</center></h3>";
							}
							else
							{
								echo "<center><table class='table table-striped table-hover'><tr  style='background-color:#aeb0b1'><th>People you may know?</th><th></th><th></th></tr>";

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
										
										if($userid==$rid)
										{
										echo"<td>";
										echo"<form method='POST' action=''>";  
										// echo"<a href='request.php?uid=$userid&sid=$rid' class='btn btn-primary'  name='re' disabled >Request</a>";
										echo"</form>";
										echo"</td></tr>";
				
										}	
										else{
										
										echo"<td>";
										echo"<form method='POST' action=''>";  
										echo"<a href='request.php?uid=$userid&sid=$rid' class='btn btn-primary'  name='re'>Request</a>";
										echo"</form>";
										echo"</td></tr>";

										}	
														
																				
												
										}
								
									echo "</table></center>";                        	
													
								
							}
						
					echo"</div";

				?>
				
			</div>
			</div>
	   
	   </div>
			<?php include "save_frd.php" ?>

			
		<!---------right-sidebar----------------------------------------------->
        <div class="right-sidebar" style="background:#fff; margin-top:2%;">
            <div class="sidebar-title">
                <h4 style="color:#000">Friends</h4>
            </div>

			<?php
              echo"<div>";
			  
                  $sql="SELECT u.Name,up.image,f.frd_id FROM friends AS f 
				  		INNER JOIN users AS u
				  		ON u.user_id= f.frd_id INNER JOIN user_profile_pic AS up
				  		ON u.user_id= up.user_id WHERE f.f_user_id =$userid ";
                 		$do=mysqli_query($conn,$sql);
				 
				 

                         if(mysqli_num_rows($do)==0)
                          {
                              echo "<center><h3 class=text-danger>No Friends</center></h3>";
                          }
                          else
                          {
                              echo "<center><table class='table table-striped table-hover'>";

                                  while ($row=mysqli_fetch_array($do))
                                  {
										
										$rid=$row['frd_id'];
										$Uname= $row['Name'];

										$pic_sql="select * from user_profile_pic where user_id = '$rid ' ";
										$pic_query=mysqli_query($conn,$pic_sql);

										$f_gen= $row['Gender'];
										$f_name= $row['Email'];
									   $pic=mysqli_fetch_array( $pic_query);
									   $f_img=$pic['image'];
					
                                      echo "<tr >";
									  echo "<td><img src='pro/user_profilepic/. $f_gen./. $f_name./Profile/. $f_img .' style=width:25px; height:25px;>"; 
                                      echo "<span style=margin-left:10px;>". $Uname ."</span>";
                                      echo "</td>";
                                                                         
								
										
													echo"<td>";
													echo"<form method='POST' action=''>";  
													echo"<a href='remove_frd.php?uid=$rid' class='btn btn-primary' >Remove</a>";
													echo"</form>";
													echo"</td></tr>";
	                                   
                                      
                                  	}
                              
                              	echo "</table></center>";                        	
												 
							
						  }
                      
              echo"</div>";

					
		?>
		<br><br>
	</div>
       

	<div class="footer">

	</div>

	<script>
	function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	}
</script>

	<script src="showhide.js"></script>
	<script src="script.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</body>
</html>
<?php
	}
	else
	{
		
		echo "<script>location.replace('pro/index2.php')</script>";
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


