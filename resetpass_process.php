<?php
include 'connector_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_key = $_POST['sstd'];

    $sql = "SELECT acc_id FROM accountinfo WHERE accinfo_email = ? OR accinfo_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $search_key, $search_key);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $acc_id);

        if (mysqli_stmt_fetch($stmt)) {
            // Found the user, proceed to reset password form
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Reset Password</title>
                <!-- Include any necessary styles/scripts -->
            </head>
            <body>
                <h3>Reset Password</h3>
                <form action="resetpass_update.php" method="POST">
                    <input type="hidden" name="acc_id" value="<?php echo $acc_id; ?>">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                    <button type="submit">Reset Password</button>
                </form>
            </body>
            </html>
            <?php
        } else {
            // No user found
            header("Location: resetpass.php?error=No user found with the provided information");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error with SQL statement
        header("Location: resetpass.php?error=Error preparing SQL statement");
        exit();
    }
} else {
    // Invalid request method
    header("Location: resetpass.php?error=Invalid request method");
    exit();
}
?>
