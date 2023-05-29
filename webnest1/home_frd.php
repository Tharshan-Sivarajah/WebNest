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
		$query2=mysqli_query($conn,"select * from user_profile_pic where user_id= '$userid' ");
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

<style>
		
		.sidenav {
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
		}

		.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s;
		}

		.sidenav a:hover {
		color: #f1f1f1;
		}

		.frd_req{
		background:#fff; 
		width:40%; 
		border-radius:2%; 
		margin-top:2%;
		}

		.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
		}

		.bar_icon{
			display:none;
		}


		@media screen and (max-height: 600px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
		.bar_icon{display:block;}
		.logo{
			display: none;
			}

		.nav-notif a{
			display:none;
		}

		.frd_req{
			width:100%
		}
		}

		
		.notification .badge {
		position: absolute;
		top: 10px;
		left: 50%;
		padding: 5px 10px;
		border-radius: 50%;
		background: red;
		color: white;
		}
	</style>

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
			
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp Friends</a>
                <a href="pro/users.php"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="frd_home.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp Profile</a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
            

                
		</div>
            <img src="pro/logowt.png" class="logo" width="15%" height="15%" >
           
        </div>
        <div class="nav-right">
<!-- --------------------------------search_box ----------------------------------->
            <!-- <div class="nav-notif">

			<a href="#" class="notification" id="dropdown-toggle" onclick="show_hide()"><span class="label label-pill label-danger count badge" style="border-radius:10px;top:25px;left:84%;">3</span><iconify-icon icon="ic:baseline-notifications" style="color: white;" width="30"></iconify-icon></a>
                
            </div> -->

			<div class="nav-notif">

			<a href="#" class="notification" id="dropdown-toggle" ><span class="label label-pill label-danger count badge" style="border-radius:10px;top:25px;left:86%;" id="all-notif"></span><iconify-icon icon="ic:baseline-notifications" style="color: white;" width="30" onclick="show()"></iconify-icon></a>
	
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
		
			<div >
				<div  id="notif" class="show-notif-ajax" style="background:#2c4167; width:20%; margin-left:70%;position: fixed;z-index: 1;display:none;">
				<ul id="drop-down-notif">
						
				</ul>

				</div>
			</div>
			<br>
			<div><center>
			<form action="" method="post">
				
				<input type="text" name="t1" placeholder="Enter Account Name" style="background-color:#fff;padding:7px;width:15.5%;" >&nbsp&nbsp&nbsp

				<input type="submit" name="b1" value="search" class="btn btn-danger">

				

			</form>
			</center>
			<?php


				if(isset($_POST['b1']))
				{



				$host="localhost";
				$us="root";
				$pw="";
				$db="webnest";

				$con=mysqli_connect($host,$us,$pw,$db);

					if(!$con)
					{
						echo "".mysqli_connect_error();
					}

					$id=$_POST['t1'];

					$sql="SELECT u.user_id,u.Name,p.image from users AS u INNER JOIN user_profile_pic AS p
						  ON u.user_id= p.user_id where u.user_id LIKE '%$id%' or u.Name LIKE '%$id%'";

					$res=mysqli_query($con,$sql);

					//print_r(mysqli_fetch_array($res,MYSQLI_BOTH));

					if(mysqli_num_rows($res)==0)
						{
							echo "<div style='background:#fff;color:#000;margin-left:40%; overflow: auto; width:15.3%;border-radius:4px; position: absolute;z-index: 1;text-align:center;'><h4 class=text-danger>No Results</h4></div>";
						}
						else
						{
							
							echo"<div id='r' style='background:#fff;color:#000;margin-left:40%; overflow: auto; width:15.3%;border-radius:4px; position: absolute;z-index: 1;'><table>";
								while ($row=mysqli_fetch_array($res))
								{
									$se_id=$row['user_id'];
								?>
									
								<div><br><img src="profile_Image/<?php echo $row['image']; ?>" style="width:45px; height:45px;border-radius:40px;margin-left:5%;">
								<a <?php echo 'href="search_view.php?suid='.$se_id.'  "'; ?> style="text-decoration:none;color:#000; cursor: pointer;"><span style="margin-left:7px;font-size:15px;"><?php echo $row['Name']; ?></span></a>&nbsp&nbsp
								<a <?php echo 'href="request.php?uid='.$userid.'&sid='.$se_id.' "'; ?>><input type="submit" value="Add friend" class="btn btn-sm btn-primary"></a></div><br>
									
								<?php	
								}
								
							echo "</table></div>";

						}

				}
				
				?>


		</div>
		<br> 
    <div class="container">
        
        <div class="left-sidebar">
            <div class="imp-links">
				
				<br>
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp<span class="btn btn-outline-primary"> Friends</span></a>
                <a href="pro/users.php"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="user_proflie.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp Profile</a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
            </div>

            <div class="shortcut-links">
				<br>
                

            </div>
        </div>

       <div class="frd_req" style="background-color:#e5e5f5;color:#fff;">
			<div style="margin-left:10%; margin-top:5%;">
				<p style="color:#000; "><b>Friends Requests</b></p>	
			</div>
			<div>

				<table class="table table-striped table-hover">
				<?php
					include 'db-connect.php';
						$sql_frd="SELECT r.r_id,r.sender_acc,r.reseiver_acc,u.Name,up.image FROM requests AS r INNER JOIN users AS u 
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
							$tabl_id=$row_frd['r_id'];
							$r_userid=$row_frd['reseiver_acc'];
				?>
					
							<tr>
								<td><a <?php echo 'href="search_view.php?suid='.$r_userid.'  "'; ?> style=" text-decoration: none;color:#000;"><img src="profile_Image/<?php echo $row_frd['image']; ?>" width="35px" height="35px" style="border-radius:40px;">
								<span style=margin-left:10px;><?php echo $row_frd['Name']; ?></span></a></td>
								<td></td>
								<form method="post">
								<td><input type="submit" class="btn btn-primary" value="Add Friend" name="add">
								<input type="submit" class="btn btn-primary" value="Cancel" name="remove"></td>
								</form>
							</tr>
					
					<?php
							} 
						}
					?>
				</table>
				<?php include "save_frd.php" ?>
				<?php include "frd_req_cancel.php" ?>
			</div>
			
			<br><br>
			<div>
				 <?php
					echo"<div>";
					$sql="select user_id,Name from users";
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
											$pic_query=mysqli_query($conn, "select image from user_profile_pic where user_id = $rid");

											
										$pic=mysqli_fetch_array( $pic_query);
										
									?>	
															
										<tr >
										<td>
										<a <?php echo 'href="search_view.php?suid='.$rid.' "'; ?> style=" text-decoration: none;color:#000;"><img src="profile_Image/<?php echo $pic['image']; ?>" style="width:35px; height:35px;border-radius:40px;">
										<span style=margin-left:10px;><?php echo $row['Name']; ?></span></a>
										</td>
																			
										<?php
														echo "<td>";
														echo "<form method='POST' action=''>"; 
														echo "<a href='request.php?uid=$userid&sid=$rid' class='btn btn-primary'  name='re'>Request</a>";
														echo "</form>";
														echo "</td></tr>";

														
															
														
																				
										
										}
								
									echo "</table></center>";                        	
													
								
							}
						
					echo"</div";

				?>
				
			</div>
			</div>
	   
	   </div>
			

			
		<!---------right-sidebar----------------------------------------------->
        <div class="right-sidebar" style="background:#e5e5f5; margin-top:2%;">
            <div class="sidebar-title">
                <h4 style="color:#000">Friends</h4>
            </div>

			<?php
              echo"<div>";
			  
                  $sql="SELECT u.user_id,u.Name,up.image, f.F_Id FROM friends AS f 
				  		INNER JOIN users AS u
				  		ON u.user_id= f.frd_id INNER JOIN user_profile_pic AS up
				  		ON u.user_id= up.user_id WHERE f.f_user_id =$userid OR f.frd_id = $userid ";
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
										$fid=$row['F_Id'];
										$rid=$row['frd_id'];
										$Uname= $row['Name'];
										$u_f_id=$row['user_id'];

										$pic_sql="select * from user_profile_pic where user_id = '$u_f_id' ";
										$pic_query=mysqli_query($conn,$pic_sql);

										
									   $pic=mysqli_fetch_array( $pic_query);
									   $f_img=$pic['image'];
					
                                      echo "<tr >";
									  ?>

									  <td><a <?php echo 'href="search_view.php?suid='.$u_f_id.' "'; ?> style=" text-decoration: none;color:#000;"><img src="profile_Image/<?php echo $pic['image']; ?>" style="width:35px; height:35px;border-radius:40px;">
									  <?php
                                      echo "<span style=margin-left:10px;>". $Uname ."</span></a>";
                                      echo "</td>";
                                                                         
								
										
													echo"<td>";
													echo"<form method='POST' action=''>";  
													echo"<a href='remove_frd.php?uid= $fid' class='btn btn-primary'  name='re'>Remove</a>";
													echo"</form>";
													echo"</td></tr>";
	                                   
                                      
                                  	}
                              
                              	echo "</table></center>";                        	
												 
							
						  }
                      
              echo"</div";

			//  if(isset($_POST['re']))
			//   {
			//	$sql_del="DELETE FROM friends WHERE f_user_id = $userid "
			//   }
		
    ?>
	</div>
	<br><br>
	
<!-- ------------------------------friend requests -->
		
			

			
        

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

<script>
		var a;
		function show()
		{
			if(a==0)
			{
				document.getElementById("notif").style.display="inline";
				return a=1;
			}
			else
			{
				document.getElementById("notif").style.display="none";
				return a=0; 
				
			}
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
	function loadDoc() {
		setInterval(function(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("all-notif").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "count_notif.php", true);
			xhttp.send();

			},1000);

	}

	loadDoc();
	
	
function displayComments(display =''){
	
		$.ajax({
			url: "fetch.php",
			type:"POST",
			async: false,
			data: {
				display:display
					
			},
			success: function(d){
				$("#drop-down-notif").html(d);
				$("#drop-down").html(d);	
			}
		});
	} 
	displayComments();
	
</script>



