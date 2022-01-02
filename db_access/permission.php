<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");

/**
 * Check whether user have permission on a specific page
 *
 * @param string $page Page's name
 *
 * @param int $role_id Role's id
 *
 * @return bool Return true if user have permission, false otherwise
 */
function is_permit($page, $role_id)
{
  global $pdo;

  $sql = "SELECT COUNT(*) FROM permissions "
    . "WHERE page = :page AND role_id = :role_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "page" => $page,
    "role_id" => $role_id
  ]);

  return $stmt->fetchColumn() > 0;
}
