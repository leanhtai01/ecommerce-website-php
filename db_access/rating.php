<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Add product's rating
 *
 * @param int $account_id Account's id
 *
 * @param int $product_id Product's id
 *
 * @param string $comment User's comment
 *
 * @return bool Return true on success, false otherwise
 */
function add_rating($account_id, $product_id, $comment)
{
  global $pdo;

  $sql = "INSERT INTO ratings (account_id, product_id, comment) VALUES "
       . "(:account_id, :product_id, :comment);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "account_id" => $account_id,
    "product_id" => $product_id,
    "comment" => $comment
  ]);

  return $stmt->rowCount() > 0;
}
