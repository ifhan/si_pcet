<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Epci_model extends BF_Model {

	protected $table	= "n_epci_zsup_r52";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_epci()

		Sélectionne l'ensemble des EPCI de la région.
	*/          
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

 
        /*
		Method: get_epci_by_departement_by_type()

		Sélectionne les EPCI d'un département par l'identifiant
        *       d'un département et le type d'EPCI.
	*/         
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

}
