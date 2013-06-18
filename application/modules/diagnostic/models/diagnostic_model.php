<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnostic_model extends BF_Model {

	protected $table		= "pcet_diagnostic";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        function get_diagnostic_by_departement($departement) {
            
            $records = $this->diagnostic_model
                ->join('pcet','pcet.ID_PCET = pcet_diagnostic.ID_PCET','left')
                ->join('pcet_ges_bilan','pcet_ges_bilan.id = pcet_diagnostic.ID_GES_BILAN_PC','left')
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
                ->select('pcet_diagnostic.id as id, pcet_diagnostic.ID_PCET as ID_PCET, pcet_diagnostic.GES_DIAG as GES_DIAG,
                    pcet_diagnostic.CONSO_KTEP_T as CONSO_KTEP_T, pcet_diagnostic.EMIS_CO2_T as EMIS_CO2_T, 
                    pcet_diagnostic.CONSO_KTEP_PC as CONSO_KTEP_PC, pcet_diagnostic.EMIS_CO2_PC as EMIS_CO2_PC, 
                    pcet_diagnostic.ID_GES_BILAN_T as ID_GES_BILAN_T,
                    pcet_diagnostic.ID_GES_BILAN_PC as ID_GES_BILAN_PC, pcet_ges_bilan.NOM_GES_BILAN as NOM_GES_BILAN')
                ->order_by('pcet.ID_PCET','asc')
                ->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
            
            return $records;
                        
        }
}
