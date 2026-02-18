<?php
$title = "Gallery";
include('db_connect.inc');
include('header.inc');
include('nav.inc');


$sql_configurations = "SELECT DISTINCT configuration FROM facilities";
$result_configurations = $conn->query($sql_configurations);


if (isset($_GET['configuration'])) {
    $selectedConfiguration = $_GET['configuration'];

 
    $sql = "SELECT * FROM facilities WHERE configuration = '$selectedConfiguration'";
    $result = $conn->query($sql);
} else {

    $sql = "SELECT * FROM facilities";
    $result = $conn->query($sql);
}
?>

<main id="gallery-background">
  <div class="content-container">
    <section>
      <h1 id="gallery-h1">Melbourne has a lot to offer!</h1>
      <p id="gallery-p1">And what better way to discover Melbourne...your own way. Melbourne International Hotel can serve as a perfect gateway. We cater for either pleasure or business stays.</p>
      <p id="gallery-p2">Are you ready to explore?</p>
      <div class="row">
        <form>
          <select id="dropdown-menu" name="configuration" onchange="doMenu()">
            <option value="">Select configuration...</option>
            <option value="gallery.php">All configurations</option>
            <?php
            while ($configuration = $result_configurations->fetch_assoc()) {
                echo '<option value="gallery.php?configuration=' . $configuration['configuration'] . '">' . $configuration['configuration'] . '</option>';
            }
            ?>
          </select>
        </form>

        <?php
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-lg-4 col-md-6 col-sm-12">';
          echo '<div class="gallery">';
          echo '<a href="details.php?id=' . $row['facilityid'] . '">';
          echo '<img src="' . $row['image'] . '" alt="' . $row['caption'] . '">';
          echo '</a>';
          echo '<p class="caption">' . $row['caption'] . '</p>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </section>
  </div>
</main>

<?php
include('footer.inc');
?>


