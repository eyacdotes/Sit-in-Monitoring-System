<?php
include 'connector_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acc_id = $_POST['acc_id'];
    $new_password = $_POST['new_password'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE account SET acc_password = ? WHERE acc_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $acc_id);
        mysqli_stmt_execute($stmt);

        header("Location: resetpass.php?success=Password updated successfully");
        exit();
    } else {
        header("Location: resetpass.php?error=Error updating password");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: resetpass.php?error=Invalid request method");
    exit();
}
?>
