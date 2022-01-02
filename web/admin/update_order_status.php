<?php
$title = "Update order status";
$page = "update_order_status";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/order.php");

if (
  !isset($_GET["id"])
  || $_SESSION["role_id"] != 0
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$order_id = $_GET["id"];

if (isset($_POST["update_btn"])) {
  update_order_status($order_id, $_POST["status"]);
  header("Location: " . $host_url . "/admin/order_manager.php");
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center mt-4">Update order status</h1>
<div class="text-center login-form">
  <form action="" method="post">
    <div class="form-floating mb-3 mt-4">
      <select class="form-select" name="status" id="">
        <option value="waiting">waiting</option>
        <option value="canceled">canceled</option>
        <option value="processing">processing</option>
        <option value="shipping" selected>shipping</option>
        <option value="completed">completed</option>
      </select>
      <label for="status">Order status</label>
    </div>
    <div class="col-md-12 mt-4">
      <button class="btn btn-primary btn-lg me-5" name="update_btn" type="submit">Update</button>
      <a class="btn btn-danger btn-lg ms-5" href="<?php echo $host_url; ?>/admin/order_manager.php">Cancel</a>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
