<!--for managing addpost--->
<?php
         session_start();
   
    class Post_cls
    {
        public function create_post($data,$imagename)
        {
            $u_id=$_SESSION['user_id'];
            
            include 'db-connect.php';

            if($imagename)
            {
                $post= $data['post_text'];
                $image_name= time().basename($imagename['name']);
                $image_dir= "image/$image_name";
                move_uploaded_file($imagename['tmp_name'],$image_dir);
               
                
                $allo=array('jpg','png','gif','jpeg');
                $post_image=$imagename['name'];
                $type=pathinfo($post_image,PATHINFO_EXTENSION);
                $size=$image_data['size']/1000;
                

                  // if($type != 'jpg' && $type != 'JPG' && $type != 'JPEG' && $type != 'jpeg' && $type != 'PNG' && $type != 'png'){
                  if(!in_array($type,$allo)) { 
                    $response="Upload only jpg, jpeg, png file...! ";
                    echo "<script>alert('$response')</script>";
                   
                  }
                  else if($size>1000){
                    $response="Upload image less then 1 mb";
                     echo "<script>alert('$response')</script>";
                  }
                  else{
                    
                   

                    $sql="INSERT INTO post(user_id,post_img,post_text) VALUES('$u_id','$image_name','$post')";
                    $res=mysqli_query($conn,$sql);
    
                    echo "<script>location.replace('webpro.php')</script>";
                  }
                
            }

        } 
        
    }




    function getpost()
    {
        include 'db-connect.php';

        $sql="SELECT user_id,post_img, post_text FROM post ORDER BY post_id DESC";
        $res=mysqli_query($conn,$sql);

        return mysqli_fetch_array($res);
       
    }

    

    
?>
