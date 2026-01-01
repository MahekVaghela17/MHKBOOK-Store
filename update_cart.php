<?php
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
  $current = isset($_SESSION['cart'][$id]) ? (int)$_SESSION['cart'][$id] : 0;

  switch ($action) {
    case 'inc':
      $_SESSION['cart'][$id] = $current + 1;
      break;
    case 'dec':
      $newQty = max(0, $current - 1);
      if ($newQty === 0) {
        unset($_SESSION['cart'][$id]);
      } else {
        $_SESSION['cart'][$id] = $newQty;
      }
      break;
    case 'remove':
      if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
      }
      break;
  }
}

$back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'cart.php';
header('Location: ' . $back);
exit;
?>