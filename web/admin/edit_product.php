<?php
$title = "Edit Product";
$page = "edit_product";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/category.php");
require_once(dirname(dirname(__DIR__)) . "/utils/upload.util.php");
require_once(dirname(dirname(__DIR__)) . "/validation/product.validation.php");

$product_info = null;

if (
  $_SESSION["role_id"] != 0
  || !isset($_GET["id"])
  || !($product_info = get_product_info($_GET["id"]))
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$allow_img_types = [IMAGETYPE_JPEG];
$categories = get_category_list();

if (isset($_POST["update_product_btn"])) {
  // save product's id
  $id = $product_info["id"];

  $product_info = extract_product_info($_POST);

  // add product's id back
  $product_info["id"] = $id;

  $imgs = $_FILES["product_images"];
  $error_code = is_upload_multiple_img_success($imgs, $allow_img_types);

  if ($error_code == 0) {
    update_product_info($product_info);
    add_multiple_product_img(
      $id,
      upload_multiple_product_img_to_aws_s3($imgs, $id)
    );

    $_SESSION["error_code"] = 0;
    $_SESSION["error_message"] = "Product updated successfully!";
  } elseif ($error_code == 4) {
    update_product_info($product_info);
    $_SESSION["error_code"] = 0;
    $_SESSION["error_message"] = "Product updated successfully!";
  } else {
    $_SESSION["error_code"] = $error_code;
    $_SESSION["error_message"] = get_image_upload_error_message($error_code);
  }
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center">
  <h1 class="mt-4">Edit Product</h1>

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
<div class="text-center register-form">
  <form class="row g-3" action="" method="post" enctype="multipart/form-data">
    <div class="col-12 form-floating">
      <select class="form-select" name="category_id" id="category_id">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category["id"] ?>"><?php echo $category["category_name"] ?></option>
        <?php endforeach; ?>
      </select>
      <label for="category_id">Category</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name" value="<?php echo $product_info["product_name"]; ?>" required>
      <label for="product_name">Product name</label>
    </div>
    <div class="col-12 form-floating">
      <input type="number" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $product_info["price"]; ?>" required min="0" step="any">
      <label for="price">Price</label>
    </div>
    <div class="col-12 form-floating">
      <input type="number" class="form-control" name="quantity_in_stock" id="quantity_in_stock" placeholder="Quantity in stock" value="<?php echo $product_info["quantity_in_stock"]; ?>" required min="1" max="100000">
      <label for="quantity_in_stock">Quantity in stock</label>
    </div>
    <div class="col-12 form-floating">
      <textarea class="form-control" placeholder="Enter description here..." name="description" id="description" style="height: 150px"><?php echo $product_info["description"] ?></textarea>
      <label for="description">Description</label>
    </div>
    <div class="col-12 mb-3">
      <label for="product_images" class="form-label">Product's images</label>
      <input class="form-control" type="file" name="product_images[]" id="product_images" multiple>
    </div>
    <div class="col-12 d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="update_product_btn" type="submit">Update product</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
