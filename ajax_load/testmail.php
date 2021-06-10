<?php

// ########################################################### Do not change anything below this line ####################################################################

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/ajax_load/mail/Exception.php';

require $_SERVER['DOCUMENT_ROOT'] . '/ajax_load/mail/PHPMailer.php';

require $_SERVER['DOCUMENT_ROOT'] . '/ajax_load/mail/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP(); 

$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages

$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6

$mail->Port = 587; // TLS only

$mail->SMTPSecure = 'tls'; // ssl is deprecated

$mail->SMTPAuth = true;

$mail->Username = 'gusacbangalore@gmail.com'; // email

$mail->Password = 'tshtsstcnjjxmtok'; // password

$mail->setFrom('gusacbangalore@gmail.com', 'GUSAC - GITAM, Bangalore'); // From email and name

// ########################################################### Do not change anything above this line ####################################################################

$mail->addAddress('321810303042@gitam.in', 'Test name'); // to email and name

$mail->Subject = 'PHPMailer GMail SMTP test';

$mail->msgHTML("test body"); 
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,

$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body

// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

$mail->SMTPOptions = array(

                    'ssl' => array(

                        'verify_peer' => false,

                        'verify_peer_name' => false,

                        'allow_self_signed' => true

                    )

                );

if(!$mail->send()){

    echo "Mailer Error: " . $mail->ErrorInfo; 
    // Once working fine, remove the above line and redirect error message as "404 Error! Please try again later"

}else{

    // echo "Message sent!";
    header('Location: ../index.php');
    // This is when mail sent, redirect back to relevant page from here.

}