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

  <!-- Style index.php -->
  <link href="<?php echo $host_url; ?>/css/index.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>

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
              <?php if ($_SESSION["role_id"] == 1) : ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "favorite" ? "active" : "" ?>" href="<?php echo $host_url; ?>/favorite/favorite.php">Favorite products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "order_history" ? "active" : "" ?>" href="<?php echo $host_url . "/order/order_history.php?account_id=" . $_SESSION["account_info"]["id"]; ?>">Order history</a>
                </li>
              <?php elseif ($_SESSION["role_id"] == 0) : ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "revenue_statistic" ? "active" : "" ?>" href="<?php echo $host_url . "/admin/revenue_statistic.php"; ?>">Revenue statistics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "order_manager" ? "active" : "" ?>" href="<?php echo $host_url . "/admin/order_manager.php"; ?>">Order manager</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "product_manager" ? "active" : "" ?>" href="<?php echo $host_url . "/admin/product_manager.php"; ?>">Product manager</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $page == "account_manager" ? "active" : "" ?>" href="<?php echo $host_url . "/admin/account_manager.php"; ?>">Account manager</a>
                </li>
              <?php endif; ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION["account_info"]["fullname"] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $host_url; ?>/account/index.php">Profile settings</a></li>                  
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?php echo $host_url ?>/account/logout.php">Logout</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
          <?php if (isset($_SESSION["account_info"]) && $_SESSION["role_id"] == 1) : ?>
            <ul class="navbar-nav navbar-right me-4">
              <li class="nav-item">
                <a href="<?php echo $host_url; ?>/cart/cart.php" class="nav-link"><img style="height: 2.4em;" alt="" src="<?php echo $host_url; ?>/img/cart.svg" /><span class="align-top ms-2"><?php echo $_SESSION["number_of_product_in_cart"]; ?></span></a>
              </li>
            </ul>
          <?php endif; ?>
          <form class="d-flex" method="get" action="<?php echo $host_url . "/product/search_for_product.php"; ?>">
            <input class="form-control me-2" type="search" placeholder="Search for product" aria-label="Search" name="keyword" id="keyword">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
