<?php
$title = "Details";
include('db_connect.inc');
include('header.inc');
include('nav.inc');
?>

<main>
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

        if (isset($_SESSION['edit_success']) && $_SESSION['edit_success'] === true) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="custom-alert">&#10004; Facility updated successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

            unset($_SESSION['edit_success']);
        }
    }
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $foundflag = false;
        $sql = "SELECT * FROM facilities WHERE facilityid = $id";
        $result = $conn->query($sql);

        if ($conn->error) {
        } else {
            while ($row = $result->fetch_array()) {
                $foundflag = true;
                $facilityid = $row['facilityid'];

                echo <<<FDATA
                <div class="row">
                    <div class="col-lg-12">
                        <div class="details-container float-start">
                            <img src="{$row['image']}" alt="{$row['caption']}">
                        </div>
FDATA;

                echo <<<FDATA
                <div class="text-center">
                    <h2 class="Cus-h2 my-5">{$row['facilityname']}</h2>
                    <p class="P-d">{$row['description']}</p>
                    <div class="col-sm-4">
                        <div class="float-md-start">
                            <span class="material-symbols-outlined">king_bed</span>
                            <span class="material-symbols-outlined">account_balance_wallet</span>
                            <p class="configuration">{$row['configuration']}</p>
FDATA;

                if ($row['price'] == 0) {
                    echo '<p class="price">POS</p>';
                } else {
                    echo '<p class="price">$' . $row['price'] . '</p>';
                }

                if (isset($_SESSION['username'])) {
                    echo <<<FDATA
                        <a href="edit.php?facilityid=$facilityid" class="btn btn-primary me-4">Edit</a>
                        <a href="delete_condtion.php?facilityid=$facilityid" class="btn btn-danger me-3">Delete</a>
FDATA;
                }

                echo '</div>';
            }
        }

        if (!$foundflag) {
            echo '<div class="centered-error"><p>NO FACILITIES FOUND :(</p>';
        }
    } else {
        echo '<div class="centered-error"><p>Oops!<br>NO FACILITIES FOUND :(</p>';
    }
    ?>
  </div>
</div>
</div>
</div>

</main>

<?php
include('footer.inc');
?>
