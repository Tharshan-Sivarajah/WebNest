


<?php


    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['user_id']}
                OR outgoing_msg_id = {$row['user_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        
        $row2 = mysqli_fetch_assoc($query2);

       $sql4="SELECT image FROM user_profile_pic WHERE 	user_id={$row['user_id']}";
       $res=mysqli_query($conn,$sql4);
       $row3=mysqli_fetch_assoc($res);
          
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "...NewMessage:";
        }else{
            $you = "";
        }
        
        ($outgoing_id == $row['user_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['user_id'] .'">
                    <div class="content"><img src="php/images/'.$row3['image'].'"><div class="details">
                        <span>'. $row['Name'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                  
                </a>';
    }
?>





