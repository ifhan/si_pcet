<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Phases_model extends BF_Model {

	protected $table		= "pcet_phase";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	
	function get_phases() {
		$query = $this->db->get('pcet_phase');
		 
		$phases = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $phase) {
				$phases[$phase->id] = $phase->NOM_PHASE;
			}
			return $phases;
		} else {
			return FALSE;
		}
	}
}
