<?php
$title = "Account Manager";
$page = "account_manager";

require_once(dirname(dirname(__DIR__)) . "/conf/init.conf.php");
require_once(dirname(dirname(__DIR__)) . "/db_access/account.php");

$records_per_page = 5;
$number_of_users_account = get_number_of_users_account();
$number_of_pages = ceil($number_of_users_account / $records_per_page);

// get current page
$current_page = 1;
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
  $current_page = $_GET["page"];
}

// get pagination start offset
$start_offset = ($current_page - 1) * $records_per_page;

$accounts = get_user_accounts_info_limit($start_offset, $records_per_page);
?>

<?php include_once(dirname(dirname(__DIR__)) . "/template/header.php") ?>

<h1 class="text-center">Account Management</h1>
<div class="container-fluid">
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
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 d-flex justify-content-center mt-4">
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item <?php echo $current_page <= 1 ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page <= 1 ? "#" : $host_url . "/admin/account_manager.php?page=" . $current_page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $number_of_pages; ++$i) : ?>
            <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>">
              <a class="page-link" href="<?php echo $host_url; ?>/admin/account_manager.php?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $current_page >= $number_of_pages ? "disabled" : "" ?>">
            <a class="page-link" href="<?php echo $current_page >= $number_of_pages ? "#" : $host_url . "/admin/account_manager.php?page=" . $current_page + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<?php include_once(dirname(dirname(__DIR__)) . "/template/footer.php") ?>
