<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/cart.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/order.php");

$title = "Checkout";
$page = "checkout";

if (
  $_SESSION["role_id"] != 1
  || !isset($_SESSION["shipping_phone_number"])
  || !isset($_SESSION["shipping_fullname"])
  || !isset($_SESSION["shipping_address"])
  || !isset($_POST["checkout_btn"])
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$account_id = $_SESSION["account_info"]["id"];
$ship_name = $_SESSION["shipping_fullname"];
$ship_phone_number = $_SESSION["shipping_phone_number"];
$ship_address = $_SESSION["shipping_address"];

$order_info = [
  "account_id" => $account_id,
  "ship_name" => $ship_name,
  "ship_phone_number" => $ship_phone_number,
  "ship_address" => $ship_address,
  "status" => "waiting"
];
$order_id = create_order($order_info);

if ($order_id) {
  $products = get_products_in_cart($account_id);

  foreach ($products as $product) {
    $order_detail_info = [
      "order_id" => $order_id,
      "product_id" => $product["id"],
      "quantity" => $product["quantity"]
    ];

    if (create_order_detail($order_detail_info)) {
      empty_cart($account_id);
      $_SESSION["error_code"] = 0;
      $_SESSION["error_message"] = "Order created successfully!";
    }
  }
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

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
