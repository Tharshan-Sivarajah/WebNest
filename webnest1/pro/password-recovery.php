<?php
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

$mail = new PHPMailer;
if(isset($_POST['send'])){


$femail=$_POST['femail'];

$row1=mysqli_query($con,"select Email,Password,Name from users where Email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$toemail = $row2['Email'];
$fname = $row2['Name'];
$subject = "Information about your password";
$password=$row2['Password'];
$message = "Your password is ".$password;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'sarveswaranthamya@gmail.com';    // SMTP username
$mail->Password = 'dskkmovgcnxfdtah'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
$mail->setFrom('sarveswaranthamya@gmail.com','WebNest');
$mail->addAddress($toemail);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$bodyContent=$message;
$mail->Subject =$subject;
$bodyContent = 'Dear'." ".$fname;
$bodyContent .='<p>'.$message.'</p>';
$mail->Body = $bodyContent;
if(!$mail->send()) {
echo  "<script>alert('Message could not be sent');</script>";
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo  "<script>alert('Your Password has been sent Successfully');</script>";
}

}
else
{
echo "<script>alert('Email not register with us');</script>";   
}
}






?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
		
		  <LINK REL="SHORTCUT ICON" HREF="fb_title_icon/icon.ico" />
		
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>


		  
		 
<body style="background:#16213e; " >             

		<div class="container-fluid">
		
        
                <div style="margin-left:13.5%; margin-top:3%; font-size:45px; color:#FFFFFF; font-weight:bold;">WebNest</div>
            </div>
  
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">

<hr />
<h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
<div class="card-body">

<div class="small mb-3 text-muted">Enter your email address and we will send you password on your email</div>


<form method="post">
                                           
<div class="form-floating mb-3">
<input class="form-control" name="femail" type="email" placeholder="name@example.com" required />
<label for="inputEmail">Email address</label>
</div>

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="index2.php">Return to login</a>
<button class="btn btn-primary" type="submit" name="send">Send Password</button>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index2.php">Need an account? Sign up!</a></div>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
