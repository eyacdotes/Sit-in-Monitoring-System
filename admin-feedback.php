<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Feedback</title>
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
            overflow-y: auto; /* Enable vertical scrolling */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .feedback-container {
            width: 80%; /* Adjust as needed */
            max-height: 80vh; /* Set maximum height to 80% of viewport height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        .feedback-card {
            width: 80%;
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feedback-date {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .student-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .feedback-text {
            margin-bottom: 10px;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>View Feedback</h1>
    <div class="feedback-container">
        <?php
        include "connector_db.php";
        $result = $conn->query("SELECT feedback_date, accinfo_firstname, accinfo_lastname, feedback_text FROM feedback
                                INNER JOIN accountinfo ON feedback.student_id = accountinfo.accinfo_id
                                ORDER BY feedback_date DESC");
        while ($row = $result->fetch_assoc()) {
        ?>
        <div class="feedback-card">
            <div class="feedback-date"><?php echo $row["feedback_date"]; ?></div>
            <div class="student-name"><?php echo $row["accinfo_firstname"] . " " . $row["accinfo_lastname"]; ?></div><br>
            <div class="feedback-text"><?php echo $row["feedback_text"]; ?></div>
        </div>
        <?php
        }
        $conn->close();
        ?>
    </div>
    <div class="btn-container">
        <a href="admin-staff.php" class="btn">Go to Admin Dashboard</a>
    </div>
</body>
</html>
