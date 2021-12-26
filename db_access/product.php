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

  $sql = "SELECT "
    . "product_name,"
    . "description,"
    . "price,"
    . "FROM products;"
    . "WHERE id = :id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(["id" => $product_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $result["first_image"] = get_first_product_image_source($product_id);

  return $result;
}
