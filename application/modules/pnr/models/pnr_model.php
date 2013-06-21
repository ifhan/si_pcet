<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pnr_model extends BF_Model {

	protected $table	= "r_pnr_r52";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_pnr_by_departement()

		Sélectionne les PNR d'un département par l'identifiant
        *       d'un département.
	*/            
	function get_pnr_by_departement($departement) {
	
		$this->db->select('id_regional, nom')
			->where('id_dpt',$departement)
			->order_by('id_regional', 'asc');
		$query = $this->db->get('r_pnr_r52');
		 
		$array_pnr = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $pnr) {
				$array_pnr[$pnr->id_regional] = $pnr->nom;
			}
			return $array_pnr;
		} else {
			return FALSE;
		}
	
	}
}
