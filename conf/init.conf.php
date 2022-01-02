<?php
require_once(dirname(__DIR__) . "/db_access/permission.php");

session_start();

$host_url = getenv("HOST_URL");

// set default role to guest
if (!isset($_SESSION["role_id"])) {
  $_SESSION["role_id"] = 2;
}

if (!is_permit($page, $_SESSION["role_id"])) {
  http_response_code(404);
  include_once(dirname(__DIR__) . "/template/not_found.php");
  exit();
}
