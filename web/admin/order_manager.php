<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/order.php");

$title = "Order Manager";
$page = "order_manager";

if ($_SESSION["role_id"] != 0) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$records_per_page = 5;
$number_of_orders = get_number_of_orders();
$number_of_pages = ceil($number_of_orders / $records_per_page);

// get current page
$current_page = 1;
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
  $current_page = $_GET["page"];
}

// get pagination start offset
$start_offset = ($current_page - 1) * $records_per_page;

$orders = get_order_list_limit($start_offset, $records_per_page);
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Order Management</h1>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Ship name</th>
            <th>Ship phone number</th>
            <th>Ship address</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $order) : ?>
            <tr>
              <td><?php echo $order["id"]; ?></td>
              <td><?php echo $order["ship_name"]; ?></td>
              <td><?php echo $order["ship_phone_number"]; ?></td>
              <td><?php echo $order["ship_address"]; ?></td>
              <td><?php echo $order["status"]; ?></td>
              <td><a class="btn btn-primary" href="">Update status</a></td>
              <td><a class="btn btn-secondary" href="">View detail</a></td>
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
            <a class="page-link" href="<?php echo $current_page <= 1 ? "#" : $host_url . "/admin/order_manager.php?page=" . $current_page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $number_of_pages; ++$i) : ?>
            <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>">
              <a class="page-link" href="<?php echo $host_url; ?>/admin/order_manager.php?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $current_page >= $number_of_pages ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page >= $number_of_pages ? "#" : $host_url . "/admin/order_manager.php?page=" . $current_page + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
