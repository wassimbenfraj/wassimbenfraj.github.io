<?php 

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer.php';
require 'SMTP.php';
//require 'POP3.php';
require 'form_setting.php';

    if(isset($_POST)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $messages  = "<h3>New message from the site " .$fromName. "</h3> \r\n";
        $messages .= "<ul>";
        $messages .= "<li><strong>Name: </strong>" .$name."</li>";
        $messages .= "<li><strong>Email: </strong>" .$email."</li>";
        $messages .= "<li><strong>Message: </strong>" .$message."</li>";
        $messages .= "</ul> \r\n";


        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "w3ssim220@gmail.com"; //mail
        $mail->Password = '21232168wAs'; // pass
        $mail->Port = 465; //465
        $mail->SMTPSecure = "ssl"; //ssl

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $fromName);
         $mail->addAddress("wassim.benfraj@esprit.tn"); //mail reciever

         $mail->CharSet = $charset;
        $mail->Subject = $subj;
        $mail->Body = $messages;





        if(!$mail->send()) {
            print json_encode(array('status'=>0));
        } else {
            print json_encode(array('status'=>1));
        }

    }
	
?>