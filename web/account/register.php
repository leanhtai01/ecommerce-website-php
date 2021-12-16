<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Register";
$page = "register";
$error_code = 0;
$error_message = "";

if (isset($_POST["register_btn"])) {
  extract($_POST, EXTR_PREFIX_ALL, 'frompost');

  // create account's info associate array
  $account_info = [
    "fullname" => $frompost_fullname,
    "email" => $frompost_email,
    "password" => $frompost_password,
    "phone_number" => $frompost_phone_number,
    "address" => $frompost_address,
    "role_id" => 1, // can only register as user
    "is_verified" => 0 // new account is unverified by default
  ];

  $error_code = add_account($account_info);

  if ($error_code == 0) { // add success
    header("Location: " . $host_url . "/account/login.php");
  } elseif ($error_code == 1) {
    $error_message = "Email already exists!";
  } elseif ($error_code == 2) {
    $error_message = "Phone number already exists!";
  }
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center register-form">
  <form class="row g-3" action="" method="post">
    <h1 class="mt-4">Register</h1>

    <!-- Display error message -->
    <?php if ($error_code != 0) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <div class="col-md-6 form-floating">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
      <label for="email">Email</label>
    </div>
    <div class="col-md-6 form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      <label for="password">Password</label>
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
      <button class="btn btn-primary btn-lg" name="register_btn" type="submit">Register</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
