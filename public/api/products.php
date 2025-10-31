<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

require_once '../inc/connection.php';

$method = $_SERVER['REQUEST_METHOD'];

try {
  $connection = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USER, DB_PASS);
}
catch (PDOExeption $e) {
  echo json_encode([
    'success' => false,
    'error' => 'Connection failed ' . $e->getMessage(),
  ]);

  die();
}

$action = $_REQUEST['action'] ?? null;

if (!$action) {
  echo json_encode([
    'success' => false,
    'error' => 'Missing required parameter: \'action\'.',
    'message' => 'The \'action\' parameter is required to process this request.',
    'meta' => [
      'request_method' => $method,
      'action' => $action,
    ]
  ]);

  die();
}

if ($action === 'get') {

  $slug = $_REQUEST['product'] ?? null;
  $product_chr_link = '';
  if ($slug) {
    $product_chr_link = "AND product_chr_link = '$slug'";
  }

  $sql = "
    SELECT
      product_uid_id,
      product_cnt_account,
      product_hld_holder,
      product_mbr_member,
      product_chr_link,
      product_lng_language,
      product_ref_link,
      product_chr_name,
      product_chr_article,
      
      CONCAT('https://mojito-spb.ru', REPLACE(product_img_image, 'office/320', '')) AS product_img_image,
      
      CONCAT('https://mojito-spb.ru', '/272x166xffffff', REPLACE(product_img_image, 'office/320', '')) AS thumb_272x166,
      
      product_wth_image,
      product_hgt_image,
      product_crc_image,
      product_chr_article3d,
      product_txt_text,
      product_txt_text2,
      product_txt_text3,
      product_txt_parameters,
      product_txt_package,
      product_txt_colors,
      product_set_group1,
      product_set_group2,
      product_set_brand,
      product_set_color,
      product_set_filtercolor,
      product_set_size,
      product_set_dimensions,
      product_set_material,
      product_set_filtermaterial,
      product_set_print,
      product_set_weight,
      product_chr_box,
      product_chr_synonym,
      product_dec_value1,
      product_dec_value2,
      product_dec_value3,
      product_dec_value4,
      product_dec_value5,
      product_set_field1,
      product_set_field2,
      product_set_field3,
      product_set_field4,
      product_set_field5,
      product_set_field6,
      product_set_field7,
      product_set_field8,
      product_set_field9,
      product_set_field10,
      product_set_field11,
      product_set_field12,
      product_dec_price1,
      product_dec_price2,
      product_dec_price3,
      product_dec_price4,
      product_int_points,
      product_int_ratio,
      product_int_quota,
      product_int_minimum,
      product_lnk_parent,
      product_rom_folder,
      product_set_holiday,
      product_set_season,
      product_set_collection,
      product_chk_kit,
      product_chk_sex,
      product_chk_status,
      product_chk_option,
      product_chk_format,
      product_int_balance1,
      product_int_balance2,
      product_int_balance3,
      product_int_free1,
      product_int_free2,
      product_set_stock1,
      product_set_stock2,
      product_int_delivery11,
      product_int_delivery12,
      product_chr_article1c,
      product_enm_new,
      product_enm_vip,
      product_enm_spec,
      product_enm_promo,
      product_enm_action,
      product_enm_eco,
      product_enm_top,
      product_enm_wikimart,
      product_enm_exists,
      product_enm_active,
      product_enm_discount,
      product_enm_main,
      product_enm_label,
      product_enm_demand,
      product_lnk_factory,
      product_lnk_style,
      product_lnk_custom,
      product_lnk_manager,
      product_dat_date,
      product_dat_checked,
      product_txt_descr,
      product_txt_keywords,
      product_chr_title,
      product_ind_index,
      product_smp_create,
      product_smp_update
  FROM account_product
  WHERE product_cnt_account = 320
    AND product_hld_holder = 13161
    $product_chr_link

    AND NULLIF(product_img_image, '') IS NOT NULL
  
  GROUP BY product_set_group1
  LIMIT 20
  ";
  $sth = $connection->prepare($sql);
  $sth->execute();

  if (!$slug) {
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if ($slug) {
    $result = $sth->fetch(PDO::FETCH_ASSOC);
  }

  if (!$slug) {
    echo json_encode([
      'success' => true,
      'products' => $result,
    ]);
  }
  else if ($slug) {
    echo json_encode([
      'success' => true,
      'product' => $result,
    ]);
  }

  die();
}