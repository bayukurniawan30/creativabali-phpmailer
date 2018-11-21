<?php

require __DIR__.'/../phpmailer/PHPMailerAutoload.php';

$username  = 'Username or Email here';
$password  = 'Password email';

$from      = 'Sender here';
$fromName  = 'Sender name';
$address   = 'Address here';
$replyTo   = 'Reply to';
$replyName = 'Reply name';

$subject   = 'Subject here';
$content   = 'Your message here';

$mail = new PHPMailer;
$mail->SMTPDebug = 2;                              
$mail->isSMTP();                                      
$mail->Host = 'srv40.niagahoster.com';  
$mail->SMTPAuth = true;                             
$mail->Username = $username;                 
$mail->Password = $password;                         
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
); 
$mail->From = $from;
$mail->FromName = $fromName;
$mail->addAddress($address);     // Add a recipient
$mail->addReplyTo($replyTo, $replyName);
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $content;
if($mail->send()) {
	echo 'email sent';
}
else {
	echo 'failed';
}

?>