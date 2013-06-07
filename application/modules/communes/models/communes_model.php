<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Communes_model extends BF_Model {

	protected $table		= "bdc_commune_52";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	
	function get_communes_by_departement($departement) {
		$this->db->select('INSEE_Commune, Nom_Commune')->where('INSEE_Departement',$departement)->order_by('INSEE_Commune', 'asc');
		$query = $this->db->get('bdc_commune_52');
		 
		$communes = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $commune) {
				$communes[$commune->INSEE_Commune] = $commune->Nom_Commune. ' ('.$commune->INSEE_Commune.')';
			}
			return $communes;
		} else {
			return FALSE;
		}
	}
}
