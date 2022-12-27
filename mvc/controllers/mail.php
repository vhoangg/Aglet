<?php
// include 'mvc/PHPMailer/src/PHPMailer.php';
// include 'mvc/PHPMailer/src/Exception.php';
// include 'mvc/PHPMailer/src/OAuth.php';
// include 'mvc/PHPMailer/src/POP3.php';
// include 'mvc/PHPMailer/src/SMTP.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;



// $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
// try {
//     //Server settings
//     $mail->SMTPDebug = 0;                                 // Enable verbose debug output
//     $mail->isSMTP();                                      // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                               // Enable SMTP authentication
//     $mail->Username = 'agletstoreuit@gmail.com';                 // SMTP username
//     $mail->Password = 'khongkhoa';                           // SMTP password
//     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 587;                                    // TCP port to connect to

//     //Recipients
//     $mail->setFrom('agletstoreuit@gmail.com', 'Aglet');

//     $mail->addAddress('nhoang200260@gmail.com');               // Name is optional

//     // $mail->addReplyTo('info@example.com', 'Information');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');

//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     //Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Aglet';
//     $mail->Body    = 'Hoa don';
//     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
// }
?>
<?php

require("mvc/PHPMailer/src/PHPMailer.php");
require("mvc/PHPMailer/src/SMTP.php");
require('mvc/PHPMailer/src/Exception.php');

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "agletstoreuit@gmail.com";
$mail->Password = "jimqxpeoslapjczx";
$mail->SetFrom("agletstoreuit@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("nhoang200260@gmail.com");

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>