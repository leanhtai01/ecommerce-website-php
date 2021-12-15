<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Register";
$page = "register";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1>This is register page!</h1>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
