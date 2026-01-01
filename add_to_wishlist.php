<?php
session_start();
include_once('include/config.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
  // Validate product exists
  $res = mysqli_query($conn, "SELECT id FROM products WHERE id = " . $id);
  if ($res && mysqli_num_rows($res) === 1) {
    if (!isset($_SESSION['wishlist'])) { $_SESSION['wishlist'] = []; }
    $_SESSION['wishlist'][$id] = true; // set-like storage
    $_SESSION['flash'] = 'Added to wishlist';
    $back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'wishlist.php';
    header('Location: ' . $back);
    exit;
  }
}

$back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'category.php';
header('Location: ' . $back);
exit;
