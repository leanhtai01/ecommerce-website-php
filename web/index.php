<?php
require_once(dirname(__DIR__) . "/conf/init.conf.php");

$title = "leanhtai01-ecommerce";
$page = "index";
?>

<?php include_once(dirname(__DIR__) . "/template/header.php") ?>

<div class="product-grid container p-0 mt-5 mb-5">
  <h1>Top sales</h1>
  <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
    <div class="col">
      <div class="card product-card">
        <i class="bi bi-heart-fill"></i>
        <img class="product-img" src="https://images-na.ssl-images-amazon.com/images/I/41mQtYQUzmL.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="product-name card-title">HP Pavilion Gaming 10th Gen Intel Core i5 Processor</h5>
          <h4 class="card-text text-danger">VND 48,000</h4>
          <button type="button" class="btn-add-to-cart btn btn-outline-primary">Add to cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card product-card">
        <i class="bi bi-heart"></i>
        <img class="product-img" src="https://images-na.ssl-images-amazon.com/images/I/41mQtYQUzmL.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="product-name card-title">HP Pavilion Gaming 10th Gen Intel Core i5 Processor</h5>
          <h4 class="card-text text-danger">VND 48,000</h4>
          <button type="button" class="btn-add-to-cart btn btn-outline-primary">Add to cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card product-card">
        <i class="bi bi-heart"></i>
        <img class="product-img" src="https://images-na.ssl-images-amazon.com/images/I/41mQtYQUzmL.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="product-name card-title">HP Pavilion Gaming 10th Gen Intel Core i5 Processor</h5>
          <h4 class="card-text text-danger">VND 48,000</h4>
          <button type="button" class="btn-add-to-cart btn btn-outline-primary">Add to cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card product-card">
        <i class="bi bi-heart"></i>
        <img class="product-img" src="https://images-na.ssl-images-amazon.com/images/I/41mQtYQUzmL.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="product-name card-title">HP Pavilion Gaming 10th Gen Intel Core i5 Processor</h5>
          <h4 class="card-text text-danger">VND 48,000</h4>
          <button type="button" class="btn-add-to-cart btn btn-outline-primary">Add to cart</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once(dirname(__DIR__) . "/template/footer.php") ?>
