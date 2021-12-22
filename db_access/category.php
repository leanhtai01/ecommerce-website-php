<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Get category list
 *
 * @return array|false Return array containt categories's information or false
 * if failed.
 */
function get_category_list()
{
  global $pdo;

  $sql = "SELECT * FROM categories;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
