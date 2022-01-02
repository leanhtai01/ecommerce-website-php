<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");
require_once(dirname(dirname(__DIR__)) . "/utils/mail.util.php");

if ($_SESSION["role_id"] != 2) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Forgot password";
$page = "forgot_password";
$error_code = null;
$error_message = "";

if (isset($_POST["send_email_btn"])) {
  extract($_POST, EXTR_PREFIX_ALL, 'frompost');

  if (is_email_exists($frompost_email)) {
    $token_info = create_token($frompost_email);
    $receiver = [
      "name" => get_fullname_by_email($frompost_email),
      "email" => $frompost_email
    ];
    $subject = "[leanhtai01-ecommerce] Reset password";
    $content = "<p>Please click on the following link to reset password:</p>"
      . "<p>$host_url" . "/account/reset_password.php?email=" . $token_info["email"]
      . "&token=" . $token_info["token"] . "</p>"
      . "<p>Expire date: " . $token_info["expire_date"] . "</p>";

    if (sendmail($receiver, $subject, $content)) {
      $error_code = 0;
      $error_message = "Reset link sent!";
    } else {
      $error_code = 1;
      $error_message = "Try again later!";
    }
  } else {
    $error_code = 1;
    $error_message = "The email is not exists!";
  }
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center login-form">
  <form action="" method="post">
    <h1 class="mt-4">Forgot password</h1>

    <!-- Display error message -->
    <?php if (isset($error_code)) : ?>
      <div class="alert <?php echo $error_code == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <div class="form-floating mb-3 mt-4">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
      <label for="email">Email address</label>
    </div>
    <div class="d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="send_email_btn" type="submit">Send email</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
