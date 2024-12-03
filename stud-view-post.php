<?php
include 'connector_db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: red;
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 18px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
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
        .announcement-container {
    text-align: left; /* Align text to the left */
}

.announcement-item {
    font-size: 16px;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.announcement-time {
    font-size: 14px;
    color: #888; /* Grey color for time */
}

.announcement-admin {
    font-style: italic; /* Italicize admin name */
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Student Panel</h1>
        <h2>Announcements!!</h2>
        <div class="announcement-container">
    <ul>
        <?php
        // Retrieve announcements from the database
        $sql = "SELECT * FROM announcements";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li class='announcement-item'>";
                echo "<span>" . $row["announcement"] . "</span><br>"; // Announcement text
                echo "<span class='announcement-time'>" . $row["created_at"] . "</span><br><br>"; // Announcement time
                echo "<span class='announcement-admin'>By Admin ffej</span>"; // Admin name
                echo "</li>";
            }
        } else {
            echo "<li class='announcement-item'>No announcements</li>";
        }
        ?>
    </ul>
</div>

        <div class="btn-container">
            <a href="studash.php" class="btn">Go to Student Dashboard</a>
        </div>
    </div>
</body>
</html>
