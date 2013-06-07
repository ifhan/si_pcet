<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Departements_model extends BF_Model {

	protected $table		= "bdc_departement_52";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	
	function get_departement_by_insee_departement($INSEE_Departement) {
		$this->db->select('INSEE_Departement, Nom_Departement')
			->where('INSEE_Departement',$INSEE_Departement)
			->order_by('INSEE_Departement', 'asc');
		$query = $this->db->get('bdc_departement_52');
		 
		$departements = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $departement) {
				$departements[$departement->INSEE_Departement] = $departement->Nom_Departement;
			}
			return $departements;
		} else {
			return FALSE;
		}
	}
}
