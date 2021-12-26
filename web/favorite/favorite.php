<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/favorite.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

// only normal logged in user can access this page
if ($_SESSION["role_id"] != 1) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Favorite";
$page = "favorite";

$account_id = $_SESSION["account_info"]["id"];
$records_per_page = 5;
$number_of_favorites = get_number_of_favorite($account_id);
$number_of_pages = ceil($number_of_favorites / $records_per_page);

// get current page
$current_page = 1;
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
  $current_page = $_GET["page"];
}

// get pagination start offset
$start_offset = ($current_page - 1) * $records_per_page;

$product_id_list = get_favorite_list_limit(
  $account_id,
  $start_offset,
  $records_per_page
);

$products = [];
foreach ($product_id_list as $id) {
  array_push($products, get_shorten_product_info($id));
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Favorite products</h1>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Image</th>
            <th>Product name</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><img class="w-100" style="height: 100px;" alt="" src="<?php echo $product["first_image"]; ?>" /></td>
              <td><a href="<?php echo $host_url; ?>/product/product_detail.php?id=<?php echo $product["id"]; ?>"><?php echo $product["product_name"]; ?></a></td>
              <td><?php echo $product["description"]; ?></td>
              <td class="text-success">VND <?php echo number_format($product["price"], 2); ?></td>
              <td><a class="btn btn-danger" href="<?php echo $host_url; ?>/favorite/remove_favorite.php?account_id=<?php echo $account_id . "&product_id=" . $product["id"]; ?>">Remove</a></td>
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
            <a class="page-link" href="<?php echo $current_page <= 1 ? "#" : $host_url . "/favorite/favorite.php?page=" . $current_page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $number_of_pages; ++$i) : ?>
            <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>">
              <a class="page-link" href="<?php echo $host_url; ?>/favorite/favorite.php?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $current_page >= $number_of_pages ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page >= $number_of_pages ? "#" : $host_url . "/favorite/favorite.php?page=" . $current_page + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
