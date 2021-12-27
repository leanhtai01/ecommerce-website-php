<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/cart.php");

if (
  !isset($_GET["account_id"])
  || !isset($_GET["product_id"])
  || !isset($_SESSION["account_info"])
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

remove_product_from_cart($_GET["account_id"], $_GET["product_id"]);
$_SESSION["number_of_product_in_cart"]
  = get_number_of_product_in_cart($_SESSION["account_info"]["id"]);

header("Location: " . $host_url . "/cart/cart.php");
