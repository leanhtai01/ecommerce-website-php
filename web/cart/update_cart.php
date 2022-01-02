<?php
$title = "Update cart";
$page = "update_cart";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/cart.php");

if (
  !isset($_GET["account_id"])
  || !isset($_GET["product_id"])
  || !isset($_SESSION["account_info"])
  || ($_GET["account_id"] != $_SESSION["account_info"]["id"])
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$account_id = $_GET["account_id"];
$product_id = $_GET["product_id"];

// redirect user to cart page if the Cancel is pressed
if (isset($_POST["cancel_btn"])) {
  header("Location: " . $host_url . "/cart/cart.php");
}

// update product quantity
if (isset($_POST["update_btn"])) {
  $quantity = $_POST["quantity"];
  update_cart($account_id, $product_id, $quantity);
  header("Location: " . $host_url . "/cart/cart.php");
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center mt-4">Update product quantity in cart</h1>
<div class="text-center login-form">
  <form action="" method="post">
    <div class="form-floating mb-3 mt-4">
      <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Product quantity" required autofocus value="<?php echo get_product_quantity_in_cart($account_id, $product_id); ?>">
      <label for="quantity">Product quantity</label>
    </div>
    <div class="col-md-12 mt-4">
      <button class="btn btn-primary btn-lg me-5" name="update_btn" type="submit">Update</button>
      <a class="btn btn-danger btn-lg ms-5" href="<?php echo $host_url; ?>/cart/cart.php">Cancel</a>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
