<?php
namespace app;
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use app\Config;

require_once("../vendor/autoload.php");

class Mail
{
    public static function send($to, $subject, $text, $html)
    {
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = Config::SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = Config::SMTP_USERNAME;
        $mail->Password = Config::SMTP_PASSWORD;
        $mail->SMTPSecure = Config::SMTP_ENCRYPTION;
        $mail->Port = Config::SMTP_PORT;
        $mail->setFrom(Config::SMTP_FROM_EMAIL);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html;
        $mail->AltBody = $text;
        $mail->send();
        
    }
}