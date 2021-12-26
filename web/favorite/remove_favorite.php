<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/favorite.php");

if (
  !isset($_GET["account_id"])
  || !isset($_GET["product_id"])
  || !isset($_SESSION["account_info"])
) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

remove_favorite($_GET["account_id"], $_GET["product_id"]);

header("Location: " . $host_url . "/favorite/favorite.php");
