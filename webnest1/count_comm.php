<?php
    include 'db-connect.php';	

    $sql="SELECT COUNT(com_id) AS 'count' FROM com WHERE p_id= $postid GROUP BY p_id ";
	$rs=mysqli_query($conn,$sql);

	while($result=mysqli_fetch_array($rs))
    {
        $data = $result
    }
    echo json_encode($data);

?>