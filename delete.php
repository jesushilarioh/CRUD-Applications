<?php
    require_once('connect.php');
    $sql = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";
    if($result = mysqli_query($connect, $sql)) {
        echo 'Data Deleted';
    } else {
        echo 'Failed To Delete Record.';
    }
?>
