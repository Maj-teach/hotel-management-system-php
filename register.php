<?php
$title = "register";
include('db_connect.inc');
include('header.inc');
include('nav.inc');

?>



<div class="row">
    <div class="col-md-6">
        <h1 class="form">Register</h1>
        <form action="register_process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for= "password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<?php
include('footer.inc');
?>




