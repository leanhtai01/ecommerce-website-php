<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/order.php");

$title = "Order detail";
$page = "order_detail";

if (
  !isset($_GET["order_id"])
  || ($_SESSION["role_id"] == 2)
  || ($_SESSION["role_id"] == 1 && !is_order_belong_to_account(
    $_GET["order_id"],$_SESSION["account_info"]["id"]
  ))
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$order_id = $_GET["order_id"];

$order = get_order_info($order_id);
$products = get_products_in_order_detail($order_id);
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Order detail</h1>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card w-100">
        <div class="card-header">
          <h3>Shipping information</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Fullname: <?php echo $order["ship_name"]; ?></li>
          <li class="list-group-item">Phone number: <?php echo $order["ship_phone_number"]; ?></li>
          <li class="list-group-item">Address: <?php echo $order["ship_address"]; ?></li>
          <li class="list-group-item">Order date: <?php echo $order["order_date"]; ?></li>
          <li class="list-group-item">Status: <?php echo $order["status"]; ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Image</th>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><img class="w-100" style="height: 100px;" alt="" src="<?php echo get_first_product_image_source($product["id"]) ?>" /></td>
              <td><a href="<?php echo $host_url; ?>/product/product_detail.php?id=<?php echo $product["id"]; ?>" target="_blank"><?php echo $product["product_name"] ?></a></td>
              <td><?php echo $product["quantity"]; ?></td>
              <td class="text-success">VND <?php echo number_format($product["price"], 2); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10 text-end">
      <label for="">
        <h4>Payment total: <span class="text-success">VND <?php echo number_format(get_payment_total_history($order_id), 2); ?></span></h4>
      </label>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
