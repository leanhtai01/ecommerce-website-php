<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Get payment total
 *
 * @param int $account_id Account's id
 */
function get_payment_total($account_id)
{
  global $pdo;

  $sql = "SELECT SUM(c.quantity * p.price) "
       . "FROM carts c INNER JOIN products p "
       . "ON c.product_id = p.id "
       . "WHERE c.account_id = :account_id "
       . "GROUP BY c.account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);

  return $stmt->fetchColumn();
}
