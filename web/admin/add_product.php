<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

if ($_SESSION["role_id"] != 0) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Add Product";
$page = "add_product";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center register-form">
  <form class="row g-3" action="" method="post">
    <h1 class="mt-4">Add Product</h1>

    <!-- Display error message -->
    <?php if (isset($error_code)) : ?>
      <div class="alert <?php echo $error_code == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <div class="col-12 form-floating">
      <select class="form-select" name="category" id="category">
        <option value="1">Computers</option>
        <option value="2" selected>Books</option>
        <option value="3">Video Games</option>
      </select>
      <label for="category">Category</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name" required>
      <label for="product_name">Product name</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
      <label for="price">Price</label>
    </div>
    <div class="col-12 form-floating">
      <input type="number" class="form-control" name="quantity_in_stock" id="quantity_in_stock" placeholder="Quantity in stock" required>
      <label for="quantity_in_stock">Quantity in stock</label>
    </div>
    <div class="col-12 form-floating">
      <textarea class="form-control" placeholder="Enter description here..." name="description" id="description" style="height: 150px"></textarea>
      <label for="description">Description</label>
    </div>
    <div class="col-12 mb-3">
      <label for="product_images" class="form-label">Product's images (only accept *.jpeg file with size < 2MB)</label>
      <input class="form-control" type="file" name="product_images[]" id="product_images" multiple>
    </div>
    <div class="col-12 d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="add_product_btn" type="submit">Add product</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
