<?php
class Orden_compra_model extends CI_Model {

	private $db;

	function __construct(){
		
		// Call the Model constructor
		parent::__construct();
		$this->db = $this->load->database();
	}


	public function postOC($proveedor, $descripcion, $fecha_entrega, $monto, $centro_costo){
		$this->db->trans_start();
		
				
		$sql = '
			INSERT INTO orden_compra ( id, proveedor, descripcion, fecha_entrega, monto, centro_costo)
			VALUES ( null, ?, ?, ?, ?, ? );
			';
		$this->db->query( $sql, array($proveedor, $descripcion, $fecha_entrega, $monto, $centro_costo) );
		
		$oc_id = $this->db->insert_id();
		
		$this->db->trans_complete();
		
		if( $this->db->trans_status() === FALSE ){
			return FALSE;
        }
		
		return $oc_id;
	}
	
	
	
	
}


/* End of file regimen_cero_model.php */
/* Location: ./application/models/regimen_cero_model.php */
