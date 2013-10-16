<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Actions_model extends BF_Model {

	protected $table	= "pcet_actions";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_actions_by_departement()

		Sélectionne les actions
        *       des PCET d'un département par l'identifiant
        *       du département.
	*/        
        function get_actions_by_departement($departement) {
            
            $records = $this->actions_model
                ->join('pcet','pcet.ID_PCET = pcet_actions.ID_PCET','left')
                ->join('pcet_domaines_action','pcet_domaines_action.id = pcet_actions.DOMAINES_ACTION_id','left')    
                ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
                ->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
                ->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
                ->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
                ->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
                ->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
                ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                ->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
                ->select('bdc_commune_52.Nom_Commune as Nom_Commune')
                ->select('bdc_departement_52.Nom_Departement as Nom_Departement')
                ->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
                ->select('r_pays_contour_r52.nom as nom_pays')
                ->select('r_pnr_r52.nom as nom_pnr')
                ->select('pcet_actions.id as id, pcet_actions.ID_PCET as ID_PCET, pcet_actions.DOMAINES_ACTION_id as DOMAINES_ACTION_id,
                    pcet_actions.COMPETENCE as COMPETENCE, pcet_actions.NOM_ACTION as NOM_ACTION, 
                    pcet_actions.OBJECTIFS as OBJECTIFS, pcet_actions.INDICATEUR_SUIVI as INDICATEUR_SUIVI')
                ->select('pcet_domaines_action.NOM_DOMAINE_ACTION as NOM_DOMAINE_ACTION')
                ->order_by('pcet.ID_PCET','asc')
                ->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
            
            return $records;
                        
        }
        
        /*
		Method: get_actions_by_pcet()

		Sélectionne les actions
        *       d'un PCET par son identifiant.
	*/        
        function get_actions_by_pcet($ID_PCET) {
            
            $records = $this->actions_model
                ->join('pcet','pcet.ID_PCET = pcet_actions.ID_PCET','left')
                ->join('pcet_domaines_action','pcet_domaines_action.id = pcet_actions.DOMAINES_ACTION_id','left')
                ->select('pcet_actions.id as id, pcet_actions.ID_PCET as ID_PCET, pcet_actions.DOMAINES_ACTION_id as DOMAINES_ACTION_id,
                    pcet_actions.COMPETENCE as COMPETENCE, pcet_actions.NOM_ACTION as NOM_ACTION, 
                    pcet_actions.OBJECTIFS as OBJECTIFS, pcet_actions.INDICATEUR_SUIVI as INDICATEUR_SUIVI,
                    pcet_domaines_action.NOM_DOMAINE_ACTION as NOM_DOMAINE_ACTION')
                ->find_all_by('pcet_actions.ID_PCET',$ID_PCET);
            
             return $records;
           
        }
        
        /*
		Method: get_actions_by_domaine()

		Sélectionne les actions
        *       d'un domaine d'action par son identifiant.
	*/        
        function get_actions_by_domaine($id_domaine) {
            
            $records = $this->actions_model
                ->join('pcet','pcet.ID_PCET = pcet_actions.ID_PCET','left')
                ->join('pcet_domaines_action','pcet_domaines_action.id = pcet_actions.DOMAINES_ACTION_id','left')
                ->select('pcet_actions.id as id, pcet_actions.ID_PCET as ID_PCET, pcet_actions.DOMAINES_ACTION_id as DOMAINES_ACTION_id,
                    pcet_actions.COMPETENCE as COMPETENCE, pcet_actions.NOM_ACTION as NOM_ACTION, 
                    pcet_actions.OBJECTIFS as OBJECTIFS, pcet_actions.INDICATEUR_SUIVI as INDICATEUR_SUIVI,
                    pcet_domaines_action.NOM_DOMAINE_ACTION as NOM_DOMAINE_ACTION')
                ->find_all_by('pcet_domaines_action.id',$id_domaine);
            
             return $records;
           
        }        
        
}
