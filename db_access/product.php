<?php
require_once(dirname(__DIR__) . "/conf/db.conf.php");
require_once(dirname(__DIR__) . "/utils/upload.util.php");

/**
 * Get list of product include category's name
 *
 * @return array|false Return array containt products's information or false if
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

/**
 * Add product's information to table products
 *
 * @param array $product_info Product's information (category_id, product_name,
 * description, price, quantity_in_stock)
 *
 * @return int|false Return last insert id on success, false otherwise
 */
function add_product_info($product_info)
{
  global $pdo;

  $sql = "INSERT INTO products ("
    . "category_id,"
    . "product_name,"
    . "description,"
    . "price,"
    . "quantity_in_stock)"
    . "VALUES ("
    . ":category_id,"
    . ":product_name,"
    . ":description,"
    . ":price,"
    . ":quantity_in_stock);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($product_info);

  return $stmt->rowCount() ? $pdo->lastInsertId() : false;
}

/**
 * Add a product's image
 *
 * @param array $img_info Image's information (product_id, src)
 *
 * @return int|false Return last insert id on success, false otherwise
 */
function add_product_img($img_info)
{
  global $pdo;

  $sql = "INSERT INTO product_images (product_id, src) "
    . "VALUES (:product_id, :src);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($img_info);

  return $stmt->rowCount() ? $pdo->lastInsertId() : false;
}

/**
 * Add multiple product's image
 *
 * @param int $product_id Product's id
 *
 * @param array $sources_list Source to images
 *
 * @return bool Return true on success, false otherwise
 */
function add_multiple_product_img($product_id, $sources_list)
{
  foreach ($sources_list as $src) {
    if (!add_product_img([
      "product_id" => $product_id,
      "src" => $src
    ])) {
      return false;
    }
  }

  return true;
}

/**
 * Get product's info (id, category_id, category_name, product_name,
 * description, price, quantity_in_stock)
 *
 * @param int $product_id Product's id
 *
 * @return array|false Return product's info on success, false otherwise
 */
function get_product_info($product_id)
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
    . "ON p.category_id = c.id "
    . "WHERE p.id = :id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Get product's image sources
 *
 * @param int $product_id Product's id
 *
 * @return array|false Return product's image sources on success, false
 * otherwise.
 */
function get_product_image_sources($product_id)
{
  $img_sources = [];

  global $pdo;

  $sql = "SELECT src FROM product_images WHERE product_id = :product_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["product_id" => $product_id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result as $r) {
    array_push($img_sources, $r["src"]);
  }

  return $img_sources;
}

/**
 * Get first product's image source
 *
 * @param int $product_id Product's id
 *
 * @return string|false Return first product's image source on success, false
 * otherwise.
 */
function get_first_product_image_source($product_id)
{
  global $pdo;

  $sql = "SELECT src FROM product_images WHERE product_id = :product_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["product_id" => $product_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result["src"];
}

/**
 * Update product's information
 *
 * @param array $product_info Product's information (id, category_id,
 * product_name, description, price, quantity_in_stock)
 *
 * @return bool Return true on success, false otherwise
 */
function update_product_info($product_info)
{
  global $pdo;

  $sql = "UPDATE products SET "
    . "category_id = :category_id,"
    . "product_name = :product_name,"
    . "description = :description,"
    . "price = :price,"
    . "quantity_in_stock = :quantity_in_stock "
    . "WHERE id = :id;";

  $stmt = $pdo->prepare($sql);
  $stmt->execute($product_info);

  return $stmt->rowCount() > 0;
}

/**
 * Get product's info (first product's image, product_name, description, price)
 *
 * @param int $product_id Product's id
 *
 * @return array|false Return product's info on success, false otherwise
 */
function get_shorten_product_info($product_id)
{
  global $pdo;

  $sql = "SELECT id, product_name, description, price FROM products "
    . "WHERE id = :id;";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $result["first_image"] = get_first_product_image_source($product_id);

  return $result;
}

/**
 * Get newest products
 *
 * @param int $number_of_product Number of product to return
 *
 * @return array Return a number of newest product
 */
function get_newest_products($number_of_product)
{
  global $pdo;

  $sql = "SELECT id, product_name, price FROM products ORDER BY create_at DESC "
    . "LIMIT $number_of_product;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Search for product (in product_name and description) given a keyword
 *
 * @param string $keyword
 *
 * @return array Return products corresponding to keyword
 */
function search_for_product($keyword)
{
  global $pdo;

  $sql = "SELECT id, product_name, price FROM products "
    . "WHERE (UPPER(product_name) LIKE UPPER(:keyword)) "
    . "OR (UPPER(description) LIKE UPPER(:keyword));";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["keyword" => "%" . $keyword . "%"]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Search for product (in product_name and description) given a keyword
 *
 * @param string $keyword
 *
 * @param int $offset Beginning offset
 *
 * @param int $number_of_product Number of product will be retrieved
 *
 * @return array Return products corresponding to keyword
 */
function search_for_product_limit($keyword, $offset, $number_of_product)
{
  global $pdo;

  $sql = "SELECT id, product_name, price FROM products "
    . "WHERE (UPPER(product_name) LIKE UPPER(:keyword)) "
    . "OR (UPPER(description) LIKE UPPER(:keyword)) "
    . "LIMIT $offset, $number_of_product;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["keyword" => "%" . $keyword . "%"]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get current quantity in stock
 *
 * @param int $product_id Product's id
 *
 * @return int Return current quantity in stock
 */
function get_current_quantity_in_stock($product_id)
{
  global $pdo;

  $sql = "SELECT quantity_in_stock FROM products WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result["quantity_in_stock"];
}

/**
 * Update product's quantity in stock
 *
 * @param int $product_id Product's id
 *
 * @param int $amount Amount to increase/decrease
 *
 * @return bool Return true if update success, false otherwise
 */
function update_product_quantity_in_stock($product_id, $amount)
{
  global $pdo;

  // calculate new quantity_in_stock
  $new_quantity_in_stock = get_current_quantity_in_stock($product_id) + $amount;

  $sql = "UPDATE products SET quantity_in_stock = :quantity_in_stock "
    . "WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "id" => $product_id,
    "quantity_in_stock" => $new_quantity_in_stock
  ]);

  return $stmt->rowCount() > 0;
}

/**
 * Get top sales products
 *
 * @param int $number_of_product Number of product to return
 *
 * @return array Return a number of top sales product
 */
function get_top_sales_products($number_of_product)
{
  global $pdo;

  $sql = "SELECT p.id, p.product_name, p.price "
    . "FROM products p INNER JOIN order_details o "
    . "ON p.id = o.product_id "
    . "WHERE p.is_deleted = 0 "
    . "GROUP BY p.id "
    . "ORDER BY SUM(o.quantity) DESC "
    . "LIMIT $number_of_product;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Mark a product as deleted
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true on success, false otherwise
 */
function delete_product($product_id)
{
  global $pdo;

  $sql = "UPDATE products SET is_deleted = 1 WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);

  return $stmt->rowCount() > 0;
}

/**
 * Check whether product is marked delete
 *
 * @param int $product_id Product's id
 *
 * @return bool Return true if product is deleted, false otherwise
 */
function is_product_deleted($product_id)
{
  global $pdo;

  $sql = "SELECT is_deleted FROM products WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result["is_deleted"] == 1 ? true : false;
}
