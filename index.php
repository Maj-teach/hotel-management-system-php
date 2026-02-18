<?php
$title = "homePage";
include('db_connect.inc');
include('header.inc');
include('nav.inc');
?>

<?php if (isset($_SESSION['registration_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="custom-alert">&#10004; you have successfully registered</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['registration_success']); } ?>

<?php if (isset($_SESSION['login_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="custom-alert">&#10004; login successful</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['login_success']); } ?>

<?php if (isset($_SESSION['login_error'])) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong class="custom-alert">&#10005; Login unsuccessful</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['login_error']); } ?>

<main>
    <div class="content">
    <div class="row">
    <div class="col-lg-6 col-md-6">
    <div class="carousel-container">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
     <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
     <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
     <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
     <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>

                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            <?php
                            $sql = "SELECT * FROM facilities ORDER BY facilityid DESC LIMIT 4";
                            $result = $conn->query($sql);

                            if (!$result) {
                                die("Query failed: " . $conn->error);
                            }

                            $active = 'active';

                            while ($row = $result->fetch_assoc()) {
                                $activeclass = $active ? 'active' : '';
                                $image = $row['image'];
                                $caption = $row['caption'];
                                ?>

                                <div class="carousel-item <?php echo $activeclass; ?>">
                                    <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $caption; ?>" class="d-block w-100" style="max-width: 500px;">

                                    </div>
                                </div>

                                <?php
                                $active = '';
                            }
                            ?>
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" data-bs-target="#demo" data-bs-slide="prev" type="button">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" data-bs-target="#demo" data-bs-slide="next" type="button">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="text-start ps-4">
                    <h1 class="cus-h1">INTERNATIONAL<br>MELBOURNE HOTEL</h1>
                    <h2 class="cus-h2">WELCOME TO MELBOURNE</h2>
                </div>
            </div>
        </div>

        <div class="mb-3 custom-margin">
        <input type="text" class="form-control" id="fore" placeholder="I am looking for" name="fore">
    
             
           

            <h3 class="h3">Discover Melbourne your Way!</h3>
            <p>We know everybody has its own style and favorite way to spend their leisure time. Melbourne International Hotel has facilities that will satisfy your personal or business needs.</p>
            <p>Are you ready to explore?</p>

        </div>
    </div>
</main>

<?php
include('footer.inc');
?>




