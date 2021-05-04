<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <?php if (!$page_title == "Home") {  ?>
        <li class="nav-item ">

          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      <?php } ?>
      <?php
      // Check if the user is logged in
      if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Signup</a>
        </li>
      <?php } ?>


      <?php
      // Check if the user is logged in
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?>

        <li class="nav-item">
          <a class="nav-link" href="create-house.php">Create House</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="houses.php">My Houses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="houses-catalog.php">Buy House</a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="testimonials.php">Testimonials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
      <?php
      // Check if the user is logged in
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?>
        <li class="nav-item">
          <a class="nav-link text-danger " href="logout.php">SignOut</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>