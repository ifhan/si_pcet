<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pays_model extends BF_Model {

	protected $table	= "r_pays_contour_r52";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        
        /*
		Method: get_pays_by_departement()

		Sélectionne les pays d'un département par l'identifiant
        *       du département.
	*/           
	function get_pays_by_departement($departement) {
	
		$this->db->select('id_pays, nom')
			->where('insee_dep', $departement)
			->order_by('id_pays', 'asc');
		$query = $this->db->get('r_pays_contour_r52');
		 
		$array_pays = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $pays) {
				$array_pays[$pays->id_pays] = $pays->nom;
			}
			return $array_pays;
		} else {
			return FALSE;
		}
	}
}
