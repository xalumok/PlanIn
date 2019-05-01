<?php
    $user_id = $_GET['user_id'];
    $idea = $_GET['idea'];
    $servername = "mysql.zzz.com.ua";
    $username = "PlanInBase";
    $password = "DeadLine77";
    $dbname = "xalumok1";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tasks
    VALUES ('" . $user_id . "', '" . $idea . "')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: index.php");

?>