<?php
include "connector_db.php";
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user']; 

  $student_id = $user['accinfo_id']; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff7e6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left; /* Align label text to the left */
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 15px;
        }

        input[type="submit"], .btne {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        input[type="submit"]:hover, .btne:hover {
            background-color: #0056b3;
        }

        .btne {
            width: 20%;
            margin-top: 20px; 
        }

    </style>
</head>
<body>
    <h1>Provide Feedback</h1>
    <form action="submit-feedback.php" method="POST">
        <label for="feedback">Add Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br>
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($student_id) ? $student_id : ''; ?>" >

        <input type="submit" value="Submit Feedback">
    </form>
    <a href="studash.php" class="btne">Go to Student Dashboard</a>
</body>
</html>
