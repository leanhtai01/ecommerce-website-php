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
  // if product is in cart, update the quantity
  if (is_in_cart($account_id, $product_id)) {
    $curr_quantity = get_product_quantity_in_cart($account_id, $product_id);
    return update_cart($account_id, $product_id, $quantity + $curr_quantity);
  }

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

/**
 * Update product's quantity in cart
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @param int $quantity Product's quantity
 *
 * @return bool Return true if update success, false otherwise 
 */
function update_cart($account_id, $product_id, $quantity)
{
  global $pdo;

  $sql = "UPDATE carts SET quantity = :quantity "
    . "WHERE account_id = :account_id AND product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id,
    "quantity" => $quantity
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Get product's quantity in cart
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return int|false Return product's quantity on success, false otherwise
 */
function get_product_quantity_in_cart($account_id, $product_id)
{
  global $pdo;

  $sql = "SELECT quantity FROM carts "
    . "WHERE account_id = :account_id AND product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result ? $result["quantity"] : false;
}

/**
 * Get number of products in cart
 *
 * @param int $account_id Account's id
 *
 * @return int Number of product in cart
 */
function get_number_of_product_in_cart($account_id)
{
  global $pdo;

  $sql = "SELECT SUM(quantity) AS total FROM carts "
    . "WHERE account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result["total"] ? $result["total"] : 0;
}

/**
 * Get products in cart
 *
 * @param int account_id Account's id
 *
 * @return array Return products'info (id, product_name, price, quantity) in
 * cart of the account
 */
function get_products_in_cart($account_id)
{
  global $pdo;

  $sql = "SELECT p.id, p.product_name, p.price, c.quantity "
    . "FROM products p INNER JOIN carts c "
    . "ON p.id = c.product_id "
    . "WHERE c.account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Remove product from cart
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true if remove success, false otherwise
 */
function remove_product_from_cart($account_id, $product_id)
{
  global $pdo;

  $sql = "DELETE FROM carts "
    . "WHERE account_id = :account_id AND product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);

  return $stmt->rowCount() > 0;
}
