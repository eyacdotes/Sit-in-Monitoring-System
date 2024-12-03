<?php
include "connector_db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Check in AccountInfo table
        $sql = "SELECT * FROM Account 
                INNER JOIN AccountInfo ON Account.acc_id = AccountInfo.accinfo_id
                WHERE acc_username='$uname' AND acc_password='$pass'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['user'] = $row;
                echo '<script>alert("Login successful!"); window.location.href = "studash.php";</script>';
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($conn); // Print any errors for debugging
            exit();
        }

        // Check in Admin table if not found in AccountInfo table
        $sql_admin = "SELECT * FROM Account 
                    INNER JOIN AdminInfo ON Account.acc_id = AdminInfo.admin_id
                    WHERE acc_username='$uname' AND acc_password='$pass'";
        $result_admin = mysqli_query($conn, $sql_admin);

        if ($result_admin) {
            if (mysqli_num_rows($result_admin) > 0) {
                $row_admin = mysqli_fetch_assoc($result_admin);
                session_start();
                $_SESSION['admin'] = $row_admin;
                echo '<script>alert("Admin login successful!"); window.location.href = "admin-staff.php";</script>';
                exit();
            } else {
                header("Location: index.php?error=Invalid username or password");
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($conn); // Print any errors for debugging
            exit();
        }
    }
} else {
    header("Location: index.php?error");
    exit();
}
?>
