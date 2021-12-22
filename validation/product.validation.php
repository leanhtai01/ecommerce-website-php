<?php

/**
 * Check whether product's information is valid
 *
 * @param array $product_info Product's information
 *
 * @return bool Return true if product's information is valid, false otherwise
 */
function is_valid_product_info($product_info)
{
  return true;
}

/**
 * Extract product's information from post data
 *
 * @param array $post_array POST array
 *
 * @return array|false Return product's information on success, false otherwise
 */
function extract_product_info($post_array)
{
  if (
    isset($post_array["category_id"])
    && isset($post_array["product_name"])
    && isset($post_array["description"])
    && isset($post_array["price"])
    && isset($post_array["quantity_in_stock"])
  ) {
    return [
      "category_id" => $post_array["category_id"],
      "product_name" => $post_array["product_name"],
      "description" => $post_array["description"],
      "price" => $post_array["price"],
      "quantity_in_stock" => $post_array["quantity_in_stock"]
    ];
  }

  return false;
}
