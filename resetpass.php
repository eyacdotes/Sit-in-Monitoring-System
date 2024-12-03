<?php
include "connector_db.php";

// Initialize variables
$idNumber = '';
$firstName = '';
$lastName = '';
$newPassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Search user
    if(isset($_POST['submit'])) {
        $userId = $_POST['user_id'];

        // Validate and sanitize input
        $userId = mysqli_real_escape_string($conn, $userId);

        // Prepare and execute the query
        $sql = "SELECT accinfo_id , accinfo_idno, accinfo_firstname, accinfo_lastname FROM accountinfo WHERE accinfo_idno = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, retrieve and store data
            $row = $result->fetch_assoc();
            $idNumber = $row['accinfo_idno'];
            $firstName = $row['accinfo_firstname'];
            $lastName = $row['accinfo_lastname'];
        } else {
            $userNotFound = true;
        }
    }
    // Handle password update
    if(isset($_POST['sitin_submit'])) {
        $newPassword = $_POST['new_password'];
        $idNumber = $_POST['id']; 

        // Validate and sanitize input
        $newPassword = mysqli_real_escape_string($conn, $newPassword);

        // Update password in the database
        $sql = "UPDATE account SET acc_password = '$newPassword' WHERE acc_id = '$idNumber'";
        if ($conn->query($sql) === TRUE) {
            // Password updated successfully
            echo "";
        } else {
            echo "" . $conn->error;
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        
        .navbar .navbar-brand {
            font-size: 1.5rem;
        }
        
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-light {
            color: #343a40;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        
        .container {
            max-width: 40%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-style: groove;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .search-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            width: 100%;
            margin-bottom: 1rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .button {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #007bff;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }
        
        .button:hover {
            background-color: #0056b3;
        }
        
        .user-not-found {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 0.25rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Reset Password</span>
        <a class="btn btn-light" href="admin-staff.php">Back</a>
    </nav>
    <div class="container">
        <h1>Reset Password</h1>
        <div class="search-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <?php if (isset($userNotFound) && $userNotFound): ?>
                    <div class="user-not-found">
                        User not found.
                    </div>
                <?php endif; ?>
                <div class="form-group search">
                    <label for="user_id">Search ID Number:</label>
                    <input type="text" id="user_id" name="user_id" placeholder="Enter ID Number...">
                    <button type="submit" name="submit" class="button">Search</button>
                </div>
                <div class="form-group">
                    <label for="idno">ID Number:</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($row['accinfo_id']) ? $row['accinfo_id'] : ''; ?>" >
                    <input type="text" disabled class="form-control" id="idno" name="idno" value="<?php echo isset($idNumber) ? $idNumber : ''; ?>" >
                </div>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" disabled class="form-control" id="fname" name="fname" value="<?php echo $firstName; ?>" >
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" disabled class="form-control" id="lname" name="lname" value="<?php echo $lastName; ?>" >
                </div>
                <div class="form-group">
                    <label for="idno">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" value="" >
                </div>
                <div class="form-buttons">
                    <button class="button" name="sitin_submit">Save Changes</button>
                    <a href="admin-staff.php" class="button btn-light">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
