<?php
    require "../config.php";
    require "../common.php";

    if (isset($_POST['submit'])) {
        if (!hash_equals($_SESSION["csrf"], $_POST["csrf"])) die();
        try {
            $connection = new PDO($dsn, $username, $password, $options);

            // fetch data code will go here
            // Select * from users by location
            $sql = "SELECT * FROM users
                    WHERE location = :location";

            // Put $_POST into a variable
            $location = $_POST["location"];

            // Prepare, bind, and execute ($statement)
            // Initialize $statement
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(":location", $location, PDO::PARAM_STR);
            $statement -> execute();

            // fetch the ($statement) result into $result
            $result = $statement -> fetchAll();

        } catch (PDOException $error) {
            echo $sql. "<br>". $error -> getMessage();
        }
    }

?>
<?php include "templates/header.php"; ?>
<?php
    // Check if more that 0 rows exist
    if (isset($_POST["submit"])) {
        if ($result && $statement -> rowCount() > 0) { ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
        <?php foreach ($result as $row){ ?>
                <tr>
                    <td><?php echo escape($row["id"]); ?></td>
                    <td><?php echo escape($row["firstname"]); ?></td>
                    <td><?php echo escape($row["lastname"]); ?></td>
                    <td><?php echo escape($row["email"]); ?></td>
                    <td><?php echo escape($row["age"]); ?></td>
                    <td><?php echo escape($row["location"]); ?></td>
                    <td><?php echo escape($row["date"]); ?></td>
                </tr>
        <?php } ?>
                </tbody>
            </table>
    <?php } else { ?>
            <blockquote>No results found for <?php echo escape($_POST["location"]); ?>.</blockquote>
    <?php }
    } ?>

<h2>Find user based on location</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION["csrf"]); ?>">
    <label for="location">Location</label>
    <input type="text" name="location" id="location">
    <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
