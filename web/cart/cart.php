<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");

$title = "Cart";
$page = "cart";
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
          <tr>
            <td><img class="w-100" style="height: 100px;" alt="" src="https://leanhtai01.s3.us-east-2.amazonaws.com/product_3_61c5d4c64e07c0.80666908.jpg" /></td>
            <td><a href="<?php echo $host_url; ?>/product/product_detail.php?id=<?php echo 3; ?>" target="_blank">Lenovo IdeaPad 3 Laptop</a></td>
            <td class="text-success">VND <?php echo number_format(11003770.75, 2); ?></td>
            <td><?php echo 1; ?></td>
            <td><a class="btn btn-info" href="">Update quantity</a></td>
            <td><a class="btn btn-danger" href="">Remove</a></td>
          </tr>
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
