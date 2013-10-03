<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Domaine_model extends BF_Model {

	protected $table	= "pcet_domaines_action";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_domaine()

		Sélectionne l'ensemble des domaines d'actions.
	*/         
        function get_domaine() {
		$query = $this->db->get('pcet_domaines_action');
		 
		$domaines = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $domaine) {
				$domaines[$domaine->id] = $domaine->NOM_DOMAINE_ACTION;
			}
			return $domaines;
		} else {
			return FALSE;
		}
	}

        /*
		Method: get_domaine_by_id()

		Sélectionne un domaine d'action pour un PCET par 
        *       l'identifiant du PCET.
	*/         
        function get_domaine_by_id($ID_PCET) {
            
            $domaine = $this->domaine_model
                    ->join('pcet_actions','pcet_domaines_action.id = pcet_actions.DOMAINES_ACTION_id','left')
                    ->select('pcet_actions.DOMAINES_ACTION_id as DOMAINES_ACTION_id, pcet_domaines_action.NOM_DOMAINE_ACTION as NOM_DOMAINE_ACTION')
                    ->find_by('ID_PCET',$ID_PCET);
            return $domaine;
            
        }
        
        /*
		Method: get_domaine_by_id_action()

		Sélectionne le domaine d'action d'une action par son identifiant.
	*/  
        function get_domaine_by_id_action($id_action) {
            
            $domaine = $this->domaine_model
                    ->join('pcet_actions','pcet_domaines_action.id = pcet_actions.DOMAINES_ACTION_id','left')
                    ->select('pcet_actions.DOMAINES_ACTION_id as DOMAINES_ACTION_id, pcet_domaines_action.NOM_DOMAINE_ACTION as NOM_DOMAINE_ACTION')
                    ->find_by('pcet_actions.id',$id_action);
            return $domaine;
            
        }
}
