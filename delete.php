<?php
$title = "Delete Record";
include('header.inc');
include('db_connect.inc');
include('nav.inc');

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) && isset($_POST['facilityid'])) {
        $id = $_POST['facilityid'];
        $oldimage = basename($_POST['oldimage']); 

        $sql = "DELETE FROM facilities WHERE facilityid = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error in preparing the SQL statement: " . $conn->error);
        }

        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            die("Error in executing the SQL statement: " . $stmt->error);
        }

        if ($stmt->affected_rows > 0) {
          
            if (file_exists('images/' . $oldimage)) {
                unlink('images/' . $oldimage);
             
                echo '<div class="text-start"><p>Goodbye!</p>';
                echo "<div id='success-message' class='alert alert-success text-start'>record and image deleted</div>";
            } else {
                $error = true;
                echo "Error deleting the image.";
            }
        } else {
            $error = true;
            echo "Error deleting the record.";
        }
    } elseif (isset($_POST['cancel'])) {
        if (isset($_POST['facilityid'])) {
            $facilityid = $_POST['facilityid'];
            echo '<div class="text-start"><p>Goodbye!</p>';
            header("Location: details.php?id=$facilityid");
            exit();
        } else {
            $error = true;
            echo "Invalid request: Missing facilityid.";
        }
    }
} else {
    $error = true;
    echo "Invalid request.";
}

if ($error) {
    echo "<p>Error: Record NOT deleted</p>";
}

include('footer.inc');
?>
