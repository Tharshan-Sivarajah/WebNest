<?php  
   include "../db-connect.php";
   session_start(); 
    $user=$_SESSION['fbuser'];

$sql= "SELECT * FROM wnadmin WHERE email = '$user ' ";
    $res= mysqli_query($conn,$sql);
       
      $row= mysqli_fetch_assoc($res);
        $fname= $row['F_Name'];
        $lname= $row['last_name'];
        $city= $row['city'];
        $country= $row['country'];
        $address= $row['a_address'];
        $mobile= $row['mobile'];
        $password= $row['ad_pw'];
        $gender= $row['gender'];
        $dob= $row['dob'];
        $email= $row['email'];

    $sql="SELECT * FROM admin_image WHERE u_email= '$user'";
        $res1= mysqli_query($conn,$sql);

        $row1=mysqli_fetch_assoc($res1);
            $img= $row1['pic'];


            if(isset($_POST['save']))
            {
                $ufname= $_POST['f_name'];
                $ulname= $_POST['l_name'];
                $ucity= $_POST['city'];
                $ucountry= $_POST['country'];
                $uaddress= $_POST['address'];
                $umobile= $_POST['mobile'];
                $upassword= $_POST['password'];
                $ugender= $_POST['gender'];
                
                $udob= $_POST['dob'];
		        $n=date("Y");
		        $y=$n- $udob;

                if($y>=18)
                {

                $query= "UPDATE wnadmin SET F_Name = '$ufname', last_name = '$ulname', city = '$ucity',  country = '$ucountry',a_address='$uaddress',mobile='$umobile', gender = '$ugender' , dob = '$udob' , ad_pw = '$upassword' WHERE email ='$user' ";
                $result= mysqli_query($conn,$query);
                echo "<script>location.replace('ad_prof_update.php')</script>";
                }else{
                    echo "<script>alert('user must be older than 18 years......!')</script>";
                }
        
            } 

            if(isset($_POST['file']) && ($_POST['file']=='Upload'))
             {
                    
                    
                    $img_name=$_FILES['file']['name'];
                    $img_tmp_name=$_FILES['file']['tmp_name'];
                    $prod_img_path=$img_name;
                    move_uploaded_file($img_tmp_name,"admin_pic/".$prod_img_path);
                    $res=mysqli_query($conn,"UPDATE admin_image SET pic='$img_name' WHERE u_email='$email' ");
                    echo "<script>location.replace('ad_prof_update.php')</script>";
                   
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<div>
        <form method="post" enctype="multipart/form-data">
                <div class="container rounded  mt-3 mb-3" style="margin-left:5%;background:#e5e5f5;width:90%;border-radius:10px;">
            <div class="row">
                <div class="col-md-5 border-right"><br><br><br><br><br><br>
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="200px" height="200px;" style="border-radius:100px;margin-left:20%;" name="image" src="admin_pic/<?php echo $img; ?>" id="pic" ><br>
                        <span class="text-black-50" style="margin-left:30%;"><?php echo $email; ?></span><br><span style="margin-left:30%;">
                        <br><br><div><input type="file" name="file"  id="img" ></div>
                        <br><br>
                        <div  id="upload">	
                            <input type="submit" value="Upload" name="file" id="upload_button"  style="margin-left:0%;background-color:#0061f7;margin-left:35%;color:#fff;cursor: pointer;">	
                        </div>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5">
                        <br>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            
                        </div>
                        <br>
                       
                            <div class="col-md-12"><label class="labels">First Name</label><input type="text" style="margin-left:5%;"  name="f_name" class="form-control" value="<?php echo $fname; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">Last Name</label><input type="text" style="margin-left:5%;"  name="l_name" class="form-control" value="<?php echo $lname; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">City</label><input type="text" style="margin-left:11%;"  name="city" class="form-control" value="<?php echo $city; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">Country</label><input type="text" style="margin-left:7.5%;"  name="country" class="form-control" value="<?php echo $country; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" style="margin-left:7.5%;"  name="address" class="form-control" value="<?php echo $address; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">Mobile</label><input type="text" style="margin-left:8.5%;"  name="mobile" class="form-control" value="<?php echo $mobile; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">Password</label><input type="password" style="margin-left:5.5%;"  name="password" class="form-control" value="<?php echo $password; ?>" required="required"></div><br>
                            <div class="col-md-12"><label class="labels">DOB</label><input type="date" style="margin-left:10.5%;" class="form-control" name="dob" value="<?php echo $dob; ?>" required="required"></div> <br>     
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Gender</label> &nbsp&nbsp <input style="margin-left:8%;"  type="radio" class="form-check-input"   id="femaleGender" value="Female"
                            <?php 
                                if($gender == 'Female')
                                {
                                    echo "checked";
                                }
                            ?>
                            name="gender"  required="required">  &nbsp&nbsp<label class="labels">Female</label>  &nbsp&nbsp
                            <input type="radio" class="form-check-input"   id="maleGender" value="Male" 
                            <?php 
                                if($gender == 'Male')
                                {
                                    echo "checked";
                                }
                            ?>
                            name="gender" required="required">  &nbsp&nbsp<label class="labels">Male</label></div>
                            <br>
                            
                            
                        </div> 

                          <br> <br>             
                        <div class="mt-3 text-center"><input  type="submit"  name="save" value= "Update" style="background-color:#0061f7;color:#fff;cursor:pointer;"></div>
                       
                        <br>
                    </div>
                </div>
                
            </div>
        </div>
        </form> 
</div>

<script src="pic_preview.js"></script>
</body>
</html>

