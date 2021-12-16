<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Style login.php -->
  <link href="<?php echo $host_url; ?>/css/login.css" rel="stylesheet" />

  <!-- Style register.php -->
  <link href="<?php echo $host_url; ?>/css/register.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

  <title><?php echo $title ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $host_url; ?>/index.php">leanhtai01-ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php echo $page == "index" ? "active" : "" ?>" aria-current="page" href="<?php echo $host_url; ?>/index.php">Home</a>
            </li>
            <?php if (!isset($_SESSION["account_info"])) : ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $page == "login" ? "active" : "" ?>" href="<?php echo $host_url; ?>/account/login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $page == "register" ? "active" : "" ?>" href="<?php echo $host_url; ?>/account/register.php">Register</a>
              </li>
            <?php else : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION["account_info"]["fullname"] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $host_url; ?>/account/index.php">Profile settings</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?php echo $host_url ?>/account/logout.php">Logout</a></li>
                </ul>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
