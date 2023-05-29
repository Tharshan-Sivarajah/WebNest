<?php
session_start();
	
		$user= $_SESSION['email'];
   
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



/* input[type=text], select, textarea {
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
}*/

input[type=submit] {
  background-color: blue;
  color: white;
  padding: 12px 30px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
 
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
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


<div class="container">
      <div > 
          <table align="center">
              <tr>
                  <td><img src="../pro/Male.jpg"> </td>  
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
       
</div>


</body>
</html>

<?php
  if(isset($_POST['file']) && ($_POST['file']=='Upload'))
  {
  
  
  $img_name=$_FILES['file']['name'];
  $img_tmp_name=$_FILES['file']['tmp_name'];
  $prod_img_path=$img_name;
  move_uploaded_file($img_tmp_name,"admin_pic/".$prod_img_path);
  $res=mysqli_query($conn,"INSERT INTO admin_image(u_email,pic ) VALUES('$user','$img_name') ");

  

      if($res)
      {
       
        echo "<script>location.replace('add_admin.php')</script>";
       
      }
      else{
        die(mysqli_error($conn));
      }
  }

?>