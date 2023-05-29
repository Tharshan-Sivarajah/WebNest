<?php 
session_start();


if(isset($_POST['account']))
{
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $city= $_POST['city'];
    $coun= $_POST['country'];
    $add = $_POST['address'];
    $gen= $_POST['gender'];
    $mnum= $_POST['tel'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $session_name=$_POST['username'];
    $pw = $_POST['pw'];

    include '../db-connect.php';

    $sql= "INSERT INTO user(username,first_name, last_name, city, country, U_Address, gender, dob, mobile, email,  u_password) VALUES ('$session_name','$fname', '$lname', '$city', '$coun', '$add', '$gen', '$dob', '$mnum', '$email', '$pw')";
    $res=mysqli_query($con,$sql);

    if($res)
    {
        echo "<script> alert('save')</script>";
    }
    else{
        die(mysqli_error($con));
    }
}



?>







<html>
    <head>
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
   
</head>
<body>


  <div class="container py-3  shadow-lg">
        <div class="card card-registration my-4">

            <div class="card-body p-md-3 text-black">

                        <h3 class="mb-3 text-uppercase">Registration </h3>

                            <form method="post" action="">
                            
                                <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                    <label class="form-label" for="form3Example1m">First name</label>
                                    <input type="text" id="form3Example1m" class="form-control " name="fname"/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                    <label class="form-label" for="form3Example1n">Last name</label>
                                    <input type="text" id="form3Example1n" class="form-control " name="lname"/>
                                    </div>
                                </div>
                                </div>

                            
                                <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                    <label class="form-label" for="form3Example1m1">City</label>
                                    <input type="text" id="form3Example1m1" class="form-control " name="city"/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                    <label class="form-label" for="form3Example1n1">Country</label>
                                    <input type="text" id="form3Example1n1" class="form-control " name="country"/>
                                    </div>
                                </div>
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example8">Address</label>
                                <input type="text" id="form3Example8" class="form-control " name="address"/>
                                </div>

                                <div class="d-md-flex justify-content-start align-items-center mb-2 py-2">

                                <h6 class="mb-0 me-3">Gender: </h6>&nbsp&nbsp&nbsp

                                <div class="form-check form-check-inline mb-0 me-4">
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                    <input  type="radio" class="form-check-input"   id="femaleGender" value="Female" name="gender">
                                </div>

                                <div class="form-check form-check-inline mb-0 me-4">
                                    <label class="form-check-label" for="maleGender">Male</label>
                                    <input type="radio" class="form-check-input"   id="maleGender" value="Male" name="gender"/>
                                </div>
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example9">DOB</label>
                                <input type="date" id="form3Example9" class="form-control " name="dob"/>
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example9">Mobile Number</label>
                                <input type="text" id="form3Example9" class="form-control " name="tel"/>
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example97">Email ID</label>
                                <input type="text" id="form3Example97" class="form-control " name="email"/>
                                </div>

                                <div class="form-outline mb-2">
                                <label for="session_name">Username</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="session_name" name="username" required="required">
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example99">Password</label>
                                <input type="text" id="form3Example99" class="form-control " name="pw"/> 
                                </div>

                                <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example99">Confirm Password</label>
                                <input type="text" id="form3Example99" class="form-control " /> 
                                </div>

                                

                                <div class="d-flex justify-content-end pt-3">
                                <input type="reset" class="btn btn-light btn-lg" value="Reset all"> &nbsp&nbsp&nbsp&nbsp
                                <input type="submit" class="btn btn-warning btn-lg ms-2" name="account" value="Create Account">
                                </div>
                            </form>    
            </div>
                
        </div>
  </div>
<!--</section>-->

</body>
</html>


