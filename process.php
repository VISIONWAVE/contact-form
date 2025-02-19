<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.php?status=error");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?status=error");
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2;///Enable debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'olayemiseunpaul@gmail.com'; // Change to your email
        $mail->Password = 'mnco gfxt llhl ykfz '; // Use generated App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('visionwave0@gmail.com'); // Change to your recipient email
        $mail->Subject = "New Contact Message from $name";
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        if ($mail->send()) {
            header("Location: index.php?status=success");
            exit();
        } else {
            header("Location: index.php?status=error");
            exit();
        }
    } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo; // Show exact error
    exit();
}
} else {
    header("Location: index.php?status=error");
    exit();
}
