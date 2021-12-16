<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Profile settings";
$page = "profile";
$error_code = null;
$error_message = "";

// redirect user to suitable location
if ($_SESSION["role_id"] == 0) {
  header("Location: " . $host_url . "/admin/index.php");
} elseif ($_SESSION["role_id"] == 2) {
  header("Location: " . $host_url . "/account/login.php");
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center register-form">
  <form class="row g-3" action="" method="post">
    <h1 class="mt-4">Profile settings</h1>

    <!-- Display error message -->
    <?php if (isset($error_code)) : ?>
      <div class="alert <?php echo $error_code == 0 ? "alert-success" : "alert-danger"; ?>" role="alert">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <div class="col-12 form-floating">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
      <label for="email">Email</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number" required>
      <label for="phone_number">Phone number</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full name" required>
      <label for="fullname">Full name</label>
    </div>
    <div class="col-12 form-floating">
      <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
      <label for="address">Address</label>
    </div>
    <div class="col-12 d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="update_btn" type="submit">Update</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
