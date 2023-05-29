<?php
session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$user=$_SESSION['fbuser'];
       
		include "../db-connect.php";

		
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <style>
    table {
    border-collapse: collapse;
    width: 90%;
    margin-left:5%;
      
    }

    th{
        color:#fff;
    }

    th{     
        text-align: left;
        padding: 8px;
    }

    td{
        text-align: left;
        padding: 8px;
    }

    .uth{
        text-align: center;
    }

    .uid{
        text-align: center;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}

    .user{
        margin-top:7%;
        background:#0f3460;
        padding:1%;
        width:50%; 
        margin-left:25%;  
        border-radius: 10px;
    }

    @media(max-width: 600px){
     .user{
         margin-top:40%;
         padding:3%;
         width:90%;
         margin-left:5%;   
     }
    }
</style>
</head>
<body>

    
        <div class="user">
            <h1 align="center" style="color:#fff; ">Feedback Information</h1>
        </div><br><br>

            <div>
                <table >
                    <tr style="background:#16213e;" >
                        <th class="uth">Feedback Id</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Feedback</th>
                        <th>Date</th>
                    </tr>
                
                    <?php
                        $sql="SELECT *  FROM feedback";
                        $res_user=mysqli_query($conn,$sql);
                
                    while($row=mysqli_fetch_array( $res_user))
                    {
                        echo "<tr><td class='uid'>".$row['feedback_id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td> ";
                        echo "<td>".$row['feedback_t']."</td> ";
                        echo "<td>".$row['date']."</td>";
                        
                    }
                    ?>
                </table>
            </div>
   
</body>
</html>

<?php
	}
	else
	{
        echo "<script>location.replace('pro/index2.php')</script>";
	}
?>