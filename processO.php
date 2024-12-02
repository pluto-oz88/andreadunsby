<?php
session_start();
// Check if the 'phoneO' parameter is provided
if (isset($_GET['phoneO'])) {
  $phoneO = $_GET['phoneO'];

  // Validate the orientation value
  if (!in_array($phoneO, ['portrait', 'landscape'])) {
    http_response_code(400);
    echo "Invalid orientation value.";
    exit;
  }

  // Return the validated orientation
  echo "The device is currently in <strong>" . htmlspecialchars($phoneO) . "</strong> mode.";
  $_SESSION['orientation'] = htmlspecialchars($phoneO);
} else {
  http_response_code(400);
  echo "No orientation value provided.";
}
