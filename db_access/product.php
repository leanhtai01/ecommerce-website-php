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
 * @return bool Return true on success, false otherwise
 */
function add_product_img($img_info)
{
  global $pdo;

  $sql = "INSERT INTO product_images (product_id, src) "
       . "VALUES (:product_id, :src);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($img_info);

  return $stmt->rowCount();
}

/**
 * Upload multiple product image to AWS S3
 *
 * @param array $imgs List of images to upload
 *
 * @param int $product_id Product's id
 *
 * @return mixed|null URL to uploaded files
 */
function upload_multiple_product_img_to_aws_s3($imgs, $product_id)
{
  $img_urls = [];
  $number_of_imgs = count($imgs["name"]);

  for ($i = 0; $i < $number_of_imgs; ++$i) {
    $uploaded_img = $imgs["tmp_name"][$i];
    $new_name = "product_" . $product_id . "_" . uniqid() . ".jpg";

    // upload the image
    $url = upload_img_to_aws_s3($uploaded_img, $new_name);

    // add URL to list
    array_push($img_urls, $url);
  }

  return $img_urls;
}
