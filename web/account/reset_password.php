<?php
$title = "Reset password";
$page = "reset_password";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$error_code = null;
$error_message = "";
$is_valid_token = false;

extract($_GET, EXTR_PREFIX_ALL, "fromget");
extract($_POST, EXTR_PREFIX_ALL, "frompost");

if (isset($fromget_email) && isset($fromget_token)) {
  $token_info = [
    "email" => $fromget_email,
    "token" => $fromget_token
  ];

  $is_valid_token = is_valid_token($token_info);

  if ($is_valid_token) {
    if (isset($frompost_change_password_btn)) {
      if ($frompost_password_1 != $frompost_password_2) {
        $error_code = 1;
        $error_message = "Two password must be the same!";
      } else {
        // delete verified token
        delete_token($token_info);
        $is_valid_token = false;

        if (change_password($fromget_email, $frompost_password_1)) {
          $link_to_login = "<a href='$host_url/account/login.php'>login</a>";

          $error_code = 0;
          $error_message = "Password changed! "
            . "You can now $link_to_login with new password!";
        } else {
          $error_code = 1;
          $error_code = "Something went wrong! Try again later!";
        }
      }
    }
  } else {
    $error_code = 1;
    $error_message = "Invalid token!";
  }
} else {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center login-form">
  <form action="" method="post">
    <h1 class="mt-4">Reset password</h1>

    <!-- Display error message -->
    <?php if (isset($error_code)) : ?>
      <div class="alert <?php echo $error_code == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <?php if ($is_valid_token) : ?>
      <div class="form-floating mb-3 mt-4">
        <input type="password" class="form-control" name="password_1" id="password_1" placeholder="Password" required autofocus>
        <label for="password_1">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Re-enter password" required>
        <label for="password_2">Re-enter password</label>
      </div>
      <div class="d-grid gap-2 mt-4">
        <button class="btn btn-primary btn-lg" name="change_password_btn" type="submit">Change Password</button>
      </div>
    <?php endif; ?>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
