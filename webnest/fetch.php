<?php
   session_start();
   $no_user_id = $_SESSION['user_id'];
   include 'db-connect.php';


   if(isset($_POST['display'])){

      if($_POST["display"] !='')
      {
         $update_query = "UPDATE notification SET notif_status = 1 WHERE notif_status=0";
         mysqli_query($conn, $update_query);
      }

   $query = "SELECT n.notif,n.N_date,u.Name,up.image FROM notification AS n INNER JOIN users AS u 
            ON n.user_id= u.user_id INNER JOIN user_profile_pic AS up
            ON u.user_id= up.user_id WHERE n.res_id= $no_user_id  ORDER BY n.N_id DESC LIMIT 6";
            
   $result = mysqli_query($conn, $query);
 
   if(mysqli_num_rows($result) > 0)
   {
   while($row = mysqli_fetch_array($result))
   {
   ?>
      <br>
      <div id="notif-box" style="border:1px solid #cbcbcb; width:90%;padding:10px;background:#fff; border-radius:10px;">
         
         <div><img src="profile_Image/<?php echo $row['image']; ?>" style="width:35px; height:35px;border-radius:40px;">
         <span style="margin-left:10px;font-size:12px;"><?php echo $row['N_date']; ?></span><br>
         <span style="margin-left:50px;font-size:15px;"><?php echo $row['Name']; ?></span>
         <div style="margin-left:50px;"><?php echo $row['notif']; ?></div></div>
      </div>   
      

   <?php

   }
   }
  
   else{
      ?>
      <br>
      <div id="notif-box" style="border:1px solid #cbcbcb; width:90%;padding:10px;background:#fff; border-radius:10px;">
      <span >No Notifications</span>
      </div>

     <?php
   }
     exit();
   }
   
?>

