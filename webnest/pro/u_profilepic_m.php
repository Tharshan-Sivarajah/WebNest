<?php
	session_start();
	include"../db-connect.php";
	error_reporting(1);
	if(isset($_SESSION['tempfbuser']))
	{
		//$con=mysqli_connect("localhost","root","","webnest");
		
		$user=$_SESSION['tempfbuser'];
		$que1=mysqli_query($conn,"select * from users where Email='$user' ");
		$rec=mysqli_fetch_array($que1);
		$userid=$rec[0];
		$gender=$rec[4];
		if($gender=="Male")
		{
			$que2=mysqli_query($conn,"select * from user_profile_pic where user_id=$userid");
			$count1=mysqli_num_rows($que2);
			if($count1==0)
			{
?>
<?php

	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
				
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
    	
		move_uploaded_file($_FILES['file']['tmp_name'],"../profile_Image/$prod_img_path");
		mysqli_query($conn,"insert into user_profile_pic(user_id,image) values('$userid','$img_name')");
		
		header("location:login.php");
	} 
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Profile Upload-Male </title>
    <LINK REL="SHORTCUT ICON" HREF="fb_title_icon/icon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="step1_js/Image_check.js" language="javascript">
	</script>
</head>
<body>

<div class="container-fluid" style="background:#16213e; ">
        <div class="row" style="position:absolute;left:0%;top:0%; height:13.2%; width:100%; z-index:-1; background:#0f3460">
            <div class="col-lg-7" valign="center">
                <div style="margin-left:13.5%; margin-top:3%; font-size:45px; color:#FFFFFF; font-weight:bold;">WebNest</div>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
</div>



<div class="container bg-info" style="margin-top:10%;">
 
    <div > 
        <table align="center">
            <tr>
                <td><img src="Male.jpg" id="pic" width="250px" height="250px" style="border-radius:100px;"> </td>
            </tr>
            <tr>
                 <td style="text-transform:capitalize; font-weight:bold;" align="center" valign="center"> <b><h3><?php echo $rec[1]; ?></h3></b></td>
            </tr>
        </table> 
    </div>
    <br><br>

    <form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();" style="margin-left:20%;" >
        <div >	
            <input type="file" name="file" id="img" >  
        </div>
        <br><br>
        <div  id="upload">	
            <input type="submit" value="Upload" name="file" id="upload_button" class="btn btn-success btn-md">	
        </div>
    </form>
        <?php
            include("step1_erorr/step1_erorr.php");
        ?>

</div>
<script src="pic_preview.js"></script>
</body>
</html>
<?php
			}
			
		
		}
		else
		{
			header("location:u_profilepic_f.php");
		}
	}
	else
	{
		header("location:index2.php");
	}
?>