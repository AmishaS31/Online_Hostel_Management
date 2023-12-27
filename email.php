<?php
$to = 'mohammad4nadde05@email.com';
$subject = 'greeting';
$message = 'Hi Jane'; 
$from = 'amreenb653@email.com';
 
// Sending email
if(mail($to, $subject, $message)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>