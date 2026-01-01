<?php
// submit_feedback.php
header('Content-Type: application/json');
require_once __DIR__ . '/include/config.php';

function respond($ok, $msg) {
  echo json_encode(['ok' => $ok, 'message' => $msg]);
  exit;
}

$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$form_type  = isset($_POST['form_type']) ? strtolower(trim($_POST['form_type'])) : '';
$name       = isset($_POST['name']) ? trim($_POST['name']) : '';
$email      = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone      = isset($_POST['number']) ? trim($_POST['number']) : '';
$message    = isset($_POST['message']) ? trim($_POST['message']) : '';
$rating     = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

if ($product_id <= 0) respond(false, 'Invalid product');
if ($name === '') respond(false, 'Name required');
if ($form_type === 'comment' && $message === '') respond(false, 'Comment required');
if ($form_type === 'review' && ($message === '' || $rating < 1 || $rating > 5)) respond(false, 'Review and rating required');

// Ensure tables exist
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS product_comments (id INT AUTO_INCREMENT PRIMARY KEY, product_id INT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(150) NULL, phone VARCHAR(30) NULL, message TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, INDEX(product_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS product_reviews (id INT AUTO_INCREMENT PRIMARY KEY, product_id INT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(150) NULL, phone VARCHAR(30) NULL, rating TINYINT NOT NULL, review TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, INDEX(product_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

if ($form_type === 'comment') {
  $stmt = mysqli_prepare($conn, 'INSERT INTO product_comments (product_id, name, email, phone, message) VALUES (?,?,?,?,?)');
  if (!$stmt) respond(false, 'DB error');
  mysqli_stmt_bind_param($stmt, 'issss', $product_id, $name, $email, $phone, $message);
  $ok = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  respond($ok, $ok ? 'Comment submitted' : 'Failed to submit');
}

if ($form_type === 'review') {
  $stmt = mysqli_prepare($conn, 'INSERT INTO product_reviews (product_id, name, email, phone, rating, review) VALUES (?,?,?,?,?,?)');
  if (!$stmt) respond(false, 'DB error');
  mysqli_stmt_bind_param($stmt, 'isssis', $product_id, $name, $email, $phone, $rating, $message);
  $ok = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  respond($ok, $ok ? 'Review submitted' : 'Failed to submit');
}

respond(false, 'Unknown form type');
