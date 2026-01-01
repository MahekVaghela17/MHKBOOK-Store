<?php
// visitors_log.php - lightweight request logger for frontend pages
// Assumes $conn (mysqli) is available from include/config.php

if (!isset($conn) || !($conn instanceof mysqli)) {
  // Attempt to include config if not already
  $cfg = __DIR__ . '/config.php';
  if (file_exists($cfg)) { include_once $cfg; }
}

if (isset($conn) && ($conn instanceof mysqli)) {
  // Collect values safely
  $ip   = $_SERVER['REMOTE_ADDR'] ?? '';
  $ua   = $_SERVER['HTTP_USER_AGENT'] ?? '';
  $path = $_SERVER['REQUEST_URI'] ?? '';

  // Insert with prepared statement; ignore errors silently
  if ($stmt = @mysqli_prepare($conn, 'INSERT INTO visitors (ip_address, user_agent, path) VALUES (?, ?, ?)')) {
    @mysqli_stmt_bind_param($stmt, 'sss', $ip, $ua, $path);
    @mysqli_stmt_execute($stmt);
    @mysqli_stmt_close($stmt);
  }
}
