<?php
     include 'db-connect.php';
?>


<div style="margin-left:10%; margin-top:5%;">
				<p style="color:#000; "><b>Friends Requests</b></p>	
			</div>
			<div>

				<table class="table table-striped table-hover">
				<?php

						$sql_frd="SELECT r.sender_acc,u.Name,up.image FROM requests AS r INNER JOIN users AS u 
								  ON r.sender_acc= u.user_id INNER JOIN user_profile_pic AS up
								  ON u.user_id= up.user_id WHERE r.reseiver_acc= $userid AND r.r_status=0";
						$do_frd=mysqli_query($conn,$sql_frd);
					if(mysqli_num_rows($do_frd)==0)
					{
						echo "<td>No Friends Requests</td>";
						
					}
					else
					{

						while($row_frd=mysqli_fetch_array($do_frd))
						{
							$res_id=$row_frd['sender_acc'];
				?>
					
							<tr>
								<td><img src="m1.png" width="30px" height="30px"></td>
								<td><?php echo $row_frd['Name']; ?> </td>
								<td></td>
								<form method="post">
								<td><input type="submit" class="btn btn-primary" value="Add Friend" name="add">
								<input type="submit" class="btn btn-primary" value="Cancel" ></td>
								</form>
							</tr>
					
					<?php
							} 
						}
					?>
				</table>
			</div>
			
			<br><br>
			<div>
				 <?php
					echo"<div>";
					$sql="select user_id,Name,Gender,Email from users";
					$do=mysqli_query($conn,$sql);
					
					

							if(mysqli_num_rows($do)==0)
							{
								echo "<center><h3 class=text-danger>No Records</center></h3>";
							}
							else
							{
								echo "<center><table class='table table-striped table-hover'><tr  style='background-color:#aeb0b1'><th>People you may know?</th><th></th><th></th></tr>";

									while ($row=mysqli_fetch_array($do))
									{
											$rid=$row['user_id'];
											$Uname= $row['Name'];
											$pic_query=mysqli_query($conn, "select * from user_profile_pic where user_id = $rid");

											$f_gen= $row['Gender'];
											$f_name= $row['Email'];
										$pic=mysqli_fetch_array( $pic_query);
										$f_img=$pic['image'];
						
										echo "<tr >";
										echo "<td><img src='pro/user_profilepic/. $f_gen./. $f_name./Profile/. $f_img .' style=width:25px; height:25px;>"; 
										echo "<span style=margin-left:10px;>". $Uname ."</span>";
										echo "</td>";
																			
										
										$sql2="select reseiver_acc from requests where sender_acc= $userid";
										$res2=mysqli_query($conn,$sql2);
										
										$row2=mysqli_fetch_array($res2);
												
												
													$get_rec=$row2['reseiver_acc'];
													
														if($get_rec==$rid)
														{
															echo"<td>";
															echo"<form method='POST' action=''>";  
															echo"<input type='submit' class='btn btn-primary' value='Request' disabled  >";
															echo"</form>";
															echo"</td></tr>";
																
														}
														else
														{
											
														echo"<td>";
														echo"<form method='POST' action=''>";  
														echo"<a href='request.php?uid=$userid&sid=$rid' class='btn btn-primary'  name='re'>Request</a>";
														echo"</form>";
														echo"</td></tr>";

														
															
														}
																				
										
										}
								
									echo "</table></center>";                        	
													
								
							}
						
					echo"</div";

				?>
				
			</div>
			</div>
	   
	   </div>
			<?php include "save_frd.php" ?>

			
		<!---------right-sidebar----------------------------------------------->
        <div class="right-sidebar" style="background:#fff; margin-top:2%;">
            <div class="sidebar-title">
                <h4 style="color:#000">Friends</h4>
            </div>

			<?php
              echo"<div>";
			  
                  $sql="SELECT u.Name,up.image FROM friends AS f 
				  		INNER JOIN users AS u
				  		ON u.user_id= f.frd_id INNER JOIN user_profile_pic AS up
				  		ON u.user_id= up.user_id WHERE f.f_user_id =$userid ";
                 		$do=mysqli_query($conn,$sql);
				 
				 

                         if(mysqli_num_rows($do)==0)
                          {
                              echo "<center><h3 class=text-danger>No Friends</center></h3>";
                          }
                          else
                          {
                              echo "<center><table class='table table-striped table-hover'>";

                                  while ($row=mysqli_fetch_array($do))
                                  {
										
										$rid=$row['frd_id'];
										$Uname= $row['Name'];

										$pic_sql="select * from user_profile_pic where user_id = '$rid ' ";
										$pic_query=mysqli_query($conn,$pic_sql);

										$f_gen= $row['Gender'];
										$f_name= $row['Email'];
									   $pic=mysqli_fetch_array( $pic_query);
									   $f_img=$pic['image'];
					
                                      echo "<tr >";
									  echo "<td><img src='pro/user_profilepic/. $f_gen./. $f_name./Profile/. $f_img .' style=width:25px; height:25px;>"; 
                                      echo "<span style=margin-left:10px;>". $Uname ."</span>";
                                      echo "</td>";
                                                                         
								
										
													echo"<td>";
													echo"<form method='POST' action=''>";  
													echo"<a  class='btn btn-primary'  name='re'>Remove</a>";
													echo"</form>";
													echo"</td></tr>";
	                                   
                                      
                                  	}
                              
                              	echo "</table></center>";                        	
												 
							
						  }
                      
              echo"</div";

			

    ?>
	<br><br>