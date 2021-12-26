<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/favorite.php");

// only normal logged in user can access this page
if ($_SESSION["role_id"] != 1) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Favorite";
$page = "favorite";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1>This is favorite page!</h1>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
