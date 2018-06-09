<?php

    /**
     * require because we're explicitly stating that
     * this file is necessary for script to run.
     *
     */
    require "config.php";

    // $connection = new PDO(data source name, username, password, options);

    // $connection = new PDO("mysql:host=localhost", "root", "root",
    //     array (
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    //     );
    // );
    try {
        $connection = new PDO("mysql:host=$host", $username, $password, $options);
        $sql = file_get_contents("data/init.sql");
        $connection -> exec($sql);

        echo "Database and table users created successfully.";
    } catch (PDOException $error) {
        echo $sql. "<br>". $error -> getMessage();
    }




?>
