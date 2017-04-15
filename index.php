
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD App Four - @jesushilarioh - Jesus Hilario Hernandez</title>
        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="contianer">
          <div class="">
            <h3 id="main-title" align="center">Live Table Add, Edit, and Delete using AJAX Jquery in PHP MySQL</h3>
            <div id="live_data">

            </div>
          </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script   src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            function fetch_data() {
              // READ
              $.ajax({
                url:"select.php",
                method: "POST",
                success: function(data) {
                  $('#live_data').html(data);
                }
              });
            }
            fetch_data();

            $(document).on('click', '#btn_add', function() {
              var first_name = $('#first_name').text();
              var last_name = $('#last_name').text();
              if (first_name == '') {
                alert("Enter First Name");
                return false;
              }
              if (last_name == '') {
                alert("Enter Last Name");
                return false;
              }
              // CREATE
              $.ajax({
                url: "insert.php",
                method: "POST",
                data:{first_name:first_name, last_name:last_name},
                dataType: "text",
                success: function(data) {
                  alert(data);
                  fetch_data();
                }
              })
            });

            function edit_data(id, text, column_name) {
              // UPDATE
              $.ajax({
                url: "edit.php",
                method: "POST",
                data:{id:id, text:text, column_name:column_name},
                dataType: "text",
                success: function(data) {
                  alert(data);
                }
              });
            }

            // blur event...and || hit enter event.
            $(document).on('blur', '.first_name', function() {
              var id = $(this).data("id1");
              var first_name = $(this).text();
              edit_data(id, first_name, "first_name");
            });

            $(document).on('blur', '.last_name', function() {
              var id = $(this).data("id2");
              var last_name = $(this).text();
              edit_data(id, last_name, "last_name");
            });

            $(document).on('click', ".btn_delete", function() {
                var id = $(this).data("id3");
                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data:{id:id},
                        dataType: "text",
                        success: function(data) {
                            alert(data);
                            fetch_data();
                        }
                    });
                }
            });
          });
        </script>
    </body>
</html>
