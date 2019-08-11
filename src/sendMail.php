<?php
require_once '../vendor/autoload.php';

function sendMail($email, $subject, $body)
{
  // Create the SMTP Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('loftshool.test@gmail.com')
    ->setPassword('757test757');
  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);
  // Create a message
  $message = (new Swift_Message($subject))
    ->setFrom(['loftshool.test@gmail.com' => 'John Doe'])
    ->setTo([$email => 'A name'])
    ->setBody($body)
  ;
  // Send the message
  $mailer->send($message);
}
