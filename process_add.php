<?php
$title = "Add More";
include('db_connect.inc');
include('header.inc');
include('nav.inc');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facilityname = $_POST["facname"];
    $description = $_POST["Des"];
    $caption = $_POST["ImCa"];
    $price = $_POST["Pr"];
    $configuration = $_POST["bedconf"];
    $capacity = $_POST["CaP"];
    
    $image = 'images/' . $_FILES['chfile']['name'];
    
    $sql = "INSERT INTO facilities (facilityname, description, caption, price, configuration, capacity, image, username) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if (empty($facilityname) || empty($description) || empty($caption) || empty($price) || empty($configuration) || empty($capacity) || empty($_FILES['chfile']['name'])) {
        echo "<script>alert('Please fill in all the required fields.');</script>";
    } else {
        $stmt->bind_param("sssdsiss", $facilityname, $description, $caption, $price, $configuration, $capacity, $image,$username);
    
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            if (move_uploaded_file($_FILES['chfile']['tmp_name'], 'images/' . $_FILES['chfile']['name'])) {
                echo '<p>new record was add successfully</p>';
            }
            
        } else {
            echo '<p>Record not inserted into the database</p>';
        }
    }
}
}
include('footer.inc');
?>
