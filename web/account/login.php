<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$title = "Login";
$page = "login";
$error = "";

if (isset($_POST["login_btn"])) {
  extract($_POST, EXTR_PREFIX_ALL, 'frompost');

  $account_info = is_valid_login($frompost_email, $frompost_password);

  if (is_array($account_info)) {
    $_SESSION["account_info"] = $account_info;
    $_SESSION["role_id"] = $account_info["role_id"];

    // redirect user to suitable location
    if ($_SESSION["role_id"] == 0) {
      header("Location: " . $host_url . "/admin/index.php");
    } elseif ($_SESSION) {
      header("Location: " . $host_url . "/index.php");
    }
  } elseif ($account_info === false) {
    $error = "Invalid email or password!";
  } elseif ($account_info === 0) {
    $error = "Email is not verified! Please check your email";
  }
}
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<div class="text-center login-form">
  <form action="" method="post">
    <h1 class="mt-4">Login</h1>

    <!-- Display error message -->
    <?php if ($error) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <div class="form-floating mb-3 mt-4">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <div class="mt-4">
      <a href="<?php echo $host_url ?>/account/forgot_password.php" class="link-primary">Forgot password?</a>
    </div>
    <div class="d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="login_btn" type="submit">Login</button>
    </div>
  </form>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
