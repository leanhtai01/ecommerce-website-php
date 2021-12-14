<?php
session_start();

require_once "../db_access/account.php";

$title = "Login";
$page = "login";
$error = "";

if (isset($_POST["login_btn"])) {
  extract($_POST, EXTR_PREFIX_ALL, 'frompost');

  $account_info = is_valid_login($frompost_email, $frompost_password);

  if ($account_info) {
    $_SESSION["account_info"] = $account_info;
    header('Location: index.php');
  } else {
    $error = "Invalid email or password!";
  }
}
?>

<?php include_once "../template/header.php" ?>

<div class="text-center">
  <form class="login-form" action="" method="post">
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
    <div class="d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" name="login_btn" type="submit">Login</button>
    </div>
  </form>
</div>

<?php include_once "../template/footer.php" ?>
