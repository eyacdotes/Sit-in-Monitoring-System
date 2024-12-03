<?php
include 'connector_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $idno = mysqli_real_escape_string($conn, $_POST['idno']); // Secure input

    // Fetch student data
    $sql = "SELECT * FROM accountinfo WHERE accinfo_idno = '$idno'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        $_SESSION['student'] = $student;
    } else {
        echo "<div class='alert alert-danger'>Student not found.</div>";
        unset($_SESSION['student']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Session</title>
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
        
        .btn-primary, .btn-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .container {
            max-width: 90%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .student-info p {
            margin-bottom: 0.5rem;
        }

        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Reset Session</span>
        <a class="btn btn-light" href="admin-staff.php">Back</a>
    </nav>
    <div class="container">
        <h1>Search Student</h1>
        <form method="post" action="resetsession.php">
            <label for="idno">Student ID Number:</label>
            <input type="text" name="idno" id="idno" required>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <?php if (isset($_SESSION['student'])): ?>
            <div class="student-info">
                <h2>Student Information</h2>
                <p>First Name: <?php echo htmlspecialchars($_SESSION['student']['accinfo_firstname']); ?></p>
                <p>Middle Name: <?php echo htmlspecialchars($_SESSION['student']['accinfo_middlename']); ?></p>
                <p>Last Name: <?php echo htmlspecialchars($_SESSION['student']['accinfo_lastname']); ?></p>
                <p>Remaining Sessions: <?php echo htmlspecialchars($_SESSION['student']['remain_ss']); ?></p>

                <form method="post" action="resetsess.php">
                    <input type="hidden" name="idno" value="<?php echo htmlspecialchars($_SESSION['student']['accinfo_idno']); ?>">
                    <button type="submit" name="reset" class="btn btn-primary">Reset Session to 30</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
