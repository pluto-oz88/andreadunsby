<?php
session_start();
require "db.php";
$orientation = $_COOKIE['device_orientation'] ?? 'unknown';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slideshow</title>
  <script src="js/detectOI.js" defer></script>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

<!-- <div class="sessionv">
      <?php
      //$printR = print_r($_SESSION, true);
      //echo str_replace('[', '<br>[', $printR);
      ?>
</div> -->

  <div id="infobox">
    <div class="row1"></div>
    <div class="row2"></div>
    <div class="row3"></div>
    <div class="row4"></div>
  </div>
  <?php
  $path = '/photos/bground/';
  $sql = "SELECT * FROM picsdb WHERE showpic = 1 AND orient = '$orientation'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
  ?>
    <div id="slider">
      <?php

      while ($row = mysqli_fetch_assoc($result)) {
        $picname = $row['picname'];

      ?>
        <div class="slide <?php echo $row['orient']; ?>" style="background-image: url(<?php echo $path . $picname; ?>)"></div>
        <div class="fname"><?php echo $row['showname'] ? $row['picname'] : ''; ?></div>
        <div class="fdate"><?php echo $row['showdate'] ? $row['date'] : ''; ?></div>
        <div class="ftext"><?php echo $row['showtext'] ? $row['text'] : ''; ?></div>
        <div class="fdesc"><?php echo $row['showdesc'] ? $row['description'] : ''; ?></div>
      <?php
      }
      ?>
      <div id="scount"></div>
      <a class="button" href="page2.php">Find out more</a>
      <a class="button" href="flipcard.php">sales squares</a>
    </div>

  <?php
  } else {
    echo "0 results";
  }
  mysqli_close($conn);
  ?>

  <script src="js/slideshow.js"></script>

</body>

</html>