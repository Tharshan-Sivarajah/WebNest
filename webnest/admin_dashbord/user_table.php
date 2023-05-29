<?php
   
   include "../db-connect.php";
    
    $a_id= $_SESSION['Admin_id'];
    $admin_type=$_SESSION['type'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <style>
    table {
    border-collapse: collapse;
    width: 100%;
    
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
            <h1 align="center" style="color:#fff; ">User Information</h1>
        </div><br><br>

            <div>
                <table >
                    <tr style="background:#16213e;" >
                        <th class="uth">User Id</th>
                        <th>User Name</th>
                        <th>Date of Birth</th>
                        <th>Email Address</th>
                        <th>Operation</th>
                    </tr>
                
                    <?php
                        $sql="SELECT user_id,Name,Birthday_Date, Email  FROM users";
                        $res_user=mysqli_query($conn,$sql);
                
                    while($row=mysqli_fetch_array( $res_user))
                    {
                        echo "<tr><td class='uid'>".$row['user_id']."</td>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Birthday_Date']."</td> ";
                        echo "<td>".$row['Email']."</td>";
                        if($admin_type=='S')
                        {
                            echo "<td><a href='delete_account.php?adid=".$row['user_id']."' style='padding:5px;background:#980e24;color:#fff;border-radius:6px;'>Delete</a></td></tr></tr>"; 
                        }
                        else{
                        echo "<td><a href='delete_account.php?adid=".$row['user_id']."' style='padding:5px;background:#980e24;color:#fff;border-radius:6px; pointer-events: none; cursor: default;'>Delete</a></td></tr></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
   
</body>
</html>