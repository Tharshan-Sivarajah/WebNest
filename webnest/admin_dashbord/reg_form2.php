<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap'); </style>

<style>
* {
  box-sizing: border-box;
}



input[type=text], select, textarea {
  width: 80%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  font-family: 'Balsamiq Sans', cursive;
  background:#fff;
}

input[type=date], select, textarea {
  width: 80%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  font-family: 'Balsamiq Sans', cursive;
   background:#fff; 
}
input[type=email], select, textarea {
  width: 80%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  font-family: 'Balsamiq Sans', cursive;
  background:#fff;
}

input[type=password], select, textarea {
  width: 80%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  font-family: 'Balsamiq Sans', cursive;
  background:#fff;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-family: 'Balsamiq Sans', cursive;
}

input[type=submit] {
  background-color: blue;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-family: 'Balsamiq Sans', cursive;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container3 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 70%;
  margin-top: 7px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<div class="container3">
  <form  method="post" action="">
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text"  name="firstname" placeholder="Your name.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" name="lastname" placeholder="Your last name.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">City</label>
    </div>
    <div class="col-75">
        <input type="text"  name="city" placeholder="Your city.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Country</label>
    </div>
    <div class="col-75">
        <input type="text"  name="country" placeholder="Your country.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Address</label>
    </div>
    <div class="col-75">
        <input type="text"  name="address" placeholder="Your address.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Gender</label>
    </div>
    <div class="col-75" style="background:#fff;width:56%;" >
        <input type="radio"  name="gender" required="required" value="Male" style="margin-top:1%;"><span>Male</sapn> &nbsp&nbsp&nbsp
        <input type="radio"  name="gender" required="required" value="Female">Female
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label >Date of Birth</label>
    </div>
    <div class="col-75">
        <input type="date" name="dob" class="form-control"  required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Mobile Number</label>
    </div>
    <div class="col-75">
        <input type="text"  name="mobile" placeholder="xxxxxxxxxx" required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">E-mail ID</label>
    </div>
    <div class="col-75">
        <input type="email"  name="email" placeholder="Your address.." required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Password</label>
    </div>
    <div class="col-75">
        <input type="password"  name="pasword" placeholder="******" required="required">
    </div>
  </div>
    
  <br>
  <div class="row" alaign="right">
    <input type="submit" value="Register" name="register">
  </div>


  </form>
</div>

</body>
</html>

<?php
  if(isset($_POST['register']))
  {
    include "../db-connect.php";

      $fname=$_POST['firstname'];
      $lname=$_POST['lastname'];
      $ad_city=$_POST['city'];
      $coun=$_POST['country'];
      $add=$_POST['address'];
      $sex=$_POST['gender'];
      $adob=$_POST['dob'];
      $mob=$_POST['mobile'];
      $mail=$_POST['email'];
      $pw=$_POST['pasword'];
      
      
      $_SESSION['email']= $mail;

      $sql=" INSERT INTO wnadmin VALUES(null,'$fname','$lname','$ad_city','$coun','$add',' $mail',' $mob','$pw','$sex',' $adob','S')";
      $res=mysqli_query($conn,$sql);

      if($res)
      {

        echo "<script>location.replace('select_ad_pic.php')</script>";
       
      }
      else{
        die(mysqli_error($conn));
      }
  }

?>