<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Indicateur_model extends BF_Model {

	protected $table		= "pcet_actions_indicateurs";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        function get_indicateur_by_departement($departement) {
            
            $records = $this->indicateur_model
                ->join('pcet','pcet.ID_PCET = pcet_actions_indicateurs.ID_PCET','left')
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
                ->select('pcet_actions_indicateurs.id as id, pcet_actions_indicateurs.ID_PCET as ID_PCET, 
                    pcet_actions_indicateurs.TABLEAU_DE_BORD as TABLEAU_DE_BORD,
                    pcet_actions_indicateurs.NB_TOTAL_INDICATEURS as NB_TOTAL_INDICATEURS, 
                    pcet_actions_indicateurs.NB_INDICATEURS_QT as NB_INDICATEURS_QT, 
                    pcet_actions_indicateurs.NB_INDICATEURS_QL as NB_INDICATEURS_QL, 
                    pcet_actions_indicateurs.NB_TOTAL_ACTIONS as NB_TOTAL_ACTIONS')
                ->order_by('pcet.ID_PCET','asc')
                ->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
            
            return $records;
                        
        }
}
