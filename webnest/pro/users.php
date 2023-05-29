<?php 
  session_start();
  include"../db-connect.php";
 
?>
<?php include_once "header.php"; ?>

  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

            <?php 
            $sql3 = mysqli_query($conn, "SELECT * FROM user_profile_pic WHERE user_id = {$_SESSION['user_id']}");
            if(mysqli_num_rows($sql3) > 0){
              $row3 = mysqli_fetch_assoc($sql3);
            }
          ?>




                      <img src="../profile_Image/<?php echo $row3['image']; ?>" alt="">


          <div class="details">
            <span><?php echo $row['Name']?></span>
          </div>
        </div>
 
        <a href="../webpro.php" class="logout">Back</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
   </div>
    </section>
  </div>
  <script src="javascript/users.js"></script>

</body>
</html>
