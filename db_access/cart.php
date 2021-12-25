<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Add product to cart
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @param int $quantity
 *
 * @return bool Return true if add success, false otherwise
 */
function add_to_cart($account_id, $product_id, $quantity)
{
  global $pdo;

  $sql = "INSERT INTO carts (account_id, product_id, quantity) "
    . "VALUES (:account_id, :product_id, :quantity);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id,
    "quantity" => $quantity
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Check whether product in cart
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true if product in cart, false otherwise 
 */
function is_in_cart($account_id, $product_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM carts "
    . "WHERE account_id = :account_id AND product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);

  return $stmt->fetchColumn() > 0;
}
