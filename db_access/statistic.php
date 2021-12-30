<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Get revenue by day
 */
function get_revenue_by_day()
{
  global $pdo;

  $sql = "SELECT SUM(p.price * od.quantity) AS revenue_by_day "
    . "FROM orders o INNER JOIN order_details od ON o.id = od.order_id "
    . "INNER JOIN products p ON p.id = od.product_id "
    . "WHERE DATE(o.order_date) = CURDATE() "
    . "GROUP BY DATE(o.order_date);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return isset($result["revenue_by_day"]) ? $result["revenue_by_day"] : false;
}

/**
 * Get revenue by month
 */
function get_revenue_by_month()
{
  global $pdo;

  $sql = "SELECT SUM(p.price * od.quantity) AS revenue_by_month "
    . "FROM orders o INNER JOIN order_details od ON o.id = od.order_id "
    . "INNER JOIN products p ON p.id = od.product_id "
    . "WHERE MONTH(o.order_date) = MONTH(CURDATE()) "
    . "  AND YEAR(o.order_date) = YEAR(CURDATE()) "
    . "GROUP BY MONTH(o.order_date), YEAR(o.order_date);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return isset($result["revenue_by_month"]) ? $result["revenue_by_month"]
    : false;
}

/**
 * Get revenue by quarter
 */
function get_revenue_by_quarter()
{
  global $pdo;

  $sql = "SELECT SUM(p.price * od.quantity) AS revenue_by_quarter "
    . "FROM orders o INNER JOIN order_details od ON o.id = od.order_id "
    . "INNER JOIN products p ON p.id = od.product_id "
    . "WHERE QUARTER(o.order_date) = QUARTER(CURDATE()) "
    . "GROUP BY QUARTER(o.order_date);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return isset($result["revenue_by_quarter"]) ? $result["revenue_by_quarter"]
    : false;
}

/**
 * Get revenue by year
 */
function get_revenue_by_year()
{
  global $pdo;

  $sql = "SELECT SUM(p.price * od.quantity) AS revenue_by_year "
    . "FROM orders o INNER JOIN order_details od ON o.id = od.order_id "
    . "INNER JOIN products p ON p.id = od.product_id "
    . "WHERE YEAR(o.order_date) = YEAR(CURDATE()) "
    . "GROUP BY YEAR(o.order_date);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return isset($result["revenue_by_year"]) ? $result["revenue_by_year"] : false;
}
