<?php 
  session_start();
  include_once "php/config.php";
  
?>


<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>


   <?php 
   $sql4="SELECT image FROM user_profile_pic WHERE 	user_id={$row['user_id']}";
   $res=mysqli_query($conn,$sql4);
   $row3=mysqli_fetch_assoc($res);
            
          ?>





        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>


        <img src="../profile_Image/<?php echo $row3['image']; ?>" alt="">	
        
        <div class="details">
          <span><?php echo $row['Name']?></span>
          
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
