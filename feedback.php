<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kzkarin1611@gmail.com'; 
        $mail->Password   = 'knks kjxq hjns myjw'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('kzkarin1611@gmail.com', 'Nova Beauty');
        $mail->addAddress('kzkarin1611@gmail.com'); 

        $mail->Subject = 'Новое сообщение с формы обратной связи';
        $mail->Body    = "Имя: $name\nEmail: $email\nСообщение:\n$message";

        $mail->send();
        echo 'Спасибо! Ваше сообщение отправлено.';
    } catch (Exception $e) {
        echo "Ошибка при отправке: {$mail->ErrorInfo}";
    }
}
?>
