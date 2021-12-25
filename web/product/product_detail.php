<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/rating.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/favorite.php");

$title = "Product Detail";
$page = "product_detail";

$product_info = null;

if (
  !isset($_GET["id"])
  || !($product_info = get_product_info($_GET["id"]))
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$product_image_sources = get_product_image_sources($_GET["id"]);
$image_count = count($product_image_sources);

// add comment
if (isset($_POST["add_comment_btn"])) {
  // check whether comment is empty
  if (strlen(trim($_POST["comment"]))) {
    $account_id = $_SESSION["account_info"]["id"];
    $product_id = $_GET["id"];
    $comment = $_POST["comment"];

    add_rating($account_id, $product_id, $comment);

    $_SESSION["error_code"] = 0;
    $_SESSION["error_message"] = "Comment added successfully!";
  } else {
    $_SESSION["error_code"] = 1;
    $_SESSION["error_message"] = "Comment must not be empty!";
  }
}

// get all ratings for product
$ratings = get_ratings_by_product_id($_GET["id"]);

// add product to favorites
if (isset($_POST["add_to_favorites_btn"])) {
  $account_id = $_POST["account_id"];
  $product_id = $_POST["product_id"];
  add_favorite($account_id, $product_id);
}

// remove product from favorites
if (isset($_POST["remove_from_favorites_btn"])) {
  $account_id = $_POST["account_id"];
  $product_id = $_POST["product_id"];
  remove_favorite($account_id, $product_id);
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center">
  <!-- Display error message -->
  <?php if (isset($_SESSION["error_code"])) : ?>
    <div class="alert <?php echo $_SESSION["error_code"] == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
      <?php
      echo $_SESSION["error_message"];
      unset($_SESSION["error_code"]);
      unset($_SESSION["error_message"]);
      ?>
    </div>
  <?php endif; ?>
</div>

<div class="container">
  <div class="row mt-5">

    <!-- Product's images -->
    <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php for ($i = 0; $i < $image_count; ++$i) : ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? 'class="active"' : ""; ?> aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php for ($i = 0; $i < $image_count; ++$i) : ?>
            <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">
              <img src="<?php echo $product_image_sources[$i]; ?>" class="d-block w-100" style="height: 500px;" alt="...">
            </div>
          <?php endfor; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- Product's information -->
    <div class="col-md-6">
      <div class="container">
        <div class="product-name row">
          <div class="col">
            <h1><?php echo $product_info["product_name"]; ?></h1>
          </div>
        </div>

        <div class="favorites mt-4 row">
          <div class="col"><i class="bi bi-heart-fill"></i>
            <h5 style="display: inline;"><?php echo get_number_of_favorites($_GET["id"]); ?></h5>
          </div>
        </div>

        <div class="product-price mt-4 row">
          <div class="col">
            <h4 class="text-danger" style="display: inline;">VND <?php echo number_format($product_info["price"], 2); ?></h4>
          </div>
        </div>
      </div>

      <?php if (isset($_SESSION["account_info"])) : ?>
        <div class="container mt-4">
          <div class="row">
            <form action="" method="post">
              <label for="quantity">Quantity:</label>
              <input name="quantity" id="quantity" type="number" value="1" />
              (<?php echo $product_info["quantity_in_stock"]; ?> in stock)
              <button class="btn btn-primary mt-4" type="submit" name="add_to_cart_btn" id="add_to_cart_btn">Add to cart</button>
            </form>
          </div>
          <div class="row mt-4">
            <div class="col">
              <?php
              $account_id = $_SESSION["account_info"]["id"];
              $product_id = $_GET["id"];
              ?>
              <?php if (!is_in_favorites($account_id, $product_id)) : ?>
                <form action="" method="post">
                  <input name="account_id" id="account_id" type="hidden" value="<?php echo $account_id; ?>" />
                  <input name="product_id" id="product_id" type="hidden" value="<?php echo $product_id; ?>" />
                  <button name="add_to_favorites_btn" id="add_to_favorites_btn" class="btn btn-info" type="submit">Add to favorites</button>
                </form>
              <?php else : ?>
                <form action="" method="post">
                  <input name="account_id" id="account_id" type="hidden" value="<?php echo $account_id; ?>" />
                  <input name="product_id" id="product_id" type="hidden" value="<?php echo $product_id; ?>" />
                  <button name="remove_from_favorites_btn" id="remove_from_favorites_btn" class="btn btn-danger" type="submit">Remove from favorites</button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-12">
      <h2>Description</h2>
      <p>
        <?php echo $product_info["description"]; ?>
      </p>
    </div>
  </div>
  <div class="row mt-5">
    <h2>Comments</h2>
  </div>
  <?php if (isset($_SESSION["account_info"])) : ?>
    <?php if (!is_rated($_SESSION["account_info"]["id"], $_GET["id"])) : ?>
      <div class="row">
        <form action="" method="post">
          <div class="col-md-12">
            <textarea class="form-control" placeholder="Enter comment here..." name="comment" id="comment" style="height: 150px"></textarea>
          </div>
          <div>
            <button class="btn btn-primary mt-2" type="submit" name="add_comment_btn" id="add_comment_btn">Add comment</button>
          </div>
        </form>
      </div>
    <?php else : ?>
      <p class="text-success">You already rated this product!</p>
    <?php endif; ?>
  <?php endif; ?>
  <?php foreach ($ratings as $rating) : ?>
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo get_fullname_by_id($rating["account_id"]); ?></h5>
            <p class="card-text"><?php echo $rating["comment"]; ?></p>
            <p class="card-text"><small class="text-muted"><?php echo $rating["create_at"]; ?></small></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
