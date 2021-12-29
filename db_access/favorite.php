<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Add product to favorite
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true on success, false otherwise
 */
function add_favorite($account_id, $product_id)
{
  global $pdo;

  $sql = "INSERT INTO favorites (account_id, product_id) VALUES "
    . "(:account_id, :product_id);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Delete product from favorites
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true on success, false otherwise
 */
function remove_favorite($account_id, $product_id)
{
  global $pdo;

  $sql = "DELETE FROM favorites "
    . "WHERE account_id = :account_id AND product_id = :product_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Check whether product in favorites
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true if product in favorites, false otherwise
 */
function is_in_favorites($account_id, $product_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM favorites "
    . "WHERE account_id = :account_id AND product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id
  ]);

  return $stmt->fetchColumn() > 0;
}

/**
 * Get number of favorites by product's id
 *
 * @param int $product_id Product's id
 *
 * @return int Return number of favorites
 */
function get_number_of_favorites($product_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM favorites "
    . "WHERE product_id = :product_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["product_id" => $product_id]);

  return $stmt->fetchColumn();
}

/**
 * Get favorite list
 *
 * @param int @account_id Account's id
 *
 * @return array Return favorite list (product's id list)
 */
function get_favorite_list($account_id)
{
  global $pdo;

  $sql = "SELECT product_id FROM favorites WHERE account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $favorite_list = [];

  foreach ($result as $r) {
    array_push($favorite_list, $r["product_id"]);
  }

  return $favorite_list;
}

/**
 * Get number of favorite
 *
 * @param int $account_id Account's id
 *
 * @return int Return number of favorites
 */
function get_number_of_favorite($account_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM favorites WHERE account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);

  return $stmt->fetchColumn();
}

/**
 * Get only a number of favorites
 *
 * @param int $account_id Account's id.
 *
 * @param int $offset Beginning offset.
 *
 * @param int $number_of_records Number of records will be retrieved
 *
 * @return array|false Return number of records or false if failed
 */
function get_favorite_list_limit($account_id, $offset, $number_of_records)
{
  global $pdo;

  $sql = "SELECT product_id FROM favorites WHERE account_id = :account_id "
    . "LIMIT $offset, $number_of_records;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $favorite_list = [];

  foreach ($result as $r) {
    array_push($favorite_list, $r["product_id"]);
  }

  return $favorite_list;
}

/**
 * Get top favorite products
 *
 * @param int $number_of_product Number of product to return
 *
 * @return array Return a number of top favorite products
 */
function get_top_favorite_products($number_of_product)
{
  global $pdo;

  $sql = "SELECT p.id, p.product_name, p.price "
    . "FROM products p INNER JOIN favorites f "
    . "ON p.id = f.product_id "
    . "WHERE p.is_deleted = 0 "
    . "GROUP BY p.id "
    . "ORDER BY COUNT(p.id) DESC "
    . "LIMIT $number_of_product;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
