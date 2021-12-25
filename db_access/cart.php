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
