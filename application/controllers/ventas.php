<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {
   function __construct(){
      parent::__construct();
      $this->load->library('paypal');
   }
   function crear(){
      $this->session->set_userdata('costoTotal',$this->uri->segment(3) + 10);
      $requestParams = array(
         'RETURNURL' => base_url()."ventas/verificar",
         'CANCELURL' => base_url()."micarrito"
      );

      $orderParams = array(
         'PAYMENTREQUEST_0_AMT' => $this->session->userdata('costoTotal'),
         'PAYMENTREQUEST_0_SHIPPINGAMT' => '10',
         'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
         'PAYMENTREQUEST_0_ITEMAMT' =>$this->uri->segment(3)
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
   function verificar(){
      if( isset($_GET['token']) && !empty($_GET['token']) ) { 

         $requestParams = array(
             'TOKEN' => $_GET['token'],
             'PAYMENTACTION' => 'Sale',
             'PAYERID' => $_GET['PayerID'],
             'PAYMENTREQUEST_0_AMT' => $this->session->userdata('costoTotal'), 
             'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD'
         );
         $response = $this->paypal -> request('DoExpressCheckoutPayment',$requestParams);
         print_r($response);
         if( is_array($response) && $response['ACK'] == 'Success') { 
             $transactionId = $response['PAYMENTINFO_0_TRANSACTIONID'];
             $this->session->set_userdata('costoTotal',"listo");
             header("Location: ".base_url()."ventas/listo"); 
         }
         else{
            $this->session->set_userdata('costoTotal',"error");
            header("Location: ".base_url()."ventas/error");   
         }
      }
   }
   function listo(){
        if(strcmp($this->session->userdata('costoTotal'), "listo")  == 0){
            $data['respuesta'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('ventas/completado',$data);
            $this->load->view('layouts/footer');
        }
   }
   function error(){
        $data['respuesta'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('ventas/error',$data);
        $this->load->view('layouts/footer');
   }
}
?>