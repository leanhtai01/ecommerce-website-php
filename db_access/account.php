<?php
// File: account.php
// Anything related to account
// Author: 1760169 - Le Anh Tai
// Email: leanhtai01@gmail.com
// GitHub: https://github.com/leanhtai01/leanhtai01-ecommerce
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Check whether login is valid.
 * 
 * @param string $email Email address.
 *
 * @param string $password Password.
 *
 * @return array|false If the login is valid, account's info is returned. If
 * the login is invalid, false is returned.
 */
function is_valid_login($email, $password)
{
  global $pdo;

  // try to get account's info using email
  $sql = "SELECT id, fullname, password FROM accounts WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["email" => $email]);
  $account_info = $stmt->fetch(PDO::FETCH_ASSOC);

  // if account with that email exist, verify password
  if ($account_info) {
    if (password_verify($password, $account_info["password"])) {
      // not return the password
      unset($account_info["password"]);
      
      return $account_info;
    } else {
      return false;
    }
  }
}
