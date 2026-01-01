<?php
// product_feedback_list.php (frontend endpoint used by single-product page)
require_once __DIR__ . '/include/config.php';

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$type = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : 'comment'; // comment|review
if ($product_id <= 0) { echo ''; exit; }

// Ensure tables exist (first-run safety)
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS product_comments (id INT AUTO_INCREMENT PRIMARY KEY, product_id INT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(150) NULL, phone VARCHAR(30) NULL, message TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, INDEX(product_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS product_reviews (id INT AUTO_INCREMENT PRIMARY KEY, product_id INT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(150) NULL, phone VARCHAR(30) NULL, rating TINYINT NOT NULL, review TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, INDEX(product_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

if ($type === 'comment') {
  $q = "SELECT name, message, created_at FROM product_comments WHERE product_id = " . (int)$product_id . " ORDER BY created_at DESC LIMIT 20";
  $res = mysqli_query($conn, $q);
  if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo '<div class="media mb-3">'
         . '<div class="media-body">'
         . '<h6 class="mt-0 mb-1">' . htmlspecialchars($row['name']) . ' <small class="text-muted">' . htmlspecialchars($row['created_at']) . '</small></h6>'
         . '<p class="mb-0">' . nl2br(htmlspecialchars($row['message'])) . '</p>'
         . '</div></div>';
    }
  } else {
    echo '<p class="text-muted mb-0">No comments yet.</p>';
  }
  exit;
}

if ($type === 'review') {
  $q = "SELECT name, rating, review, created_at FROM product_reviews WHERE product_id = " . (int)$product_id . " ORDER BY created_at DESC LIMIT 20";
  $res = mysqli_query($conn, $q);
  if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $stars = str_repeat('★', max(0, (int)$row['rating'])) . str_repeat('☆', max(0, 5 - (int)$row['rating']));
      echo '<div class="media mb-3">'
         . '<div class="media-body">'
         . '<h6 class="mt-0 mb-1">' . htmlspecialchars($row['name']) . ' <small class="text-muted">' . htmlspecialchars($row['created_at']) . '</small>'
         . '<span class="ml-2 text-warning">' . $stars . '</span></h6>'
         . '<p class="mb-0">' . nl2br(htmlspecialchars($row['review'])) . '</p>'
         . '</div></div>';
    }
  } else {
    echo '<p class="text-muted mb-0">No reviews yet.</p>';
  }
  exit;
}

echo '';
