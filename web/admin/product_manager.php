<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

if ($_SESSION["role_id"] != 0) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Product Manager";
$page = "product_manager";

$products = get_product_list();
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Product Management</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <a class="btn btn-primary" href="<?php echo $host_url; ?>/admin/add_product.php">Add product</a>      
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Product name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity in stock</th>
            <th>Create at</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><?php echo $product["id"] ?></td>
              <td><?php echo $product["category_name"] ?></td>
              <td><?php echo $product["product_name"] ?></td>
              <td><?php echo $product["description"] ?></td>
              <td><?php echo $product["price"] ?></td>
              <td><?php echo $product["quantity_in_stock"] ?></td>
              <td><?php echo $product["create_at"] ?></td>
              <td><a class="btn btn-info" href="<?php echo $host_url; ?>/admin/edit_product.php?id=<?php echo $product["id"] ?>">Edit</a></td>
              <td><a class="btn btn-danger" href="">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
