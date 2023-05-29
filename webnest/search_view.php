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

		$search_id= $_POST['suid'];
		
		
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

        .search_user{
           margin-left:36%;
        }
		.User-name{
			margin-left:38%;
		}
		.report-btn{
			margin-left:27%;
			font-size:15px;
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
		.report-btn{
			margin-left:5%;
			
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
			
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp Friends</a>
                <a href="pro/users.php"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="user_proflie.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp Profile</a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
            

                
		</div>
            <img src="pro/logowt.png" class="logo" width="15%" height="15%" >
           
        </div>
        <div class="nav-right">
<!-- --------------------------------search_box ----------------------------------->
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


    <div class="container">
        
        <div class="left-sidebar">
            <div class="imp-links">

			<br>
				<a href="webpro.php"><iconify-icon icon="material-symbols:home-outline" style="color: white;" width="30"></iconify-icon>&nbsp Home</a>
				<a href="home_frd.php"><iconify-icon icon="la:user-friends" style="color: white;" width="30"></iconify-icon>&nbsp Friends</a>
                <a href="pro/users.php"><iconify-icon icon="mdi:message-reply-text" style="color: white;" width="30"></iconify-icon>&nbsp Messages</a>
				<a href="user_proflie.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp Profile</a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp<span class="btn btn-outline-primary"> My Posts</span></a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
            </div>

            <div class="shortcut-links">
				<br>
                

            </div>
        </div>

       <div class="main-content">
			<div class="story-gallery">
				
		</div>

		<?php
			if(isset($_GET['suid']))
			{
				$search_id=$_GET['suid'];
				$sql_user="SELECT* FROM users WHERE user_id='$search_id' ";
				$res_user=mysqli_query($conn,$sql_user);
				$fetch_user= mysqli_fetch_assoc($res_user);

				$querypic=mysqli_query($conn,"select * from user_profile_pic where user_id=$search_id");
				$recpic=mysqli_fetch_array($querypic);

				$frdbtn="SELECT f_user_id,frd_id from friends WHERE  f_user_id = $userid";
				$fbtn=mysqli_query($conn,$frdbtn);
				// $frdget=mysqli_fetch_array($fbtn);
				
			}
			?>	
		
		<div class="write-post-container" style="background:#081c45;width:120%;">
			<div class="search_user">
				<img src="profile_Image/<?php echo $recpic['image'];?>"  width= "150" height="150" style="border-radius:100px;">
			</div>
			<div class="User-name"><br>
				<h5><?php echo $fetch_user['Name']; ?></h5>	
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

			

			<div class="post-input-container"  style="color:#d7cfcf;" >
					<form method="post">
					<label>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp <?php echo $fetch_user['Email'];?> </label><br>
					<label for="">Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp <?php echo $fetch_user['Gender'];?> </label><br>
					<label for="">Date Of Birth :&nbsp <?php echo $fetch_user['Birthday_Date'];?> </label>
					<br>
					<div class="add-post-links">
						<input type="submit" value="Add Friend" name="add" class="btn btn-primary report-btn" >								  
						<a href="#" class="btn btn-primary " style="margin-left:3%;font-size:15px;" data-bs-toggle="modal" data-bs-target="#user_report<?php echo $userid;?>">Report</a>
					</form>
										
				</div>
				
							
				<?php 
						if(isset($_POST['add']))
						{
							
							$sql_text="INSERT INTO notification(user_id,res_id,notif,N_date,notif_status) VALUES('$userid','$search_id','Friend Request',now(),0)";
                			$res2=mysqli_query($conn,$sql_text);
							echo "<script>alert('Request Send')</script>";
						}
				?>
			</div>
		
		</div>

			<!------------------------------report------------------------------>
			<div class= "modal fade" id="user_report<?php echo $userid;?>" tabindex= "-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
										<form method="post" action="">			
											<div class="modal-body">
												<h3 style="font-weight:bold; color:#081c45">Report</h3><br>
												<div>
												
													<input type="hidden" value="<?php  echo $rese_id=$rec1[0] ?>" name="user_id">
													<input type="hidden" value="<?php  echo $uemail=$fetch_user['Email'] ?>" name="res_email">
													<input type="hidden" value="<?php  echo $search_id ?>" name="rep_id">
													<label for="">Report user Name</label>
													<input type="text" class="form-control" value="<?php echo $rec1[1]; ?>" name="name" style="font-weight:bold;border-color:#081c45" disabled>
												</div><br>

												<div>
													<label for="">Report</label><br>
													<textarea  class="form-control" style="font-weight:bold;border-color:#081c45" name="report"></textarea>
												</div>
												<br><br>
												<div>
													<input type="submit" value="Submit" name="ok" style="background-color:#081c45;color:#fff;padding:7px;border-radius:7px;">
												</div>
											</div>
										</form>
										</div>

										

								</div>
								
							</div>


							<?php
									if(isset($_POST['ok']))
									{
										$report=$_POST['report'];
										$user_id=$_POST['user_id'];
										$rep_id=$_POST['rep_id'];
										$uemail=$_POST['res_email'];
							
										$sql_rep="INSERT INTO report VALUES(null,'$user_id','$rep_id','$uemail','$report','',now(),0)";
										$okres=mysqli_query($conn,$sql_rep);
										
																	
										}

							?>





		<div class="post-container" style="background:#081c45; width:120%;">
			
			<?php

				include 'search_user_display.php';
			
			?>


		</div>


		
		</div>
		<!---------right-sidebar----------------------------------------------->
       

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
		echo "<script>location.replace(' pro/index2.php')</script>";
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

