<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Đường dẫn đến autoload.php của PHPMailer

// Tạo một mã ngẫu nhiên cho việc khôi phục mật khẩu (đây là ví dụ, bạn có thể tạo mã phức tạp hơn)
$recoveryCode = bin2hex(random_bytes(8)); // Mã ngẫu nhiên 8 ký tự

// Thiết lập thông tin email
$emailTo = 'recipient@example.com'; // Địa chỉ email nhận mã khôi phục
$subject = 'Khôi phục mật khẩu';
$body = 'Mã khôi phục mật khẩu của bạn là: ' . $recoveryCode;

// Khởi tạo đối tượng PHPMailer
$mail = new PHPMailer(true);

try {
    // Cấu hình gửi email
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // Địa chỉ SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@example.com'; // Email của bạn
    $mail->Password   = 'your_password'; // Mật khẩu email
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Thiết lập thông tin gửi và nhận email
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress($emailTo);

    // Thiết lập tiêu đề và nội dung email
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    // Gửi email
    $mail->send();
    echo 'Email đã được gửi đi thành công!';
} catch (Exception $e) {
    echo "Gửi email thất bại. Lỗi: {$mail->ErrorInfo}";
}
?>
