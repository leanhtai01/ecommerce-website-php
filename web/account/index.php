<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Profile settings";
$page = "profile";

// redirect user to suitable location
if ($_SESSION["role_id"] == 0) {
  header("Location: " . $host_url . "/admin/index.php");
} elseif ($_SESSION["role_id"] == 2) {
  header("Location: " . $host_url . "/account/login.php");
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1>This is profile page!</h1>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
