<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 24/10/17
 * Time: 10:01
 */

class TemperatureConversionModel
{

  public function __construct(){}

  public function __destruct(){}

  public function set_conversion_parameters($p_temperature, $p_fromunit, $p_tounit)
  {
    $this->c_temperature = $p_temperature;
    $this->c_fromunit = $p_fromunit;
    $this->c_tounit = $p_tounit;
  }

  public function perform_temperature_conversion()
  {
    $result = null;
    $obj_soap_client_handle = null;
    $obj_soap_client_handle = $this->create_soap_client();

    if ($obj_soap_client_handle !== false)
    {
      $result = $this->get_messages($obj_soap_client_handle);
    }

    $this->c_result = $result;
  }

  private function create_soap_client()
  {
    $obj_soap_client_handle = false;

    $m_arr_soapclient = ['trace' => true, 'exceptions' => true];
    $m_wsdl = M2M_WSDL;

    try
    {
      $obj_soap_client_handle = new SoapClient($m_wsdl, $m_arr_soapclient);
    }
    catch (SoapFault $m_obj_exception)
    {
      trigger_error($m_obj_exception);
    }

    return $obj_soap_client_handle;
  }

  private function get_messages($p_obj_soap_client_handle)
  {
    $m_result = null;

    try
    {
      $fetch_result = $p_obj_soap_client_handle->peekMessages(M2M_USER, M2M_PASSWORD, 1);
      print_r($fetch_result);
      $m_result = $fetch_result;


      if (is_float($m_result) === false)
      {
        $m_result = false;
      }

    }
    catch (SoapFault $m_obj_exception)
    {
      trigger_error($m_obj_exception);
    }

    return $m_result;
  }

  public function get_result()
  {
    return $this->c_result;
  }

}