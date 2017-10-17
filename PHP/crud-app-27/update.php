<?php
if (isset($_POST['update'])) {
  $id = mysqli_real_escape_string($mysqli, $_POST["id"]);
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $age = mysqli_real_escape_string($mysqli, $_POST['age']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);

  if (empty($name) || empty($age) || empty($email)) {
    if (empty($name)) {
      echo '<div class="alert alert-danger" role="alert"><span class="alert-link">Name</span> field is empty.</div>';
    }
    if (empty($age)) {
      echo '<div class="alert alert-danger" role="alert"><span class="alert-link">Age</span> field is empty.</div>';
    }
    if (empty($email)) {
      echo '<div class="alert alert-danger" role="alert"><span class="alert-link">Email</span> field is empty.</div>';
    }
  } else {
    $result = mysqli_query($mysqli, "UPDATE crud_app_27 SET name='$name', age='$age', email='$email' WHERE id=$id");

    header("Location: index.php");
  }
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT FROM crud_app_27 WHERE id = $id");

while ($res = mysqli_fetch_array($result)) {
  $name = $res['name'];
  $age = $res['age'];
  $email = $res['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <a href="index.php">Home</a>

      <form action="edit.php" method="post" name="form1">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" class="form-control" id="age" name="age" value="<?php echo $age;?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $email;?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <input type="submit" name="update" class="btn btn-primary" value="Update">
      </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
