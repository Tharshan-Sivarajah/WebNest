<?php 
	if(isset($_POST['text']))
		{
			$text=$_POST['text'];

			$po_sql="INSERT INTO post(user_id,post_text,created_at)VALUES($userid,'$text',now())";
			$po_res=mysqli_query($conn,$po_sql);
		}
?>