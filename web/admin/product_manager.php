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

$records_per_page = 5;
$number_of_products = get_number_of_products();
$number_of_pages = ceil($number_of_products / $records_per_page);

// get current page
$current_page = 1;
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
  $current_page = $_GET["page"];
}

// get pagination start offset
$start_offset = ($current_page - 1) * $records_per_page;

$products = get_product_list_limit($start_offset, $records_per_page);
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
            <tr <?php echo is_product_deleted($product["id"]) ? "class = 'table-danger'" : "" ?>>
              <td><?php echo $product["id"] ?></td>
              <td><?php echo $product["category_name"] ?></td>
              <td><?php echo $product["product_name"] ?></td>
              <td><?php echo $product["description"] ?></td>
              <td><?php echo $product["price"] ?></td>
              <td><?php echo $product["quantity_in_stock"] ?></td>
              <td><?php echo $product["create_at"] ?></td>
              <?php if (!is_product_deleted($product["id"])) : ?>
                <td><a class="btn btn-info" href="<?php echo $host_url; ?>/admin/edit_product.php?id=<?php echo $product["id"] ?>">Edit</a></td>
                <td><a class="btn btn-danger" href="<?php echo $host_url . "/admin/delete_product.php?id=" . $product["id"]; ?>">Delete</a></td>
              <?php else : ?>
                <td></td>
                <td><a class="btn btn-success" href="<?php echo $host_url . "/admin/restore_product.php?id=" . $product["id"]; ?>">Restore</a></td>
              <?php endif; ?>
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
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item <?php echo $current_page <= 1 ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page <= 1 ? "#" : $host_url . "/admin/product_manager.php?page=" . $current_page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $number_of_pages; ++$i) : ?>
            <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>">
              <a class="page-link" href="<?php echo $host_url; ?>/admin/product_manager.php?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $current_page >= $number_of_pages ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page >= $number_of_pages ? "#" : $host_url . "/admin/product_manager.php?page=" . $current_page + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
