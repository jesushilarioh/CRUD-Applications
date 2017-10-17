<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <?php
    include_once 'config.php';

    if (isset($_POST['Submit'])) {
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
        echo "<br><a href='javascript:self.history.back();'>Go Back</a>";
      } else {
        $result = mysqli_query($mysqli, "INSERT INTO crud_app_27(name, age, email) VALUES('$name', '$age', '$email')");

        echo '<div class="alert alert-success" role="alert">User entered successfully.</div>';
        echo '<br><a href="index.php">View Result</a>';
      }
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
