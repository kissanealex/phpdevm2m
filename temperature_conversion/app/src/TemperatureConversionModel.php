<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 24/10/17
 * Time: 10:01
 */

class TemperatureConversionModel
{
  private $c_temperature;
  private $c_fromunit;
  private $c_tounit;
  private $c_result;

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
      $result = $this->convert_temperature($obj_soap_client_handle);
    }

    $this->c_result = $result;
  }

  private function create_soap_client()
  {
    $obj_soap_client_handle = false;

    $m_arr_soapclient = ['trace' => true, 'exceptions' => true];
    $m_wsdl = 'http://www.webservicex.net/ConvertTemperature.asmx?WSDL';

    try
    {
      $obj_soap_client_handle = new SoapClient($m_wsdl, $m_arr_soapclient);
      var_dump($obj_soap_client_handle->__getFunctions());
//      var_dump($obj_soap_client_handle->__getTypes());
    }
    catch (SoapFault $m_obj_exception)
    {
      trigger_error($m_obj_exception);
    }

    return $obj_soap_client_handle;
  }


  private function convert_temperature($p_obj_soap_client_handle)
  {
    $m_result = null;
    $m_arr_temperature = [
      'Temperature' => $this->c_temperature,
      'FromUnit' => $this->c_fromunit,
      'ToUnit' => $this->c_tounit,
    ];

    try
    {
      $conversion_result = $p_obj_soap_client_handle->__soapCall('ConvertTemp', [$m_arr_temperature]);
      $m_result = $conversion_result->ConvertTempResult;
//      var_dump($p_obj_soap_client_handle->__getLastRequest());
//      var_dump($p_obj_soap_client_handle->__getLastResponse());
//      var_dump($p_obj_soap_client_handle->__getLastRequestHeaders());
//      var_dump($p_obj_soap_client_handle->__getLastResponseHeaders());

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