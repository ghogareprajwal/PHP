

<?php
use PHPMailer\PHPMailer\PHPMailer;


// Include PHPMailer library files
require 'vendor/autoload.php';

function sendOtp($email, $otp): void {
    $mail = new PHPMailer(true);
    
    
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'support@tripvista.ai'; // Your SMTP username
        $mail->Password = 'ccrrzxwdlxbdgjzg'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Email settings
        $mail->setFrom(address: 'support@tripvista.ai', name: 'Support');
        $mail->addAddress(address: $email); // Recipient's email address
        $mail->Subject = 'Resetting Your Casper Account Password!';
        $mail->Body = "Your Registration OTP is $otp. Please do not share this code with anyone.";

        // Send email
        $mail->send();
        echo "OTP sent successfully.";
   
}

function generateOTP() {
    return strval(rand(1000, 9999)); // Generate a 4-digit OTP
}

// Example usage
$email = "ghogarep2001@gmail.com";
$otp = generateOTP();
sendOtp(email: $email, otp: $otp);
?>
