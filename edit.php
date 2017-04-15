<?php
  require_once('connect.php');

  $id = mysqli_real_escape_string($connect, $_POST["id"]);
  $text = mysqli_real_escape_string($connect, $_POST["text"]);
  $column_name = mysqli_real_escape_string($connect, $_POST["column_name"]);
  $sql = "UPDATE `tbl_sample` SET ".$column_name."='".$text."' WHERE id='".$id."'";

  if ($result = mysqli_query($connect, $sql)) {
      echo 'Data Updated';
  }

?>
