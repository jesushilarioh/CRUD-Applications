<?php
    # First, tell code to run only if the form has been submitted
    if (isset($_POST['submit'])) {
        require "../config.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);

            // Insert new user code goes here
            $new_user = array (
                "firstname" => $_POST['firstname'],
                "lastname" => $_POST['lastname'],
                "email" => $_POST['email'],
                "age" => $_POST['age'],
                "location" => $_POST['location']
            );

            # execute SQL code
            // INSERT INTO users (firstname, lastname, email, age, location)
            //   values (:firstname, :lastname, ":email, :age, :location)

            $sql = sprintf( // sprintf() allows: INSERT INTO x (y) values (:z)
                "INSERT INTO %s (%s) VALUES (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":". implode(", :", array_keys($new_user))
            );

            # Prepare and execute
            $statement = $connection -> prepare($sql);
            $statement -> execute($new_user);

        } catch (PDOException $error) {
            echo $sql. "<br>". $error -> getMessage();
        }

    }

?>
<?php include "templates/header.php"; ?>
<h2>Add a user</h2>
<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <label for="age">Age</label>
    <input type="text" name="age" id="age">
    <label for="location">Location</label>
    <input type="text" name="location" id="location">
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
