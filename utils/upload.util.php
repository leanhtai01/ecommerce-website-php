<?php
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

/**
 * Check whether upload mutiple image is success (size, file type, ...)
 *
 * @param array $imgs Associate array containt multiple image's information.
 *
 * @param array $allow_img_types Image file type allow to upload.
 *
 * @return bool Return true if all images upload success, false otherwise
 */
function is_upload_multiple_img_success($imgs, $allow_img_types)
{
  if (isset($imgs)) {
    $number_of_imgs = count($imgs["name"]);

    for ($i = 0; $i < $number_of_imgs; ++$i) {
      if (
        $imgs["error"][$i] != UPLOAD_ERR_OK
        || !is_uploaded_file($imgs["tmp_name"][$i])
        || !in_array(exif_imagetype($imgs["tmp_name"][$i]), $allow_img_types)
      ) {
        return false;
      }
    }
  } else {
    return false;
  }

  return true;
}

/**
 * Get image upload error message
 *
 * @param int $error_code Integer represent error
 *
 * @return string Return error message corresponding to error_code
 */
function get_error_message($error_code)
{
  $error_message = [
    0 => "There is no error, the file uploaded with success",
    1 => "The uploaded file exceeds the upload_max_filesize directive in "
      . "php.ini",
    2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was "
      . "specified in the HTML form",
    3 => "The uploaded file was only partially uploaded",
    4 => "No file was uploaded",
    6 => "Missing a temporary folder",
    7 => "Failed to write file to disk.",
    8 => "A PHP extension stopped the file upload.",
    9 => "Invalid format.",
    10 => "File wasn't uploaded via HTTP POST"
  ];

  return $error_message[$error_code];
}

/**
 * Upload one image to AWS S3
 *
 * @param string $img Image to upload
 *
 * @param string $new_name New name for uploaded file
 *
 * @return mixed|null URL to uploaded file
 */
function upload_img_to_aws_s3($img, $new_name)
{
  // instantiate an Amazon S3 client
  $s3 = new S3Client([
    "version" => "latest",
    "region"  => getenv("AWS_REGION")
  ]);

  $bucket = getenv("S3_BUCKET");

  try {
    $upload = $s3->upload(
      $bucket,
      $new_name,
      fopen($img, "rb"),
      "public-read"
    );
  } catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
  }

  return $upload->get("ObjectURL");
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
    $new_name = "product_" . $product_id . "_" . uniqid("", true) . ".jpg";

    // upload the image
    $url = upload_img_to_aws_s3($uploaded_img, $new_name);

    // add URL to list
    array_push($img_urls, $url);
  }

  return $img_urls;
}
