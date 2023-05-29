<?php
   
   include "../db-connect.php";
    
    $a_id= $_SESSION['Admin_id'];
    $a_type=$_SESSION['type'];
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
    img{
        width: 60px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>

    
        <div  style="background:#0f3460;; padding:1%;width:50%; margin-left:25%;  border-radius: 10px;">
            <h1 align="center" style="color:#fff;">Post Information</h1>
        </div><br><br>

            <div>
                <table >
                    <tr style="background:#16213e;" >
                        <th class="uth">Post Id</th>
                        <th>User Id</th>
                        <th class="uth">Post Image</th>
                        <th>Post Text</th>
                        <th>Date & Time</th>
                        <th>Operation</th>
                    </tr>
                
                    <?php
                        $sql="SELECT *  FROM post";
                        $res_user=mysqli_query($conn,$sql);
                
                    while($row=mysqli_fetch_array( $res_user))
                    {
                        echo "<tr><td class='uid'>".$row['post_id']."</td>";
                        echo "<td>".$row['user_id']."</td>";
                        ?>
                        <td class="uth"><img src="../image/<?php echo $row['post_img']; ?>"></td>
                        <?php
                        echo "<td>".$row['post_text']."</td>";
                        echo "<td>".$row['created_at']."</td>";
                        if( $a_type=='S'){
                        echo "<td><a href='delete_post.php?post_id=".$row['post_id']."' style='padding:5px;background:#980e24;color:#fff;border-radius:6px;'>Delete</a></td></tr>";
                        }else
                        {
                            echo "<td><a href='delete_post.php?post_id=".$row['post_id']."' style='padding:5px;background:#980e24;color:#fff;border-radius:6px;pointer-events: none; cursor: default;'>Delete</a></td></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
   
</body>
</html>