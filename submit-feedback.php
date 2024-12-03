<?php
include 'connector_db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = $_POST["feedback"];
    $student_id = $_POST["id"]; 

   
    $stmt = $conn->prepare("INSERT INTO feedback (student_id, admin_id ,feedback_text) VALUES (?, '1', ?)");
    $stmt->bind_param("is", $student_id, $feedback);
    $stmt->execute();
    $stmt->close();

    header("Location: stud-feedback.php");
    exit();
}
?>
