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



    require_once "Mail.php";

    $from = 'johangideon007@gmail.com';
    $to = 'johan_gideon@yahoo.com';
    $subject = 'Hi!';
    $body = "Hi,\n\nHow are you?";

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => 'johndoe@gmail.com',
            'password' => 'passwordxxx'
        ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p>Message successfully sent!</p>');
    }


?>