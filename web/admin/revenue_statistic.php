<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/statistic.php");

$title = "Revenue statistic";
$page = "revenue_statistic";

if (
  $_SESSION["role_id"] != 0
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Revenue statistics</h1>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card w-100">
        <div class="card-header">
          <h3>Revenue by day</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-success">VND <?php echo number_format(get_revenue_by_day(), 2); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card w-100">
        <div class="card-header">
          <h3>Revenue by month</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-success">VND <?php echo number_format(get_revenue_by_month(), 2); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card w-100">
        <div class="card-header">
          <h3>Revenue by quarter</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-success">VND <?php echo number_format(get_revenue_by_quarter(), 2); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card w-100">
        <div class="card-header">
          <h3>Revenue by year</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-success">VND <?php echo number_format(get_revenue_by_year(), 2); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
