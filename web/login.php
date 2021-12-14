<?php
$title = "Login";
$page = "login";
?>

<?php include_once "header.php" ?>

<div class="text-center">
  <form class="login-form" action="" method="post">
    <h1 class="mt-4">Login</h1>
    <div class="form-floating mb-3 mt-4">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <div class="d-grid gap-2 mt-4">
      <button class="btn btn-primary btn-lg" type="submit">Login</button>
    </div>
  </form>
</div>

<?php include_once "footer.php" ?>
