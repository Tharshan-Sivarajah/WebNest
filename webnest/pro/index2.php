<?php

	include("wnsignup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WebNest</title>

    <LINK REL="SHORTCUT ICON" HREF="fb_title_icon/icon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="Registration_validation.js"> </script>

</head>
<body  style="background:#16213e; " >
    <div class="container-fluid">
        <div class="row" style="position:absolute;left:0%;top:0%; height:13.2%; width:100%; z-index:-1; background:#0f3460">
            <div class="col-lg-7" valign="center">
                <div style="margin-left:13.5%; margin-top:3%; font-size:45px; color:#FFFFFF; font-weight:bold;">WebNest</div>
                
            </div>

           

            <div class="col-lg-5">
 
                <div style="margin-top:5%;margin-left:70%;"><button class="btn btn-info rounded"><a href="login.php" style=" text-decoration: none;text-weight:bold;color:#fff;">Login</a></button></div> 
       
            </div>


            


        <div class="row" style="margin-top:10.2%;">
            <div class="col-lg-6" >
               
                    <div style=" color:#3B5998; font-size:28px;margin-left:15%; ">  WebNest helps you connect and share with <br> the people in your life.</div>
                    <br>
                    <br>
                    <div style="margin-left:33%;"> <img src="logowt.png" width="60%" height="60%"> </div>
             

            </div>

            <div class="col-lg-6">

               
                     <form  method="post" onSubmit="return check();" name="Reg">
                            <div style="color:#fff;font-weight:bold;font-size:25px;margin-left: 40px;">  Sign Up  </div>
                            
                            <div style="height:1; width:90%; background-color:#CCCCCC;"><hr> </div>
                            <br>
                            <table width="70%">
                                <tr >
                                    <td align="right">
                                       <span style="font-size:16px; color:#fff;padding-right: 10px;">  First Name: </span>
                                    </td>
                                    <td>
                                        <input type="text" name="first_name" class="form-control" required="required">
                                    </td>
                                    
                                </tr>

                                <tr >
                                    <td style="padding-top: 10px;padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff">  Last Name: </span>
                                    </td>
                                    <td style="padding-top: 10px;">
                                        <input type="text" name="last_name" class="form-control" required="required">
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td style="padding-top: 10px;padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff">  Your Email:  </span>
                                    </td>
                                    <td style="padding-top: 10px;">
                                        <input type="email" name="email" class="form-control" required="required">
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td style="padding-top: 10px;padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff">  Re-enter Email: </span>
                                    </td>
                                    <td style="padding-top: 10px;">
                                        <input type="text" name="remail"   class="form-control" required="required">
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td style="padding-top: 10px;padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff">  New Password:  </span>
                                    </td>
                                    <td style="padding-top: 10px;">
                                        <input type="password" name="password"  class="form-control" required="required" > 
                                    </td>
                                    
                                </tr>

                                <tr >
                                    <td style="padding-top: 10px; padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff">  I am:  </span>
                                    </td>
                                    <td style="padding-top: 10px; ">
                                        <b><input type="radio" name="sex" value="Male"  align="left" required="required"></b><span style="font-size:14px; color:#fff"> Male</span> 
                                        &nbsp <input type="radio" name="sex" value="Female"  align="right" required="required"><span style="font-size:14px; color:#fff"> Female</span>
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td style="padding-top: 10px; padding-right: 10px;" align="right">
                                        <span style="font-size:16px; color:#fff"> Date of birth:  </span>
                                    </td>
                                    <td style="padding-top: 10px; ">
                                        <input type="date" class="form-control" name="date" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td> <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-top: 10px;padding-right: 15px; " align="right">
                                        <input type="submit" name="signup" value="Sign Up" id="sign_button" class="btn btn-success rounded">
                                    </td>
                                </tr>
                            </table>

                    </form>

                <div style="position:absolute;left:57.3%; top:90%; height:1; width:385; background-color:#CCCCCC; "></div>

                



                <div>
                    <?php
                        include("fb_erorr.php");
                    ?>
                </div>

            </div>
        </div>







    </div>
    
</body>
</html>
