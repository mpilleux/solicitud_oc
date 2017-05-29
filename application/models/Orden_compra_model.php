<?php
class Orden_compra_model extends CI_Model {

	function __construct(){
		
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	private function convertDate($date) {
	   // EN-Date to GE-Date
	   if (strstr($date, "-") || strstr($date, "/"))   {
			   $date = preg_split("/[\/]|[-]+/", $date);
			   $date = $date[2]."/".$date[1]."/".$date[0];
			   return $date;
	   }
	  
	   return false;
	}

	public function postOC($proveedor, $descripcion, $fecha_entrega, $monto, $centro_costo){
		$this->db->trans_start();
		
		$fecha = $this->convertDate($fecha_entrega);
				
		$sql = '
			INSERT INTO orden_compra ( id, proveedor, descripcion, fecha_entrega, monto, centro_costo)
			VALUES ( null, ?, ?, ?, ?, ? );
			';
		$this->db->query( $sql, array($proveedor, $descripcion, $fecha, $monto, $centro_costo) );
		
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
