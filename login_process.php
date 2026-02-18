<?php
session_start();
include('db_connect.inc');


$sql = "select * from users where username = ? and password = SHA(?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $username, $password);
$username = $_POST['username'];
$password = $_POST['password'];

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['login_success'] = true;
    header("Location: index.php"); 
    exit();
} else {
    $_SESSION['login_error'] = true;
    header("Location: index.php"); 
    exit();
}


$conn->close();
?>


