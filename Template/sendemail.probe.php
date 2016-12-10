<?php
$to      = 'juan.initec@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: juan.basflo@gmail.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
	echo "OK";
} else {
	echo "No OK";
}
?> 