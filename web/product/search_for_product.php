<?php
$title = "Search for product";
$page = "search_for_product";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

if (!isset($_GET["keyword"])) {
  header("Location: " . $host_url . "/index.php");
}

$keyword = $_GET["keyword"];

$records_per_page = 4;
$number_of_products = count(search_for_product($_GET["keyword"]));
$number_of_pages = ceil($number_of_products / $records_per_page);

// get current page
$current_page = 1;
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
  $current_page = $_GET["page"];
}

// get pagination start offset
$start_offset = ($current_page - 1) * $records_per_page;

$products = search_for_product_limit(
  $keyword,
  $start_offset,
  $records_per_page
);
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="product-grid container p-0 mt-5 mb-5">
  <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
    <?php foreach ($products as $product) : ?>
      <div class="col">
        <div class="card product-card">
          <img class="product-img" src="<?php echo get_first_product_image_source($product["id"]); ?>" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="product-name card-title"><a class="stretched-link" href="<?php echo $host_url; ?>/product/product_detail.php?id=<?php echo $product["id"]; ?>"><?php echo $product["product_name"]; ?></a></h5>
            <h4 class="card-text text-danger">VND <?php echo number_format($product["price"], 2); ?></h4>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 d-flex justify-content-center mt-4">
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item <?php echo $current_page <= 1 ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page <= 1 ? "#" : $host_url . "/product/search_for_product.php?keyword=" . $keyword . "&page=" . $current_page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $number_of_pages; ++$i) : ?>
            <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>">
              <a class="page-link" href="<?php echo $host_url . "/product/search_for_product.php?keyword=" . $keyword . "&page=" . $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $current_page >= $number_of_pages ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page >= $number_of_pages ? "#" : $host_url . "/product/search_for_product.php?keyword=" . $keyword . "&page=" . $current_page + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
