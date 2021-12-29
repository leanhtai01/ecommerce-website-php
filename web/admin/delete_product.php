<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/product.php");

$title = "Delete product";
$page = "delete_product";

if (
  $_SESSION["role_id"] != 0
  || !isset($_GET["id"])
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

if (delete_product($_GET["id"])) {
  header("Location: " . $host_url . "/admin/product_manager.php");
} else {
  $_SESSION["error_code"] = 1;
  $_SESSION["error_message"] = "Something went wrong!";
}
