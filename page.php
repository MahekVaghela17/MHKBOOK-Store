<?php
require_once __DIR__ . '/include/config.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') {
    header('Location: index.php');
    exit;
}

$slugSql = "SELECT title, html, css FROM custom_pages WHERE slug = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $slugSql);
if (!$stmt) {
    http_response_code(500);
    echo 'Failed to load page.';
    exit;
}
mysqli_stmt_bind_param($stmt, 's', $slug);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$page = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$page) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$pageTitle = $page['title'];
$pageHtml = $page['html'];
$pageCss = $page['css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($pageTitle); ?> | MHKBook</title>
  <?php include __DIR__ . '/include/style.php'; ?>
  <?php if (!empty($pageCss)): ?>
  <style id="page-builder-css">
    <?php echo $pageCss; ?>
  </style>
  <?php endif; ?>
</head>
<body>
  <?php include __DIR__ . '/include/header.php'; ?>

  <main class="section_gap_top section_gap_bottom_custom">
    <div class="container">
      <?php echo $pageHtml; ?>
    </div>
  </main>

  <?php include __DIR__ . '/include/footer.php'; ?>
  <?php include __DIR__ . '/include/script.php'; ?>
</body>
</html>
