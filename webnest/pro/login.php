<?php
	include("wnlogin.php");
	include("wnsignup.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebNest</title>
    <LINK REL="SHORTCUT ICON" HREF="fb_title_icon/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;
    background-color:#01112d;
    display: flex;
    justify-content:center;
    align-items:center;
    height:90vh;
}

/* Full-width input fields */
input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #172b4d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius:20px;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
 
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}



/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

.Regs{
  margin-left:35%;
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }

}
</style>
</head>
<body>

<br><br>
<div class="container">
  <div >
    <div class="col-12 col-sm-8 col-md-6 m-auto" style="background:#eee;border-radius:6px;box-shadow:0 8px 16px rgba(0,0,0,.5);">
  
        <form action="" method="post">
            <div class="imgcontainer"><br>
            <img src="logb.png" alt="Logo" class="avatar">
            </div>

            <div class="container">
            <label><b>Email</b></label>
            <input type="email" name="username" placeholder="Enter Email" class="form-control" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                
            <button type="submit" name="Login"  id="login_button">Login</button><br>
             <span class="Regs"><a href="index2.php">Create New Account</a></span>
            
            <div class="container">
            <span >Forgot <a href="password-recovery.php">password?</a></span>
            </div>
            </div>

            
        </form>
    </div>
  </div>
</div>


</body>
</html>