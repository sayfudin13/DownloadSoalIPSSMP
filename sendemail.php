<?php
	// header('Content-type: application/json');
	// $status = array(
	// 	'type'=>'success',
	// 	'message'=>'Email sent!'
	// );

 //    $name = @trim(stripslashes("johan")); 
 //    $email = @trim(stripslashes('johangideon007@gmail.com')); 
 //    $subject = @trim(stripslashes('nothing')); 
 //    $message = @trim(stripslashes('djbashjkdvasjhdvashjk')); 

 //    $email_from = $email;
 //    $email_to = 'johan_gideon@yahoo.com';

 //    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

 //    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

 //    echo json_encode($status);
 //    die;



    include_once('assets/phpmailer/_lib/class.phpmailer.php');
    $mail = new PHPMailer();
    // kofigurasi SMTP GMAIL$mail->IsSMTP(); // memilih pengiriman dengan metode SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "TLS";
    $mail->Host = "smtp.mail.yahoo.com"; // SMTP server
    $mail->Port = 465;
    $mail->Username = "mytemp.web@yahoo.com";
    $mail->Password = "tempjohan";
    $mail->From = "suprot@mytempweb.tk";
    $mail->FromName = "Kuda Lumping";
    $mail->Subject = "Ngetes Email";
    $body = "<h4>Hello Apa kabar</h4>";
    $body .= "<br><p>Hanya sekedar test saja</p>";
    // untuk mail klien yang tidak bisa baca format html
    $text_body = "Hello Apa kabar";
    $text_body .= "Hanya sekedar test saja";
    $mail->Body = $body;
    $mail->AltBody = $text_body;
    $mail->AddAddress("johan_gideon@yahoo.com","Johan Gideon");
    //attachment Foto
    // $mail->AddStringAttachment("images/potomu.jpg");
    if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    echo "Pesan Terkirim!";
    }


?>