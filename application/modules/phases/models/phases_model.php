<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Phases_model extends BF_Model {

	protected $table	= "pcet_phase";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_phases()

		Sélectionne l'ensemble des phases de l'état d'avancement
        *       d'un PCET pour affichage dans une liste.
	*/        
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

        /*
		Method: get_phase_by_id_pcet()

		Sélectionne la phase d'un PCET par l'identifiant du PCET.
	*/        
        function get_phase_by_id_pcet($ID_PCET) {
            
            $phase = $this->phases_model
                    ->join('pcet','pcet_phase.id = pcet.ID_PHASE','left')
                    ->select('pcet.ID_PCET as ID_PCET, pcet_phase.NOM_PHASE as NOM_PHASE')
                    ->find_by('ID_PCET',$ID_PCET);
            return $phase;
            
        }
}
