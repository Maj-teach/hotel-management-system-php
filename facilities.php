<?php
$title = "facilities";
include('db_connect.inc');
include('header.inc');
include('nav.inc');
?>

<main id="facilities-background">
  <div class="content-container">
    <h1 class="facilities-h1">Discover Melbourne your own way!</h1>
    <p id="facilities-paragraph">We know everybody has its own style and favorite way to spend their leisure time. Melbourne International Hotel has facilities that will satisfy your personal or business needs.</p>
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-1 order-md-0">
          <img class="facilities-img img-fluid" src="southgatetowilliamstownferry.jpeg" alt="Body" width="480" height="350">
        </div>
        <div class="col-md-6 order-0 order-md-1">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Facility type</th>
                <th>Capacity</th>
                <th>Bed configuration</th>
                <th>Price</th>
              </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM facilities";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td><a href='details.php?id={$row['facilityid']}' class='green-link'>{$row['facilityname']}</a></td>";
                echo "<td>{$row['capacity']}</td>";
                echo "<td>{$row['configuration']}</td>";
                if ($row['price'] != 0) {
                  echo "<td>\${$row['price']}</td>";
                } else {
                  echo "<td>POS</td>";
                }
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No facilities available</td></tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include('footer.inc');
?>

