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

/**
 * Create new order
 *
 * @param array $order_info Order's information (account_id, ship_name,
 * ship_phone_number, ship_address, status)
 *
 * @return int|false Return last insert id on success, false otherwise
 */
function create_order($order_info)
{
  global $pdo;

  $sql = "INSERT INTO orders ("
    . "account_id,"
    . "ship_name,"
    . "ship_phone_number,"
    . "ship_address,"
    . "status"
    . ") VALUES "
    . "("
    . ":account_id,"
    . ":ship_name,"
    . ":ship_phone_number,"
    . ":ship_address,"
    . ":status"
    . ");";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($order_info);

  return $stmt->rowCount() ? $pdo->lastInsertId() : false;
}

/**
 * Create order detail
 *
 * @param array $order_detail_info Order detail's information (order_id,
 * product_id, quantity).
 *
 * @return bool Return true on success, false otherwise
 */
function create_order_detail($order_detail_info)
{
  global $pdo;

  $sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES "
    . "(:order_id, :product_id, :quantity);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($order_detail_info);

  return $stmt->rowCount() > 0;
}

/**
 * Get number of orders
 *
 * @return int Return number of orders
 */
function get_number_of_orders()
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM orders;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchColumn();
}

/**
 * Get number of orders
 *
 * @param int $account_id
 *
 * @return int Return number of orders
 */
function get_number_of_orders_by_account($account_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM orders WHERE account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);

  return $stmt->fetchColumn();
}

/**
 * Get a number of orders
 *
 * @param int $offset Beginning offset
 *
 * @param int $number_of_order Number of orders to return
 *
 * @return array Return a number of orders
 */
function get_order_list_limit($offset, $number_of_order)
{
  global $pdo;

  $sql = "SELECT id, ship_name, ship_phone_number, ship_address, status, order_date "
    . "FROM orders "
    . "LIMIT $offset, $number_of_order;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Update order status
 *
 * @param int $order_id Order's id
 *
 * @param string $status Order's status
 *
 * @return bool Return true on success, false otherwise
 */
function update_order_status($order_id, $status)
{
  global $pdo;

  $sql = "UPDATE orders SET status = :status WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "id" => $order_id,
    "status" => $status
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Get order's information
 *
 * @param int $order_id Order's id
 *
 * @return array Return Order's information (ship_name, ship_phone_number,
 * ship_address, order_date, status)
 */
function get_order_info($order_id)
{
  global $pdo;

  $sql = "SELECT "
    . "ship_name,"
    . "ship_phone_number,"
    . "ship_address,"
    . "order_date,"
    . "status "
    . "FROM orders "
    . "WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $order_id]);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Get products in order detail
 *
 * @param int $order_id Order's id
 *
 * @return array Product's information from given order_id
 */
function get_products_in_order_detail($order_id)
{
  global $pdo;

  $sql = "SELECT p.id, p.product_name, od.quantity, p.price "
    . "FROM products p INNER JOIN order_details od "
    . "ON p.id = od.product_id "
    . "WHERE od.order_id = :order_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["order_id" => $order_id]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get payment total history
 *
 * @param int $order_id Order's id
 */
function get_payment_total_history($order_id)
{
  global $pdo;

  $sql = "SELECT SUM(p.price * od.quantity) "
    . "FROM products p INNER JOIN order_details od "
    . "ON p.id = od.product_id "
    . "WHERE od.order_id = :order_id "
    . "GROUP BY od.order_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["order_id" => $order_id]);

  return $stmt->fetchColumn();
}

/**
 * Get orders by account_id
 *
 * @param int $account_id Account's id
 *
 * @param int $offset Beginning offset
 *
 * @param int $number_of_order Number of order to return
 *
 * @return array Return order's information for given account_id
 */
function get_orders_by_account_id_limit($account_id, $offset, $number_of_order)
{
  global $pdo;

  $sql = "SELECT "
    . "id,"
    . "ship_name,"
    . "ship_phone_number,"
    . "ship_address,"
    . "order_date,"
    . "status "
    . "FROM orders "
    . "WHERE account_id = :account_id "
    . "LIMIT $offset, $number_of_order;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["account_id" => $account_id]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Check whether order belong to account
 *
 * @param int $order_id Order's id
 *
 * @param int $account_id Account's id
 *
 * @return bool Return true if order belong to account, false otherwise
 */
function is_order_belong_to_account($order_id, $account_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM orders "
    . "WHERE id = :id AND account_id = :account_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "id" => $order_id,
    "account_id" => $account_id
  ]);

  return $stmt->fetchColumn();
}
