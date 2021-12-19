<?php

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
  }

  return true;
}
