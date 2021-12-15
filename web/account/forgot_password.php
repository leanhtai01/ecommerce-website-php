<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Forgot password";
$page = "forgot_password";
$error_message = "";
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center login-form">
  <form action="" method="post">
    <h1 class="mt-4">Forgot password</h1>

    <!-- Display error message -->
    <?php if ($error_message) : ?>
      <div class="alert alert-danger" role="alert">
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
