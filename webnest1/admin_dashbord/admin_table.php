<?php
    include "../db-connect.php";
    
    $a_id= $_SESSION['Admin_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    table{
		border-collapse:collapse;
		margin:25px 0;
		border-radius:5px 5px 0 0;
		overflow:hidden;
		box-shadow:0 0 20px rgba(0,0,0,0.15);
		width: 80%;
       
	}
	th{
		background-color:#834aff;
		color:#fff;
		text-align:left;
		font-weight:bold;
	}
	th,td{
		padding:12px 15px;
		cursor: pointer;
	}
	tr{
		border-bottom:1px solid #dddd;
	}
	tr:nth-of-type(even){
		background-color:#fef6ff;
	}
	tr:last-of-type{
		border-bottom:2px solid #834aff;
	}
	tr:hover{
		background-color:#d7bce8;
	}
</style>
</head>
<body>

        <br>
        <div  style="background:#222155;; padding:1%;width:50%; margin-left:25%; border-radius: 10px;">
            <h1 align="center" style="color:#fff;">Admin Information</h1>
        </div><br><br>

            <div>
                <table style="margin-left:10%;">
                    <tr>
                        <th class="uth">Admin Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        
                    </tr>
                
                    <?php
                        $sql="SELECT w.a_id, CONCAT(w.F_Name,' ',w.last_name) AS 'username',w.dob, w.email, w.gender,p.pic  FROM wnadmin AS w INNER JOIN admin_image AS p ON w.email= p.u_email";
                        $res=mysqli_query($conn,$sql);
                                  
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr><td class='uid'>".$row['a_id']."</td>";
                        echo "<td>".$row['username']."</td>";
                        ?>
                        <td><img src="admin_pic/<?php echo $row['pic']; ?>" style="width:50px;height:50px;border-radius:30px;"></td>
                        <?php
                        echo "<td>".$row['dob']."</td> ";
                        echo "<td>".$row['gender']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
   
</body>
</html>