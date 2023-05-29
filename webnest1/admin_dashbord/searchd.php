<?php
   
  
    
    $a_id= $_SESSION['Admin_id'];
    $admin_type=$_SESSION['type'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

</head>
<style>
	table{
		border-collapse:collapse;
		margin:25px 0;
		border-radius:5px 5px 0 0;
		overflow:hidden;
		box-shadow:0 0 20px rgba(0,0,0,0.15);
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
<body>
<div class="container">
<form action="" method="post">
<center>

	
	<br><br>
	<br><br><br>
		<div align="center" style="background:#222155; padding:1%;width:50%;   border-radius: 10px;">
            <h1 align="center" style="color:#fff;">User Information</h1>
        </div><br><br>
	<br><br>
	<input type="text" name="t1" placeholder="Enter ID / Name" style="background-color:#fff;" >

	<input type="submit" name="b1" value="view records" style="background-color:#834aff;color:#fff;cursor: pointer;">

	<br>
	<br>
	<input type="submit" name="b2" style="cursor: pointer;background-color:#fff;" value="If you want to see all records click here...">


</center>
</form>
</div>
</body>
</html>






<?php


if(isset($_POST['b1']))
{

include '../db-connect.php';


	$id=$_POST['t1'];

	$sql="select * from users where user_id LIKE '%$id%' or Name LIKE '%$id%' AND Password !=''";

	$res=mysqli_query($conn,$sql);

	//print_r(mysqli_fetch_array($res,MYSQLI_BOTH));

	if(mysqli_num_rows($res)==0)
	 	{
	 		echo "<center><h3 class=text-danger>No Results</center></h3>";
	 	}
	 	else
	 	{
			echo "<center><h1>Results</h1></center>";

			echo "<center><table class=table><tr><th>User_ID</th><th>Name</th><th>E-mail</th><th>Password</th><th>Gender</th><th>DOB</th><th>Joined_Date</th><th>Operation</th></tr>";

				while ($row=mysqli_fetch_array($res,MYSQLI_NUM))
				 {
				 	echo "<tr>";
				 	echo "<td>";  
					echo $row['0'];
					echo "</td>";
					
					echo "<td>";
					echo $row['1'];
					echo "</td>";

					echo "<td>";
					echo $row['2'];
					echo "</td>";

					echo "<td>";
					echo $row['3'];
					echo "</td>";

                    echo "<td>";
					echo $row['4'];
					echo "</td>";

                    echo "<td>";
					echo $row['5'];
					echo "</td>";

					echo "<td>";
					echo $row['6'];
					echo "</td>";

                    echo "<td>";
					if($admin_type=='S')
					{
						echo "<a href='delete_account.php?adid=".$row['0']."'><span style='color:#fff;background-color:#a40a12;padding:6px;border-radius:5px;'>Delete</span></a>"; 
					}
					else{
					echo "<a href='delete_account.php?adid=".$row['0']."' style='pointer-events: none; cursor: default;'><span style='color:#a40a12;'>Delete</span></a>";
					}
					echo "</td></tr>";

					
					
				}
			

			echo "</table></center>";

		}

}
?>

<?php


if(isset($_POST['b2']))
{

//$host="fdb28.awardspace.net";
//$us="4190306_db";
//$pw="tharshan99";
//$db="4190306_db";


include '../db-connect.php';


	$sql="select * from users where Password !=''";

	$res=mysqli_query($conn,$sql);

	//print_r(mysqli_fetch_array($res,MYSQLI_BOTH));

	//echo "<center><h1>Your records</h1></center>";

	echo "<center><table class=table><tr><th>User_ID</th><th>Name</th><th>E-mail</th><th>Password</th><th>Gender</th><th>DOB</th><th>Joined_Date</th><th>Operation</th></tr>";

	while ($row=mysqli_fetch_array($res,MYSQLI_NUM))
	 {
		
	 	echo "<tr><td>";
		echo $row['0'];
		echo "</td>";
		
		echo "<td>";
		echo $row['1'];
		echo "</td>";

		echo "<td>";
		echo $row['2'];
		echo "</td>";

		echo "<td>";
		echo $row['3'];
		echo "</td>";

        echo "<td>";
		echo $row['4'];
		echo "</td>";

        echo "<td>";
		echo $row['5'];
		echo "</td>";

		echo "<td>";
		echo $row['6'];
		echo "</td>";

        echo "<td>";
		if($admin_type=='S')
		{
			echo "<a href='delete_account.php?adid=".$row['0']."'><span style='color:#fff;background-color:#a40a12;padding:6px;border-radius:5px;'>Delete</span></a>"; 
		}
		else{
		echo "<a href='delete_account.php?adid=".$row['0']."' style='pointer-events: none; cursor: default;color:#a40a12;'>Delete</a>";
		}
        echo "</td></tr>";


		

		
		
	}

	echo "</table></center>";

}
?>


