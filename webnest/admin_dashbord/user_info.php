<?php
session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$user=$_SESSION['fbuser'];
       
		include "../db-connect.php";

		$query1=mysqli_query($conn,"select * from wnadmin where email='$user'");
		$rec1=mysqli_fetch_array($query1);
		$userid=$rec1[0];
    $type=$rec1[11];

    $query2=mysqli_query($conn,"select * from admin_image where u_email='$user'");
		$rec2=mysqli_fetch_array($query2);
    $pic=$rec2[2];


    $_SESSION['type']=$type;

		$_SESSION['Admin_id']= $userid;
		
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Dashboard </title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
</head>

<style>
		
    .main-nav--bg{
      position: fixed;
      width:100%;
    }
    @media(max-width: 600px){
     
    .main-nav--bg{
      position: fixed;
      width:75%;
    }
      
    }
		
	</style>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
        <img src="logowt.png" class="icon" height="50" width="50" >
            <span class="logo-wrapper" ></span>
                
                <div class="logo-text">
                    <span class="logo-title">WebNest</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="super_admin.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Posts
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="display_post.php">All Posts</a>
                        </li>

                        <li>
                            <a href="post_details.php">Posts Details</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a  href="user_info.php">
                    <span class="icon user-3" aria-hidden="true"></span>User Accounts
                        
                    </a>
                    
                </li>

                <li>
                    <a  href="report_view.php">
                    <span class="icon document" aria-hidden="true"></span>Report &nbsp<div><span style="background-color:#cd1e4b;padding:5px;border-radius:20px;" id="re-count">0</span></div>    
                    </a>
                    
                </li>

                <li>
                    <a  href="feedback.php">
                    <span class="icon document" aria-hidden="true"></span>Feedback &nbsp<div><span style="background-color:#cd1e4b;padding:5px;border-radius:20px;" id="fe-count">0</span></div>   
                    </a>
                    
                </li>
                
                <li>
                    <a  href="admin_info.php">
                    <span class="icon document" aria-hidden="true"></span>Admin Info   
                    </a>
                    
                </li>

               
                <li>
                <a href="ad_prof_update.php"><span class="icon setting" aria-hidden="true"></span>Account Setting</a>
                </li>

                
                <li>
                <a href="../pro/logout.php"><span class="icon setting" aria-hidden="true"></span>Logout</a>
                </li>
            </ul>
          
        </div>
    </div>
    <div class="sidebar-footer">
        
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <!-- <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div> -->
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      
      <!-- <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
          <span class="sr-only">To messages</span>
          <span class="icon notification active" aria-hidden="true"></span>
        </button>
        <ul class="users-item-dropdown notification-dropdown dropdown">
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">System just updated</span>
                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon danger">
                <i data-feather="info" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">The cache is full!</span>
                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">New Subscriber here!</span>
                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
              </div>
            </a>
          </li>
          <li>
            <a class="link-to-page" href="##">Go to Notifications page</a>
          </li>
        </ul>
      </div> -->
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span>
            <img src="admin_pic/<?php echo  $pic; ?>" alt="User name" style="border-radius:25px; width:40px;height:40px;">
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="##">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- ! Main -->
    <br>
    <div class="user_table">
     
        <?php include 'searchd.php'; ?>

  </div >
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2022 © Webnest </p>
    </div>
    <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Support</a></li>
      <li><a href="##">Puchase</a></li>
    </ul>
  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
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
  function loadDoc1() {
		setInterval(function(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("re-count").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "count_report.php", true);
			xhttp.send();

			},1000);

	}

	loadDoc1();

  
  function loadDoc() {
		setInterval(function(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("fe-count").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "count_feedback.php", true);
			xhttp.send();

			},1000);

	}

	loadDoc();

</script>