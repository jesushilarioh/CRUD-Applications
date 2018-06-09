<?php
  include_once 'config.php';

  $result = mysqli_query($mysqli, "SELECT * FROM crud_app_27 ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="">
        <a href="create.html">Add New User</a>
      </div>
      <table class="table table-striped table-inverse">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Update</th>
          </tr>
        </thead>

        <tbody>
          <?php
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<th scope='row'>".$res['id']."</th>";
              echo "<td>".$res['name']."</td>";
              echo "<td>".$res['age']."</td>";
              echo "<td>".$res['email']."</td>";
              echo "<td><a href='update.php?id=".$res['id']."'>Edit</a> | <a href='delete.php?id=".$res['id']."' onClick='return confirm(Are you sure you want to delete?)'>Delete</a></td>";
            echo "</tr>";
          }
          ?>
          <!-- <tr>
            <th scope="row">id</th>
            <td>name</td>
            <td>age</td>
            <td>email</td>
          </tr> -->
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
