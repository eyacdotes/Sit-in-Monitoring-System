<?php
include 'connector_db.php';


$sql = "SELECT purpose, lab FROM sitin";
$result = mysqli_query($conn, $sql);

$purposes = array();
$labs = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Count purposes
        if(isset($purposes[$row["purpose"]])) {
            $purposes[$row["purpose"]] += 1;
        } else {
            $purposes[$row["purpose"]] = 1;
        }

        // Count labs
        if(isset($labs[$row["lab"]])) {
            $labs[$row["lab"]] += 1;
        } else {
            $labs[$row["lab"]] = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            justify-content: center;
            margin-top: 10px; 
            max-width: 100%;
        }
        .chart-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        canvas {
            max-width: 45%;
            height: auto;
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
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Daily Analytics and Reports</span>
        <a class="btn btn-light" href="admin-staff.php">Back</a>
    </nav>
    <div class="chart-container">
        <div class="chart-title">Lab</div>
        <canvas id="labChart"></canvas>

        <div class="chart-title">Purpose</div>
        <canvas id="purposeChart"></canvas>
    </div>

    <script>
        // Prepare data for charts
        var purposeData = <?php echo json_encode(array_values($purposes)); ?>;
        var purposeLabels = <?php echo json_encode(array_keys($purposes)); ?>;
        var labData = <?php echo json_encode(array_values($labs)); ?>;
        var labLabels = <?php echo json_encode(array_keys($labs)); ?>;

        // Create pie chart for purpose
        var purposeCtx = document.getElementById('purposeChart').getContext('2d');
        var purposeChart = new Chart(purposeCtx, {
            type: 'pie',
            data: {
                labels: purposeLabels,
                datasets: [{
                    data: purposeData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)'
                        // Add more colors if needed
                    ]
                }]
            }
        });

        // Create pie chart for lab
        var labCtx = document.getElementById('labChart').getContext('2d');
        var labChart = new Chart(labCtx, {
            type: 'pie',
            data: {
                labels: labLabels,
                datasets: [{
                    data: labData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)'
                        // Add more colors if needed
                    ]
                }]
            }
        });
    </script>
</body>
</html>

