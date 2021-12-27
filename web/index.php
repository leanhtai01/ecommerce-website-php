<?php
require_once(dirname(__DIR__) . "/conf/init.conf.php");
require_once(dirname(__DIR__) . "/db_access/product.php");
require_once(dirname(__DIR__) . "/db_access/favorite.php");

$title = "leanhtai01-ecommerce";
$page = "index";

$newest_product = get_newest_products(10);
$top_favorite_products = get_top_favorite_products(10);
?>

<?php include_once(dirname(__DIR__) . "/template/header.php") ?>

<div class="product-grid container p-0 mt-4 mb-5">
  <h1>Newest products</h1>
  <div class="row row-cols-1 row-cols-lg-5 row-cols-md-2 g-4">
    <?php foreach ($newest_product as $product) : ?>
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
  <br />
  <hr style="height:4px; width:100%; border-width:0; color:black; background-color:black">
  <h1 class="mt-4">Top favorite products</h1>
  <div class="row row-cols-1 row-cols-lg-5 row-cols-md-2 g-4">
    <?php foreach ($top_favorite_products as $product) : ?>
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
</div>

<?php include_once(dirname(__DIR__) . "/template/footer.php") ?>
