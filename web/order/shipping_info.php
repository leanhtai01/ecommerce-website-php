<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Shipping information";
$page = "shipping_info";

if ($_SESSION["role_id"] != 1) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$shipping_info = get_personal_info($_SESSION["account_info"]["id"]);

// set shipping information to session then redirect user to invoice page
if (isset($_POST["continue_btn"])) {
  $_SESSION["shipping_phone_number"] = $_POST["phone_number"];
  $_SESSION["shipping_fullname"] = $_POST["fullname"];
  $_SESSION["shipping_address"] = $_POST["address"];
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center register-form">
  <form class="row g-3" action="" method="post">
    <h1 class="mt-4">Shipping information</h1>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number" value="<?php echo $shipping_info["phone_number"]; ?>" required>
      <label for="phone_number">Phone number</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full name" value="<?php echo $shipping_info["fullname"]; ?>" required>
      <label for="fullname">Full name</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $shipping_info["address"]; ?>" required>
      <label for="address">Address</label>
    </div>
    <div class="col-md-12 mt-4">
      <button class="btn btn-primary btn-lg me-5" name="continue_btn" type="submit">Continue</button>
      <a class="btn btn-danger btn-lg ms-5" href="<?php echo $host_url; ?>/cart/cart.php">Cancel</a>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
