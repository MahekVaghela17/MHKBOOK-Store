<?php
session_start();
include_once('include/config.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$qty = isset($_GET['qty']) ? max(1, (int)$_GET['qty']) : 1;

if ($id > 0) {
  // Validate product exists
  $res = mysqli_query($conn, "SELECT id, productname, productprice, image FROM products WHERE id = " . $id);
  if ($res && mysqli_num_rows($res) === 1) {
    if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }
    if (!isset($_SESSION['cart'][$id])) { $_SESSION['cart'][$id] = 0; }
    $_SESSION['cart'][$id] += $qty;
    $_SESSION['flash'] = 'Added to cart';
    header('Location: cart.php');
    exit;
  }
}

// Fallback: back to previous page if available
$back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'category.php';
header('Location: ' . $back);
exit;
