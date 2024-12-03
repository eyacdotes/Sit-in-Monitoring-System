<?php
include 'connector_db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the announcement content
    $announcement = $_POST['announcement'];

    // Insert announcement into the database
    $sql = "INSERT INTO announcements (announcement) VALUES ('$announcement')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the admin panel
        header("Location: admin-post.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
