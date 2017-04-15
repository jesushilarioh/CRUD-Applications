<?php
  require_once('connect.php');

  if(isset($_POST) && !empty($_POST)) {
    $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
    $sql = "INSERT INTO tbl_sample(first_name, last_name) VALUES ('$first_name', '$last_name')";
    if ($result = mysqli_query($connect, $sql)) {
      echo "Data Inserted!";
    }
  }
?>
