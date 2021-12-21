<?php
require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

if ($_SESSION["role_id"] != 0) {
  http_response_code(404);
  include_once(dirname(dirname(__DIR__)) . "/template/not_found.php");
  exit();
}

$title = "Account Manager";
$page = "account_manager";

$accounts = get_user_accounts_info();
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Account Management</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <button class="btn btn-primary">Add account</button>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Is Verified</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($accounts as $account) : ?>
            <tr>
              <td><?php echo $account["id"] ?></td>
              <td><?php echo $account["fullname"] ?></td>
              <td><?php echo $account["email"] ?></td>
              <td><?php echo $account["phone_number"] ?></td>
              <td><?php echo $account["address"] ?></td>
              <td>
                <?php
                if ($account["is_verified"] == 0) {
                  echo "No";
                } else {
                  echo "Yes";
                }
                ?>
              </td>
              <td><a class="btn btn-info" href="">Edit</a></td>
              <td><a class="btn btn-danger" href="">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
