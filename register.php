<?php
include 'connector_db.php';


$idnum = $_POST['idno'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$uname = $_POST['usname'];
$pass = $_POST['password'];
$conpass = $_POST['cpassword'];
$yearlevel = $_POST['ylevel'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];

if ($pass !== $conpass) {
    echo '<script>alert("Password dont match!"); window.location.href = "register.html";</script>';
    exit();
}

$sql_insert_account = "INSERT INTO account (acc_username, acc_password) VALUES ('$uname', '$pass')";
if ($conn->query($sql_insert_account) === TRUE) {

$acc_id = $conn->insert_id;


$sql_insert_accountinfo = "INSERT INTO accountinfo (accinfo_id, accinfo_firstname, accinfo_middlename, accinfo_lastname, accinfo_email, accinfo_idno, accinfo_year, accinfo_age, accinfo_gender, accinfo_contact, accinfo_address, remain_ss)
VALUES ('$acc_id', '$fname', '$mname', '$lname', '$email', '$idnum', '$yearlevel', '$age', '$gender', '$contact', '$address','30')";

if ($conn->query($sql_insert_accountinfo) === TRUE) {
    echo '<script>alert("Registered successfully!"); window.location.href = "index.php";</script>';
} else {
echo "Error: " . $sql_insert_accountinfo . "<br>" . $conn->error;
}
} else {
echo "Error: " . $sql_insert_account . "<br>" . $conn->error;
}


$conn->close();
