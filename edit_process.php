<?php
include('db_connect.inc');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $facilityid = $_POST['facilityid'];
    $facilityname = $_POST['facname'];
    $description = $_POST['Des'];
    $caption = $_POST['ImCa'];
    $price = $_POST['Pr'];
    $configuration = $_POST['bedconf'];
    $capacity = $_POST['CaP'];
  
    $oldimage = '';  
    $sql = "SELECT image FROM facilities WHERE facilityid=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $facilityid);
        if ($stmt->execute()) {
            $stmt->bind_result($oldimage);
            $stmt->fetch();
        } else {
            echo "Database error while fetching old image: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Prepare failed: " . $conn->error;
    }
    
    if (!empty($_FILES['chfile']['name'])) {
        if (!empty($oldimage) && file_exists($oldimage)) {
            unlink($oldimage);
        }

        $image = 'images/' . $_FILES['chfile']['name'];
        $temp = $_FILES['chfile']['tmp_name'];
        move_uploaded_file($temp, $image); 
    } else {
        $image = $oldimage;
    }
    
    $stmt = $conn->prepare("UPDATE facilities SET facilityname=?, description=?, image=?, capacity=?, price=?, configuration=?, caption=? WHERE facilityid=?");
    
    if ($stmt) {
        $stmt->bind_param("ssssdssi", $facilityname, $description, $image, $capacity, $price, $configuration, $caption, $facilityid);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
               
                $_SESSION['edit_success'] = true;
               
                header("Location: details.php?id=$facilityid");
                exit;
            } else {
                echo "<p>Record NOT updated</p>";
            }
        } else {
            echo "Update failed: " . $stmt->error;
        }
    } else {
        echo "Prepare failed: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>
 

