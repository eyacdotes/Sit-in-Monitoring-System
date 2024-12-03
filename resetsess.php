<?php
include 'connector_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $idno = mysqli_real_escape_string($conn, $_POST['idno']); // Secure input

    // Reset remaining sessions
    $sql = "UPDATE accountinfo SET remain_ss = 30 WHERE accinfo_idno = '$idno'";
    if (mysqli_query($conn, $sql)) {
        echo "Session reset successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Fetch updated student data
    $sql = "SELECT * FROM accountinfo WHERE accinfo_idno = '$idno'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        $_SESSION['student'] = $student;
    }

    header("Location: resetsession.php");
    exit;
}
?>
