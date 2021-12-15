<?php
session_start();

$host_url = getenv("HOST_URL");

// set default role to guest
if (!isset($_SESSION["role_id"])) {
  $_SESSION["role_id"] = 2;
}
