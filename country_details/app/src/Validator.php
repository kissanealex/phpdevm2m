<?php

class Validator
{
  public function __construct() { }

  public function __destruct() { }

  public function validate_country($p_country_to_check)
  {
    $checked_country = false;

    $arr_country_names = COUNTRY_NAMES;

    return $p_country_to_check;
  }

  public function validate_detail_type($p_type_to_check)
  {
    $checked_detail_type = false;
    $arr_detail_types = DETAIL_TYPES;
    if (array_key_exists($p_type_to_check, $arr_detail_types) === true)
    {
      $checked_detail_type = $p_type_to_check;
    }

    return $p_type_to_check;
  }
}