<?php
$title = "Delete Condition";
include('header.inc');
include('db_connect.inc');
include('nav.inc');

$error = false;

if (isset($_GET['facilityid'])) {
    $id = $_GET['facilityid'];

  
    $sql = "SELECT * FROM facilities WHERE facilityid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $records = $stmt->get_result();

    if ($records->num_rows > 0) {
        $row = $records->fetch_assoc();
        $oldimage = $row['image'];
        echo "<h1 class='sur'>Are you sure you want to delete this record ?</h1>";
        echo '<div class="deletecd">';
        echo '<img src="' . $row['image'] . '" alt="' . $row['caption'] . '">';
        echo '<p class="caption">' . $row['caption'] . '</p>';
        echo '</div>'; 
        echo "<form action='delete.php' method='post'>";
        echo "<input type='hidden' name='facilityid' value='$id'>";
        echo "<input type='hidden' name='oldimage' value='$oldimage'>";
        
        echo "<a href='details.php?id=$id' class='btn btn-primary me-2'>Cancel</a>";
        echo '<button type="submit" name="confirm" class="btn btn-danger">Delete</button>';
        echo "</form>";
        echo '</div>'; 
    } else {
        $error = true;
    }
} else {
    $error = true;
}

if ($error) {
    echo "<p>Error: Record NOT found</p>";
}





