<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Avis_model extends BF_Model {

	protected $table	= "pcet_avis";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_avis_by_departement()

		Sélectionne les avis
        *       des PCET d'un département par l'identifiant
        *       du département.
	*/         
        function get_avis_by_departement($departement) {
            
            $records = $this->avis_model
                ->join('pcet','pcet.ID_PCET = pcet_avis.ID_PCET','left')
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
                ->select('pcet_avis.id as id, pcet_avis.ID_PCET as ID_PCET, pcet_avis.DEM_ETAT_AVIS as DEM_ETAT_AVIS,
                    pcet_avis.REP_ETAT_AVIS as REP_ETAT_AVIS, pcet_avis.DEM_REG_AVIS as DEM_REG_AVIS, 
                    pcet_avis.REP_REG_AVIS as REP_REG_AVIS, pcet_avis.DEM_USH_AVIS as DEM_USH_AVIS, pcet_avis.REP_USH_AVIS as REP_USH_AVIS,
                    pcet_avis.DEM_ADEME_AVIS as DEM_ADEME_AVIS, pcet_avis.REP_ADEME_AVIS as REP_ADEME_AVIS, pcet_avis.DATE_ADOPT_AVIS as DATE_ADOPT_AVIS')
                ->order_by('pcet.ID_PCET','asc')
                ->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
            
            return $records;
                        
        }

        /*
		Method: get_avis_by_id_pcet()

		Sélectionne les avis
        *       d'un PCET par l'identifiant du PCET.
	*/        
        function get_avis_by_id_pcet($ID_PCET) {
            $avis = $this->avis_model
                    ->join('pcet','pcet.ID_PCET = pcet_avis.ID_PCET','left')
                    ->find_by('pcet.ID_PCET',$ID_PCET);
            return $avis;
        }
        
}
