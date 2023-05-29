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
		$query2=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE user_id= '$userid' ORDER BY profile_id DESC LIMIT 1 ");
		$rec2=mysqli_fetch_array($query2);

		$name=$rec1[1];
		$gender=$rec1[4];
		$img=$rec2[2];

	
?>

<?php

    
    $sql= "SELECT * FROM users WHERE user_id = '$userid '";
    $res= mysqli_query($conn,$sql);
       
      $row= mysqli_fetch_assoc($res);
    
        $uname= $row['Name'];
        $email= $row['Email'];
        $pw= $row['Password'];
        $sex= $row['Gender'];
        $dob= $row['Birthday_Date'];
       
       

    if(isset($_POST['p_save']))
    {
        $puname= $_POST['p_uname'];
        $psex= $_POST['gender'];
        // $pemail= $_POST['p_email'];
        $ppw= $_POST['p_pw'];
       

		$pdob =$_POST['p_dob'];
		$n=date("Y");
		$y=$n-$pdob;

		if($y>=18)
		{
        $query= "UPDATE users SET Name = '$puname', Gender = '$psex', Birthday_Date = '$pdob', Password = '$ppw' WHERE user_id = $userid ";
        $result= mysqli_query($conn,$query);
		}
		else{
			echo "<script>alert('user must be older than 18 years......!')</script>";
		}

    } 
   


        if(isset($_POST['file']) && ($_POST['file']=='Upload'))
        {
        
        
        $img_name=$_FILES['file']['name'];
        $img_tmp_name=$_FILES['file']['tmp_name'];
        $prod_img_path=$img_name;
        move_uploaded_file($img_tmp_name,"profile_Image/".$prod_img_path);
        $res=mysqli_query($conn,"UPDATE user_profile_pic SET image='$img_name' WHERE user_id=$userid ");
        echo "<script>location.replace('user_proflie.php')</script>";
        }

       
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTP-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WebNest</title>
	<LINK REL="SHORTCUT ICON" HREF="pro/fb_title_icon/icon.ico" />
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
		.imp-links a{
			color:#fff;
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

		.modal-del {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 50%;
		}

		/* The Close Button */
		.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
		margin-left:95%;
		}

		.close:hover,
		.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
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
				<a href="user_proflie.php"><iconify-icon icon="gg:profile" style="color: white;" width="30"></iconify-icon>&nbsp<span class="btn btn-outline-primary"> Profile</span></a>
				<a href="frd_home.php"><iconify-icon icon="mdi:post-outline" style="color: white;" width="30"></iconify-icon>&nbsp My Posts</a>
                <a href="pro/logout.php"><iconify-icon icon="ri:logout-box-line" style="color: white;" width="30"></iconify-icon>&nbsp Logout</a>
				<a href=""></a>
			</div>

           
        </div>
        <form method="post" enctype="multipart/form-data" name="uimg" >
        <div class="container rounded  mt-3 mb-3" style="margin-left:5%;background:#e5e5f5;">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="100px" height="100px;" name="pro_image" src="profile_Image/<?php echo $img; ?>" style="border:2px solid #0d2956;box-shadow:0 8px 10px rgba(0,0,0,.3);"><br><span class="font-weight-bold"><?php echo $name ; ?></span>
                <span class="text-black-50"><?php echo $user; ?></span><br><span style="margin-left:30%;">
                <div><input type="file" name="file" id="img" ></div>
                <br><br>
                <div  id="upload">	
                    <input type="submit" value="Upload" name="file" id="upload_button" class="btn btn-success" style="margin-left:0%;">	
                </div>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
				</div>

							

               
                    <div class="col-md-12"><label class="labels">User Name</label><input type="text"   name="p_uname" class="form-control" value="<?php echo $uname; ?>" required="required"></div><br>
                    <div class="col-md-12"><label class="labels">DOB</label><input type="date" class="form-control" name="p_dob" value="<?php echo $dob; ?>" required="required"></div> <br>     
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Gender</label> &nbsp&nbsp <input  type="radio" class="form-check-input"   id="femaleGender" value="Female"
                    <?php 
                        if($sex == 'Female')
                        {
                            echo "checked";
                        }
                    ?>
                     name="gender"  required="required">  &nbsp&nbsp<label class="labels">Female</label>  &nbsp&nbsp
                    <input type="radio" class="form-check-input"   id="maleGender" value="Male" 
                    <?php 
                        if($sex == 'Male')
                        {
                            echo "checked";
                        }
                    ?>
                    name="gender" required="required">  &nbsp&nbsp<label class="labels">Male</label></div>
                    <br>
                    
                    <div class="col-md-12"><br><label class="labels">Email</label><input type="text" class="form-control" name="p_email" value="<?php echo $email; ?>" disabled></div><br>
                    <div class="col-md-12"><br><label class="labels">Password</label><input type="password" class="form-control" name="p_pw" value="<?php echo $pw; ?>" required="required"></div>
                </div>

                                
                <div class="mt-3 text-center"><input  type="submit" class="btn btn-primary profile-button"  name="p_save" value= "Update" >
				&nbsp&nbsp<a id="myBtn" class="btn btn-danger">Account Delete</a></div>
            </div>
        </div>
		</form>				
			<div id="myModal" class="modal-del">
				<div class="modal-content">
					<span class="close">&times;</span>
					<form method="POST">
					<div><h3 style="color:#9f0707;">Account Delete</h3></div><br>
					<div>

					<label for="" style="font-size:18px;">Reason</label>
					<textarea class="form-control" name="reason" required></textarea>
					</div>

					<br>
					<label for="" style="font-size:18px;">Any Suggestions</label>
					<textarea class="form-control" name="sugg"></textarea><br><br>
					</form>
					<a <?php 
						$rea=$_POST['reason'];
						$sugg=$_POST['sugg'];
						
							echo 'href="delete_user.php?user_id='.$userid.'&& res='.$rea.'&& sug='.$sugg.' "';?> style=" background-color:#9f0707;padding:7px;width:20%;margin-left:80%;border-radius:7px; text-decoration:none;color:#fff;text-align:center;">Delete</a>
						
						<!-- echo 'href="delete_user.php?user_id='.$userid.'&& res='.$rea.'  "';?>><input type="submit" style=" background-color:#eb2525;padding:7px;width:100%;">Delete</a> -->
					</div>
					
					
				</div>
			</div>
</div>
        
    </div>
</div>

				
</div>
</div>




<div class="footer">

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
							
		



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

<?php
	// if(isset($_POST['btn-del']))
    // {
	// 	$res=$_POST['reason'];
	// 	$sugg=$_POST['sugg'];
	// 	$sql_del="INSERT INTO delete_user values(null,'$userid','$res','$sugg',now()) ";
    //     $res_del=mysqli_query($conn,$sql_del);
	// 	echo "<script>alert('ok')</script>";
	// 	if($res_del)
	// 	{
    //     $sql="DELETE FROM users WHERE user_id= $userid ";
    //     $res=mysqli_query($conn,$sql);
    //     echo "<script>location.replace(' pro/index2.php')</script>";
	// 	}
    // }
?>