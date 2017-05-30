<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Main_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model( 'orden_compra_model' );
	}
	
	public function index(){		
		$this->load->view( 'template/template_view', array('content' => 'form_view','titulo' => "Solicitud de OC") );

	}	
	
	protected function getJSON($array, $key){
		return ($array && isset($array[$key])) ? $array[$key] : null;
	}
	
	public function postOC(){
		header('Content-Type: application/json');
		$response_array = array();
		$response_array['status'] = 'error';  
		$response_array['message'] = '';  
		
		$input_json = json_decode(trim(file_get_contents('php://input')), true);
		
		
		$proveedor 			= $this->getJSON($input_json, 'proveedor');
		$descripcion 		= $this->getJSON($input_json, 'descripcion');
		$fecha_entrega 		= $this->getJSON($input_json, 'fecha_entrega');
		$monto 				= $this->getJSON($input_json, 'monto');
		$centro_costo 		= $this->getJSON($input_json, 'centro_costo');
		
		if($this->orden_compra_model->postOC($proveedor, $descripcion, $fecha_entrega, $monto, $centro_costo)){
			$response_array['status'] = 'success';  
			$response_array['message'] = 'Orden de compra registrada exitosamente.'; 
		}else{
			$response_array['status'] = 'error';  
			$response_array['message'] = 'Error en el registro de la Orden de Compra.'; 
		}
		
		echo json_encode($response_array);
		return;
	}

}
