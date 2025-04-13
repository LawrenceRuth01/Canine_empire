<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $emailad = filter_input(INPUT_POST, 'emailad', FILTER_SANITIZE_EMAIL);
    $phoneno = filter_input(INPUT_POST, 'phoneno', FILTER_SANITIZE_STRING);
    $enquiries = filter_input(INPUT_POST, 'enquries', FILTER_SANITIZE_STRING);
    
    $toEmail = "ruthlawrence054@gmail.com";
    $subject = "New Contact Form Submission";

    $fromEmail = "ruthlawrence054@gmail.com"; 

    $mailHeaders = "From: Website Contact Form <$fromEmail>\r\n";
    $mailHeaders .= "Reply-To: $emailad\r\n";
    $mailHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";
    

    $emailBody = "First Name: $fname\n";
    $emailBody .= "Last Name: $lname\n";
    $emailBody .= "Email: $emailad\n";
    $emailBody .= "Phone Number: $phoneno\n";
    $emailBody .= "Enquiry:\n$enquiries\n";

 
    if (mail($toEmail, $subject, $emailBody, $mailHeaders)) {
        echo "Thank you for your message. We'll get back to you soon!";
    } else {
        echo "There was a problem sending your message. Please try again later.";
    }
    exit;
}
?>
