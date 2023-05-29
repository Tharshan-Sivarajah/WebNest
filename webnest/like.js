$(document).ready(function(){

    // when the user click the like button of a post
    $('.like-btn').on('click',function(){
        var post_id= $(this).data('id');
        $clicked_btn= $(this);

        //for the like button, you can only like or unlike
        if($clicked_btn.hasClass('fa fa-thumbs-o-up')){
            action = 'like';

        }else if ($clicked_btn.hasClass('fa fa-thumbs-up')){
            action= 'unlike';
        }

        $.ajax({
            url: 'viewpost.php',
            type: 'post',
            data: {
                'action': action,
                'post_id': post_id
            },
            success: function(data){
                    res= JSON.parse(data);

                    if(action == 'like'){
                        $clicked_btn.removeClass('fa fa-thumbs-o-up');
                        $clicked_btn.addClass('fa fa-thumbs-up');
        
                    }else if(action == 'unlike'){
                        $clicked_btn.removeClass('fa fa-thumbs-up');
                        $clicked_btn.addClass('fa fa-thumbs-o-up');
                    }

                    //display number of likes
                   $clicked_btn.siblings('span.likes').text(res.likes);
            }
        })

    });


});















/*<?php
     
    $con=mysqli_connect("localhost","root","","webnest");
    if(!$con)
    {
        die(mysqli_error($con));
    }

   //print_r($_POST);

  
?>*/