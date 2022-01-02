<?php
$title = "Logout";
$page = "logout";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");

session_destroy();
header("Location: " . $host_url . "/index.php");
