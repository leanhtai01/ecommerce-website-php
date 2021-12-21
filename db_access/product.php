<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Get list of product include category's name
 *
 * @Return array|false Return array containt product's information or false if
 * failed.
 */
function get_product_list()
{
  global $pdo;

  $sql = "SELECT "
       . "p.id,"
       . "p.category_id,"
       . "c.category_name,"
       . "p.product_name,"
       . "p.description,"
       . "p.price,"
       . "p.quantity_in_stock,"
       . "p.create_at "
       . "FROM products p "
       . "INNER JOIN categories c "
       . "ON p.category_id = c.id;";
  
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
