<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");

if ($_SESSION["role_id"] != 0) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Administration";
$page = "admin_index";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1>This is Administrator homepage!</h1>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
