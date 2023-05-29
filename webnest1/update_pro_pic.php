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
		$query2=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE user_id= $userid ORDER BY profile_id DESC LIMIT 1 ");
		$rec2=mysqli_fetch_array($query2);

		$name=$rec1[1];
		$gender=$rec1[4];
		$img=$rec2[2];
    }	
?>

<?php
if(isset($_POST['file']) && ($_POST['file']=='Upload'))
{
    $path = "user_profilepic/Female/".$user."/Profile/";
    $path2 = "user_profilepic/Female/".$user."/Post/";
    $path3 = "user_profilepic/Female/".$user."/Cover/";
    mkdir($path, 0, true);
    mkdir($path2, 0, true);
    mkdir($path3, 0, true);
    
    $img_name=$_FILES['file']['name'];
    $img_tmp_name=$_FILES['file']['tmp_name'];
    $prod_img_path=$img_name;
    move_uploaded_file($img_tmp_name,"profile_Image/".$prod_img_path);
    $res=mysqli_query($conn,"insert into user_profile_pic(user_id,image) values('$userid','$img_name')");
    //$res=mysqli_query($con,"UPDATE user_profile_pic SET image= ('$userid','$img_name')");

    
   if( $res)
   {
    echo "save";
   }
   else{
        die("Database connection failed. Error: " .$this->conn->error);
   }

   echo "<script>location.replace('update_pro_pic.php')</script>";
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
 

<img class="rounded-circle mt-5" width="150px" name="pro_image" src="profile_Image/<?php echo $img; ?>"><span class="font-weight-bold"><?php echo $name ; ?></span>
<span class="text-black-50"><?php echo $user; ?></span><br>
<form method="post" enctype="multipart/form-data" name="uimg"  >
        <div >	
            <input type="file" name="file" id="img" >  
        </div>
        <br><br>
        <div  id="upload">	
            <input type="submit" value="Upload" name="file" id="upload_button" class="btn btn-success btn-md">	
        </div>
    </form>

</body>
</html>