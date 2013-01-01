<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {
   function __construct(){
      parent::__construct();
      $this->load->library('paypal');
   }
   function crear(){
      $requestParams = array(
         'RETURNURL' => base_url(),
         'CANCELURL' => base_url()."micarrito"
      );

      $orderParams = array(
         'PAYMENTREQUEST_0_AMT' => $this->uri->segment(3) + 100,
         'PAYMENTREQUEST_0_SHIPPINGAMT' => '10',
         'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
         'PAYMENTREQUEST_0_ITEMAMT' => $this->uri->segment(3)
      );

      $item = array(
         'L_PAYMENTREQUEST_0_NAME0' => 'Playeras CF',
         'L_PAYMENTREQUEST_0_DESC0' => 'Grupo de Playeras de cf.com',
         'L_PAYMENTREQUEST_0_AMT0' => $this->uri->segment(3),
         'L_PAYMENTREQUEST_0_QTY0' => '1'
      );
      $response = $this->paypal-> request('SetExpressCheckout',$requestParams + $orderParams + $item);
      print_r($response);
      if(is_array($response) && $response['ACK'] == 'Success') { //Request successful
         $token = $response['TOKEN'];
         header( 'Location: https://sandbox.paypal.com/webscr?cmd=_express-checkout&token=' . urlencode($token) );
      }
   }
   
}
?>