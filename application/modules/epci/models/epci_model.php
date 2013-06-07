<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Epci_model extends BF_Model {

	protected $table		= "n_epci_zsup_r52";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	
	function get_epci() {
	
		$this->db->select('SIREN_EPCI, NOM_EPCI, TYPE_EPCI')->like('SIREN_EPCI', "02444", 'after')->order_by('NOM_EPCI', 'asc');
		$query = $this->db->get('n_epci_zsup_r52');
		 
		$array_epci = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $epci) {
				$array_epci[$epci->SIREN_EPCI] = $epci->NOM_EPCI;
			}
			return $array_epci;
		} else {
			return FALSE;
		}
	}
	
	function get_epci_by_departement_by_type($departement,$type) {
	
		$this->db->select('SIREN_EPCI, NOM_EPCI, TYPE_EPCI')
			->where('TYPE_EPCI', $type)
			->like('SIREN_EPCI', $departement, 'after')
			->order_by('NOM_EPCI', 'asc');
		$query = $this->db->get('n_epci_zsup_r52');
		 
		$array_epci = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $epci) {
				$array_epci[$epci->SIREN_EPCI] = $epci->NOM_EPCI;
			}
			return $array_epci;
		} else {
			return FALSE;
		}
	}
	
	function get_type_epci($SIREN_EPCI) {
		$epci = $this->epci_model->find_by('SIREN_EPCI', $SIREN_EPCI);
		echo $epci->TYPE_EPCI;
	}
}
