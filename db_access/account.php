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
  $sql = "SELECT id, fullname, password, role_id FROM accounts "
    . "WHERE email = :email;";
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

/**
 * Add new account
 *
 * @param array $account_info New account information
 *
 * @return 0|1|2 Return 0 on success, 1 if email already exist, 2 if
 * phone_number already exists
 */
function add_account($account_info)
{
  global $pdo;

  if (is_email_exists($account_info["email"])) {
    return 1;
  }

  if (is_phone_number_exists($account_info["phone_number"])) {
    return 2;
  }

  // encrypted password
  $account_info["password"] = password_hash(
    $account_info["password"],
    PASSWORD_DEFAULT
  );

  // add account
  $sql = "INSERT INTO accounts "
    . "(fullname, email, password, phone_number, address, role_id) "
    . "VALUES "
    . "(:fullname, :email, :password, :phone_number, :address, :role_id);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($account_info);

  return 0;
}

/**
 * Check whether email is exists
 *
 * @param string $email Email address.
 *
 * @return true|false Return true if the email exists, false otherwise
 */
function is_email_exists($email)
{
  global $pdo;
  $sql = "SELECT COUNT(*) FROM accounts WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["email" => $email]);

  return $stmt->fetchColumn() > 0;
}

/**
 * Check whether phone_number is exists
 *
 * @param string $phone_number Phone number.
 *
 * @return true|false Return true if the phone_number exists, false otherwise
 */
function is_phone_number_exists($phone_number)
{
  global $pdo;
  $sql = "SELECT COUNT(*) FROM accounts WHERE phone_number = :phone_number;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["phone_number" => $phone_number]);

  return $stmt->fetchColumn() > 0;
}

/**
 * Create random token.
 *
 * @param string $email Email address.
 *
 * @return array Return array containt token's info (email, token, expire_date).
 */
function create_token($email)
{
  global $pdo;

  // create token's information
  $token = bin2hex(random_bytes(10));
  $expire_date = date("Y-m-d H:i:s", time() + 15 * 60);
  $token_info = [
    "email" => $email,
    "token" => $token,
    "expire_date" => $expire_date
  ];

  $sql = "INSERT INTO tokens (email, token, expire_date) "
       . "VALUES (:email, :token, :expire_date);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($token_info);

  return $token_info;
}

/**
 * Get fullname by email.
 *
 * @param string $email Email address.
 *
 * @return string|false Return fullname if email exists, false otherwise
 */
function get_fullname_by_email($email)
{
  global $pdo;

  $sql = "SELECT fullname FROM accounts WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["email" => $email]);

  return $stmt->fetchColumn();
}
