<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/cart.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

// only normal user can access this page
if ($_SESSION["role_id"] != 1) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Cart";
$page = "cart";

$products_in_cart = get_products_in_cart($_SESSION["account_info"]["id"]);
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Cart</h1>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Image</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products_in_cart as $product) : ?>
            <tr>
              <td><img class="w-100" style="height: 100px;" alt="" src="<?php echo get_first_product_image_source($product["id"]) ?>" /></td>
              <td><a href="<?php echo $host_url; ?>/product/product_detail.php?id=<?php echo $product["id"]; ?>" target="_blank"><?php echo $product["product_name"] ?></a></td>
              <td class="text-success">VND <?php echo number_format($product["price"], 2); ?></td>
              <td><?php echo $product["quantity"]; ?></td>
              <td><a class="btn btn-info" href="<?php echo $host_url; ?>/cart/update_cart.php?account_id=<?php echo $_SESSION["account_info"]["id"] . "&product_id=" . $product["id"]; ?>">Update quantity</a></td>
              <td><a class="btn btn-danger" href="<?php echo $host_url; ?>/cart/remove_product.php?account_id=<?php echo $_SESSION["account_info"]["id"] . "&product_id=" . $product["id"]; ?>">Remove</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 d-flex justify-content-center mt-4">
      <a class="btn btn-primary" href="">Proceed to checkout</a>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
