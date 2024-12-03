<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendar Filter</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .calendar-filter {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        background-color: #fff;
    }

    .calendar-filter label {
        margin-bottom: 10px;
    }

    .calendar-filter input[type="date"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 200px;
    }

    .calendar-filter button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .calendar-filter button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="calendar-filter">
    <label for="start-date">Start Date:</label>
    <input type="date" id="start-date">

    <button onclick="filterCalendar()">Filter</button>
</div>

<script>
    function filterCalendar() {
        var startDate = document.getElementById("start-date").value;

        // You can perform filtering actions here using startDate
        // For demonstration purposes, let's just log the selected start date
        console.log("Start Date:", startDate);
    }
</script>

</body>
</html>
