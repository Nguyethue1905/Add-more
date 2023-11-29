<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './../PHPMailer-master/src/Exception.php';
require './../PHPMailer-master/src/PHPMailer.php';
require './../PHPMailer-master/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$email = $_SESSION['email'];
$randomNumber=mt_rand(1000, 99999);
$_SESSION['code'] = $randomNumber;
$emailContent = "
    <p>Xin chào,</p>
    <p>Dưới đây là mã OTP để khôi phục tài khoản của bạn:</p>
    <ul>
        <li>Email của bạn là: ".$_SESSION['email']."</li>
        <li>Mã: ".$randomNumber."</li>
    </ul>
";

try {
    //Server settings
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'huevtnpc05839@fpt.edu.vn';                     
    $mail->Password   = 'jswp psxz adag xawj';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   
    $mail->setFrom('huevtnpc05839@fpt.edu.vn', 'Reset password');
    $mail->addAddress("$email", 'Nguyệt Huế');     
    
  
    $mail->addCC('huevtnpc05839@gmail.com');

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Mã code reset password';
    $mail->Body =$emailContent; 

    $mail->send();
    echo '';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>