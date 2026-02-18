<?php
$title = "User Collection";
include('db_connect.inc');
include('header.inc');
include('nav.inc');
?>

<main>
    <div class="content-container">
        <section>
            <div class="text-start">
                <?php
               
                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                    echo "<h1 class='add-h1'>$username's Collection</h1>";
                    
                 
                    $sql = "SELECT * FROM facilities WHERE username = '$username'";
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<div class='details-container'>";
                            echo "<img class='facility-image' src='" . $row['image'] . "' alt='" . $row['caption'] . "'>";
                            echo "<span class='material-symbols-outlined'>king_bed</span>";
                            echo "<span class='material-symbols-outlined'>account_balance_wallet</span>";
                            echo "<div class='text-center'>";
                            echo "<h2 class='Cus-h'>" . $row['facilityname'] . "</h2>";
                            echo "<p class='d'>" . $row['description'] . "</p>";
                            if ($row['price'] != 0) {
                                echo "<p>\$" . $row['price'] . "</p>";
                            } else {
                                echo "<p>POS</p>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No facilities found for $username.</p>";
                    }
                }
                ?>
            </div>
        </section>
    </div>
</main>

<?php
include('footer.inc');
?>