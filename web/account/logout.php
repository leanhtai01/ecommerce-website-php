<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");

if ($_SESSION["role_id"] == 2) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

session_destroy();
header("Location: " . $host_url . "/index.php");
