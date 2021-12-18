<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Resend validation email";
$page = "resend_validation_email";

if (isset($_POST["resend_btn"])) {
  send_account_verify_url("Un-verified User", $_POST["email"]);

  $_SESSION["error_code"] = 0;
  $_SESSION["error_message"] = "Validation email sent!";
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center register-form">
  <form action="" method="post">
    <h1 class="mt-4">Resend validation email</h1>

    <!-- Display error message -->
    <?php if (isset($_SESSION["error_code"])) : ?>
      <div class="alert <?php echo $_SESSION["error_code"] == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
        <?php echo $_SESSION["error_message"]; ?>
        <?php
        unset($_SESSION["error_code"]);
        unset($_SESSION["error_message"]);
        ?>
      </div>
    <?php endif; ?>

    <div class="form-floating mb-3 mt-4">
      <input type="email" class="form-control" name="email" id="email" placeholder="Registered email" required autofocus>
      <label for="email">Registered email</label>
    </div>
    <div class="d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="resend_btn" type="submit">Resend</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
