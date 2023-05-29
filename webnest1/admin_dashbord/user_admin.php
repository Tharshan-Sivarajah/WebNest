<?php
session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$user=$_SESSION['fbuser'];
    $admin_type=$_SESSION['type'];

		include "../db-connect.php";

		$query1=mysqli_query($conn,"select * from wnadmin where email='$user'");
		$rec1=mysqli_fetch_array($query1);
		$userid=$rec1[0];

		$_SESSION['Admin_id']= $userid;
		$query2=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE user_id= $userid ORDER BY profile_id DESC LIMIT 1 ");
		$rec2=mysqli_fetch_array($query2);

		$name=$rec1[1];
		$img=$rec2[2];
   
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
                    <a class="active" href="admin.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
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
                            <a href="../admin_dashbord/display_post.php">All Posts</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a  href="user_info.php">
                    <span class="icon user-3" aria-hidden="true"></span>User Accounts     
                    </a>
                    
                </li>
                
            </ul>
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                
                <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon document" aria-hidden="true"></span>Admin Account
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                      <?php 
                       
                       if($admin_type=="S")
                       {
                         echo "<li>";
                             echo "<a href='admin_info.php' >Admin Info</a>";
                         echo "</li>";
                         echo "<li>";
                           echo "<a href='add_admin.php' >Add Admin</a>";
                         echo "</li>";
                       }
                       else{
                       echo "<li>";
                         echo "<a href='admin_info.php'  style='pointer-events: none; cursor: default;'>Admin Info</a>";
                       echo "</li>";
                       echo "<li>";
                         echo "<a href='add_admin.php' style='pointer-events: none; cursor: default;'>Add Admin</a>";
                       echo "</li>";
                       }
                       ?>
                          
                      </ul>
                    
                </li>
                <li>
                    <a href="../webpro.php"><span class="icon setting" aria-hidden="true"></span>Go To Timeline</a>
                </li>

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
      <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
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
      </div>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="../pro/logout.php">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                <i data-feather="bar-chart-2" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">
                  <?php
                   include "../db-connect.php";
           
                   $sql="SELECT COUNT(user_id) FROM users";
                   $res=mysqli_query($conn,$sql);
           
                   $row= mysqli_fetch_array($res);
                    echo $row[0] ;
                   ?></p>
                <p class="stat-cards-info__title">Total user</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                  </span>
                 
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                <i data-feather="file" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">
                <?php
                              
                   $sql="SELECT COUNT(post_id) FROM post";
                   $res=mysqli_query($conn,$sql);
           
                   $row= mysqli_fetch_array($res);
                    echo $row[0] ;
                   ?>
                </p>
                <p class="stat-cards-info__title">Total post</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                  </span>
                  
                </p>
              </div>
            </article>
          </div>
          
          <div class="col-md-6 col-xl-3">
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="chart">
              <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
            </div>
            <div class="users-table table-wrapper">
              
            </div>
          </div>
          <div class="col-lg-3">
            
          </div>
        </div>
      </div>
    </main>
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