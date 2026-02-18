<?php
include('db_connect.inc');



session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password, reg_date) VALUES (?, SHA(?), NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

if ($stmt->affected_rows > 0) {

    $_SESSION['registration_success'] = true;
    header("Location: index.php"); 
} else {

    $_SESSION['err'] = "An error has occurred!";
    header("Location: register.php"); 
}

$conn->close();
exit(0);
?>


