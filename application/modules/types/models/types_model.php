<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Types_model extends BF_Model {

	protected $table	= "pcet_type_str";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_types()

		Sélectionne l'ensemble des types de collectivités pour l'affichage
        *       dans une liste.
	*/        
	function get_types() {
		$query = $this->db->get('pcet_type_str');
		 
		$types = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $type) {
				$types[$type->id] = $type->NOM_TYPE;
			}
			return $types;
		} else {
			return FALSE;
		}
	}
}
