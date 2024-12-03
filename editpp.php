<?php
include "connector_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $student_id = $_SESSION['user']['accinfo_idno'];

    $sql = "UPDATE accountinfo SET 
            accinfo_firstname = '$firstname', 
            accinfo_middlename = '$middlename', 
            accinfo_lastname = '$lastname', 
            accinfo_email = '$email', 
            accinfo_contact = '$contact', 
            accinfo_address = '$address'
            WHERE accinfo_idno = '$student_id'";

    if (mysqli_query($conn, $sql)) {
        // Update session data
        $_SESSION['user']['accinfo_firstname'] = $firstname;
        $_SESSION['user']['accinfo_middlename'] = $middlename;
        $_SESSION['user']['accinfo_lastname'] = $lastname;
        $_SESSION['user']['accinfo_email'] = $email;
        $_SESSION['user']['accinfo_contact'] = $contact;
        $_SESSION['user']['accinfo_address'] = $address;

        header("Location: editp.php?success=1");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
