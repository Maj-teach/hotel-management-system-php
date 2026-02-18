<!-- nav.inc -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <img src="logo.jpeg" alt="Logo" width="60">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="facilities.php">facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">gallery</a>
        </li>
        <?php if (isset($_SESSION['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add More</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2 d-none d-lg-block" type="text" placeholder="Search">
        <div class="search ps-3 pe-3 d-none d-lg-block">
          <i class="material-symbols-outlined">search</i>
        </div>
      </form>
    </div>
  </div>
</nav>

<!-- end of nav.inc -->
