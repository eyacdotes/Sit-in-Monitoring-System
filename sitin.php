<?php
include "connector_db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idno = $_POST["id"];
    $purpose = $_POST["purpose"];
    $lab = $_POST["lab"];
    $loginTime = date("Y-m-d H:i:s");


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO sitin (student_id , purpose , lab , login_time , logout_time ) VALUES ('$idno','$purpose', '$lab', '$loginTime', '?')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Successfully Sitin!!"); window.location.href = "search.php";</script>';
    } else {
        echo '<script>alert("Cannot Sitin!! STUDENT IS IN SESSION!!"); window.location.href = "search.php";</script>' . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}

