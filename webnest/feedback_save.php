<?php
    session_start();
    include "db-connect.php";

    $nm= $_SESSION['fname'];
	$email=$_SESSION['femail'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['feed']))
	{
		
	
		$feedb=$_POST['ft'];
		$sqll="INSERT into feedback(name,email,feedback_t,date) values('$nm','$email','$feedb',now())";
		$suc=mysqli_query($conn,$sqll);
                
                
          


        

        

       
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';


        require 'vendor/autoload.php';





        Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
                                           
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = '';             //Your Mail       
            $mail->Password   = '';             //Your mail password                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;                                   

            //Recipients
            $mail->setFrom('', 'WebNest');  //Your Mail  
            $mail->addAddress($email);     
        
            
        $message='Hi...'.$nm.'<br> We got your valueable Feedback... <br> We are Thanking You for your Feedback. <br> Thank you....:)';
        
            Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo '
            <script>
            window.alert("Feedback has been saved...");
            </script>
            
            ';
            
            
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }      



        echo "<script>location.replace('webpro.php')</script>";


	}

?>