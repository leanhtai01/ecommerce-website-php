<?php
$title = "Verify account";
$page = "verify_account";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$error_code = null;
$error_message = "";
$is_valid_token = false;

extract($_GET, EXTR_PREFIX_ALL, "fromget");

if (isset($fromget_email) && isset($fromget_token)) {
  $token_info = [
    "email" => $fromget_email,
    "token" => $fromget_token
  ];

  $is_valid_token = is_valid_token($token_info);

  if ($is_valid_token) {
    delete_token($token_info);

    set_account_to_verified($fromget_email);

    $link_to_login = "<a href='$host_url/account/login.php'>login</a>";
    $error_code = 0;
    $error_message = "Account verified successfully! "
      . "You can now $link_to_login!";
  } else {
    $error_code = 1;
    $error_message = "Invalid token";
  }
} else {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center">
  <!-- Display error message -->
  <?php if (isset($error_code)) : ?>
    <div class="alert <?php echo $error_code == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
      <?php echo $error_message; ?>
    </div>
  <?php endif; ?>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
