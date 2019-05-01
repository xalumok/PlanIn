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

    $sql = "DELETE FROM tasks WHERE user_id='" . $user_id . "' AND photo_idea='" . $idea . "'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: index.php");

?>