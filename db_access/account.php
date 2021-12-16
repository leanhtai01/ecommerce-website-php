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
  $sql = "SELECT * FROM accounts WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["email" => $email]);

  return $stmt->rowCount() > 0;
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
  $sql = "SELECT * FROM accounts WHERE phone_number = :phone_number;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["phone_number" => $phone_number]);

  return $stmt->rowCount() > 0;
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

/**
 * Check whether token is valid
 *
 * @param array $token_info Token's information (email, token)
 *
 * @return bool Return true if token is valid, false otherwise
 */
function is_valid_token($token_info)
{
  $is_valid = false;

  global $pdo;

  $sql = "SELECT expire_date FROM tokens "
    . "WHERE email = :email AND token = :token;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($token_info);

  if ($expire_date = $stmt->fetchColumn()) {
    if (strtotime($expire_date) > time()) {
      $is_valid = true;
    }
  }

  return $is_valid;
}

/**
 * Change account's password
 *
 * @param string $email Email address
 *
 * @param string $new_password New password
 *
 * @return bool Return true on success change password, false otherwise
 */
function change_password($email, $new_password)
{
  global $pdo;

  $sql = "UPDATE accounts SET password = :password WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "email" => $email,
    "password" => password_hash($new_password, PASSWORD_DEFAULT)
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Delete token
 *
 * @param array $token_info Token's information (email, token)
 *
 * @return bool Return true if delete success, false otherwise
 */
function delete_token($token_info)
{
  global $pdo;

  $sql = "DELETE FROM tokens WHERE email = :email AND token = :token;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($token_info);

  return $stmt->rowCount() > 0;
}

/**
 * Get personal's info (fullname, email, phone_number, address)
 *
 * @param int $account_id
 *
 * @return array|false Return personal's info (fullname, email, phone_number,
 * address) in success. Return false if account_id is not found.
 */
function get_personal_info($account_id)
{
  global $pdo;

  $sql = "SELECT fullname, email, phone_number, address FROM accounts "
    . "WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $account_id]);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Update personal's info (id, fullname, email, phone_number, address)
 *
 * @param array $personal_info personal's info (id, fullname, email, 
 * phone_number, address)
 *
 * @return true|1|2|false Return true if success change personal's info, 1 if
 * new email already exists, 2 if new phone_number already exists, false
 * otherwise
 */
function update_personal_info($personal_info)
{
  global $pdo;

  if (is_new_email_exists($personal_info["email"], $personal_info["id"])) {
    return 1;
  }

  if (is_new_phone_number_exists($personal_info["phone_number"],
                                 $personal_info["id"])) {
    return 2;
  }

  $sql = "UPDATE accounts "
    . "SET fullname = :fullname, "
    . "email = :email, "
    . "phone_number = :phone_number, "
    . "address = :address "
    . "WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($personal_info);

  return $stmt->rowCount() > 0 ? 0 : false;
}

/**
 * Check whether email already exists (ignore account with specific id)
 *
 * @param string $email Account's email address
 *
 * @param int $account_id Account's id
 *
 * @return bool Return true if email exists, false otherwise
 */
function is_new_email_exists($email, $account_id)
{
  global $pdo;
  $sql = "SELECT * FROM accounts WHERE email = :email AND id != :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "email" => $email,
    "id" => $account_id
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Check whether phone_number already exists (ignore account with specific id)
 *
 * @param string $phone_number Account's phone number
 *
 * @param int $account_id Account's id
 *
 * @return bool Return true if phone_number exists, false otherwise
 */
function is_new_phone_number_exists($phone_number, $account_id)
{
  global $pdo;
  $sql = "SELECT * FROM accounts "
       . "WHERE phone_number = :phone_number AND id != :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "phone_number" => $phone_number,
    "id" => $account_id
  ]);

  return $stmt->rowCount() > 0;
}
