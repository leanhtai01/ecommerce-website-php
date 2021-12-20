<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");

$title = "Product Manager";
$page = "product_manager";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Product Management</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <button class="btn btn-primary">Add product</button>
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
          <tr>
            <td>1</td>
            <td>Computers</td>
            <td>Acer Nitro 5 AN515-55-53E5 Gaming Laptop</td>
            <td>Dominate the Game: With the 10th Gen Intel Core i5-10300H processor, your Nitro 5 is packed with incredible power for all your games</td>
            <td>18269938.38</td>
            <td>50</td>
            <td>2021-10-23 19:59:00</td>
            <td><a class="btn btn-info" href="">Edit</a></td>
            <td><a class="btn btn-danger" href="">Delete</a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
