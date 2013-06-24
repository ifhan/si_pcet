<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Engagement_model extends BF_Model {

	protected $table	= "pcet_engagement";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        /*
		Method: get_engagement_by_departement()

		Sélectionne les informations sur l'engagement de la démarche
        *       pour les PCET d'un département par l'identifiant
        *       du département.
	*/         
        function get_engagement_by_departement($departement) {
            
            $records = $this->engagement_model
                ->join('pcet','pcet.ID_PCET = pcet_engagement.ID_PCET','left')
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
                ->select('pcet_engagement.id as id, pcet_engagement.ID_PCET as ID_PCET, pcet_engagement.DATE_DELIB as DATE_DELIB,
                    pcet_engagement.NOTIF_DELIB_ETAT as NOTIF_DELIB_ETAT, pcet_engagement.NOTIF_DELIB_CR as NOTIF_DELIB_CR, 
                    pcet_engagement.NOTIF_USH as NOTIF_USH, pcet_engagement.REP_USH as REP_USH, pcet_engagement.DATE_REP_USH as DATE_REP_USH,
                    pcet_engagement.DATE_PAC as DATE_PAC')
                ->order_by('pcet.ID_PCET','asc')
                ->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
            
            return $records;
                        
        }
        
       /*
		Method: get_engagement_by_id_pcet()

		Sélectionne les informations sur l'engagement de la démarche
        *       d'un PCET par l'identifiant du PCET.
	*/        
        function get_engagement_by_id_pcet($ID_PCET) {
            $engagement = $this->engagement_model
                    ->join('pcet','pcet.ID_PCET = pcet_engagement.ID_PCET','left')
                    ->find_by('pcet.ID_PCET',$ID_PCET);
            return $engagement;
        }
}
