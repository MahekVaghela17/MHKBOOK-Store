<?php
// Contact form handler: validate input, store in DB, optionally send email, then redirect with status

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Collect and sanitize
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validate
if ($name === '' || $email === '' || $subject === '' || $message === '') {
    header('Location: contact.php?status=error&msg=' . urlencode('All fields are required.'));
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.php?status=error&msg=' . urlencode('Please provide a valid email address.'));
    exit;
}

// DB: save contact message
require_once __DIR__ . '/include/config.php';

// Create table if it doesn't exist
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS contact_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  subject VARCHAR(200) NOT NULL,
  message TEXT NOT NULL,
  ip VARCHAR(45) NULL,
  user_agent VARCHAR(255) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
$ua = isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 255) : null;

$stmt = mysqli_prepare($conn, 'INSERT INTO contact_messages (name, email, subject, message, ip, user_agent) VALUES (?,?,?,?,?,?)');
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $subject, $message, $ip, $ua);
    $db_ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
} else {
    $db_ok = false;
}

if (!$db_ok) {
    header('Location: contact.php?status=error&msg=' . urlencode('Unable to save your message right now. Please try again later.'));
    exit;
}

// Prepare email (configure destination) - optional
$to = 'demo@domain.com'; // TODO: change to your recipient address
$mailSubject = 'New contact form message: ' . $subject;

$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$logo = 'img/logo.png';
$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Contact Message</title></head><body>";
$body .= "<table style='width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;'>";
$body .= "<tr><td colspan='2' style='padding:10px 0; text-align:center;'><img src='{$logo}' alt='' style='height:40px;'></td></tr>";
$body .= "<tr><td style='padding:8px; width:120px;'><strong>Name</strong></td><td style='padding:8px;'>{$safeName}</td></tr>";
$body .= "<tr><td style='padding:8px;'><strong>Email</strong></td><td style='padding:8px;'>{$safeEmail}</td></tr>";
$body .= "<tr><td style='padding:8px;'><strong>Subject</strong></td><td style='padding:8px;'>{$safeSubject}</td></tr>";
$body .= "<tr><td style='padding:8px; vertical-align:top;'><strong>Message</strong></td><td style='padding:8px;'>{$safeMessage}</td></tr>";
$body .= "</table></body></html>";

// Attempt to send email (may fail on local dev without mail setup)
@mail($to, $mailSubject, $body, $headers);

// Redirect with success
header('Location: contact.php?status=success');
exit;
?>