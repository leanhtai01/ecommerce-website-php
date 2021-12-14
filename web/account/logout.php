<?php
require_once "../conf/init.conf.php";

session_destroy();
header('Location: index.php');
