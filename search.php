<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right top, #d7e1f0, #d4eaf3, #d8f3f1, #e4f9ed, #f7fdea);
      margin-top: 60px; 
    }
    .container {
      margin-left: 500px;
      padding: 20px;
      text-align: center;
      justify-content: center;
    }
    /*================NAVIGATION BAR================*/
    .navbar {
      position: fixed;
      background-color: #d1d7af;
      top: 52%;
      left: 1%;
      right: 5%;
      border-radius: 10px;
      transform: translateY(-50%);
      overflow: hidden;
      width: 230px;
    }
    .navbar a {
      display: block;
      color: black;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
      border-bottom: groove;
      border-width: 3px;
    }
    .navbar a:hover {
      background-color: #2d83e3;
    }
    
    .welcome {
      background-color: #d1d7af;
      overflow: hidden;
      text-align: center;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000; 
    }

    .logout {
      position: fixed;
      bottom: 0;
      left: 0;
      padding: 10px 20px;
    }
    h3 {
      color: black;
    }
    img.staff-photo {
      position: absolute;
      top: 4px;
      left: 5px;
      border-radius: 50%;
      width: 50px; 
      height: 50px;
    }

    /*===================ICONS=====================*/
    .icon{
      position: relative;
      display: block;
      height: 20px;
      line-height: 50px;
      text-align: start;
    }
    .icon ion-icon{
      font-size: 20px;
    }
    .title{
      position: relative;
        display: block;
        padding: 0 30px;
        height: 20px;
        line-height: 5px;
        text-align: start;
        white-space: nowrap;
    }

    /*============SEARCH STUDENT============*/
    .search {
      width: 50%;
      position: absolute;
      top: 14%;
      left: 30%;
      align-items: center;
      text-align: center;
      display: auto;
      border-radius: 10px;
      background-color: azure;
      padding: 20px;
      margin: 0 auto;
    }
    .stsearch {
        position: relative;
        width: 300px;
        margin: 0 auto; /* Center the search container horizontally */
        text-align: center;
    }

    /*=================BUTTONS================*/
    .button{
            border: 1px;
            border-radius: 5px;
            width: 100px;
            height: 45px;
            color: white;
            font-weight: 100px; 
            font-size: 15px;

        }
    .form-button{
        display: flex;
        justify-content: center;
        gap: 9px;
        margin-bottom: 15px;

    }
    .button-sub{
        background-color:#04AA6D;
    }
    .button-back{
        background-color: red;
    }


    

    /*============STUDENT RESULT============*/
    .searchr {
      width: 50%;
      position: absolute;
      top: 45%;
      left: 30%;
      align-items: center;
      text-align: center;
      border-radius: 10px;
      background-color: azure;
      padding: 20px;
    }
    .form-control{
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: white;
      border: 1px solid #7e747d;
      margin: 0 0 15px;
      padding: 8px;
      box-sizing: border-box;
      font-size: 17px;
      justify-items: center;         
    }
    .form-control:hover{
      border: 1px solid black;
    }
    .dropdown{
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: white;
      border: 1px solid #7e747d;
      margin-right: 10px;
      margin-bottom: 15px;
      padding: 2%;
      box-sizing: border-box;
      font-size: 15px;
      justify-items: center;
      border-radius: 10px;
      width: 250px;
      height: 45px;
    }
    .form-group label {
            position: relative;
        }

    .form-group .form-control {
        width: 250px; 
        height: 45px;
        border-radius: 10px;
        padding: 5px 35px;
        font-size: 18px;
        outline: none;
        border: 1px solid #7e747d;
        margin-right: 10px;
        background: white;
    }
    .form-group {
      width: 100%; 
      display: flex;
      justify-content: center;
    }
    
    .form-group label {
      font-family: Arial, sans-serif;
      font-size: 15px;
      width: 20%; /* Adjust the width according to your preference */
      margin-right: 10px;
    }
    .form-group {
      display: flex;
      flex-direction: row;
      align-items: center;
      margin-bottom: 10px;
    }

    .error {
    background: #f2dede;
    color: #fc0349;
    width: 50%;
    padding: 2px;
    border-radius: 5px;
    margin: auto;
  }
  </style>
</head>
<body>

<!----===========================NAVIGATION BAR==========================--->
<div class="welcome">
    <h3>Welcome Admin/Staff </h3>
    <img class="staff-photo" src="Images/staff.jpg" alt="Staff Photo">
</div>

<div class="navbar">
    <a href="admin-staff.php">
      <span class="icon">
          <ion-icon name="home-outline"></ion-icon>
      </span>
      <span class="title">Dashboard</span>
    </a>
    <a href="search.php">
      <span class="icon">
          <ion-icon name="search-outline"></ion-icon>
      </span>
      <span class="title">Search</span>
    </a>
    <a href="#">
      <span class="icon">
          <ion-icon name="trash-outline"></ion-icon>
      </span>
      <span class="title">Delete</span>
    </a>
    <a href="#">
      <span class="icon">
          <ion-icon name="calendar-outline"></ion-icon>
      </span>
      <span class="title">Sit In</span>
    </a>
    <a href="vsir.php">
      <span class="icon">
          <ion-icon name="clipboard-outline"></ion-icon>
      </span>
      <span class="title">View Sitin Record</span>
    </a>
    <a href="#">
      <span class="icon">
          <ion-icon name="document-outline"></ion-icon>
      </span>
      <span class="title">Generate Report</span>
    </a>
    <a href="index.php">
      <span class="icon">
          <ion-icon name="log-out-outline"></ion-icon>
      </span>
      <span class="title">Log Out</span>
    </a>
  </div>

          <!------===============SEARCH STUDENT=================------>
<form action="searchstud.php" method="POST">
    <div class="search">
        <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <h3>Search Student</h3>
        <div class="stsearch">
        <div class="form-group">
                <input type="text" class="form-control" id="sstd" name="sstd" placeholder="Enter Email or ID number">
                <div class="form-button">
                    <button class="button button-sub" type="submit">Search</button>
                </div>
            </div>
        </div>
    </div>
</form>

          <!------===============STUDENT RESULT=================------>
<form action="sitin.php" method="POST">
    <div class="searchr">
        <h3>Student Result</h3>
        <div class="form-group">
            <label for="result2">ID number: </label>
            <input type='hidden' id="id" name='id' value="<?php echo isset($_GET['accID']) ? $_GET['accID'] : ''; ?>">
            <input type="text" disabled class="form-control" id="result2" name="result2"><br>
        </div>
        <div class="form-group">
            <label for="purpose">Purpose: </label>
            <select class="dropdown" id="purpose" name="purpose">
                <option value="">Choose..</option>
                <option value="cprog">C Programming</option>
                <option value="javaprog">Java Programming</option>
                <option value="csharpprog">C# Programming</option>
                <option value="pythonprog">Python Programming</option>
            </select><br>
        </div>
        <div class="form-group">
            <label for="lab">Laboratory: </label>
            <select class="dropdown" id="lab" name="lab">
                <option value="">Choose..</option>
                <option value="524">524</option>
                <option value="526">526</option>
                <option value="528">528</option>
                <option value="530">530</option>
                <option value="542">542</option>
            </select><br>
        </div>
        <div class="form-group">
            <label for="remains">Remaining Session: </label>
            <input type="text" disabled class="form-control" id="remains" name="remains" value="<?php echo isset($_GET['remaining_session']) ? $_GET['remaining_session'] : ''; ?>"><br>
        </div>
        <div class="form-button">
            <button class="button button-sub" type="submit">Sitin</button>
        </div>
    </div>
</form>         
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const resultValue = urlParams.get('result');

    if (resultValue) {
        document.getElementById("sstd").value = resultValue;
        document.getElementById("result2").value = resultValue;
    }
</script>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
