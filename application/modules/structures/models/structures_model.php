<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Structures_model extends BF_Model {

	protected $table	= "pcet_structure";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

       /*
		Method: get_structure_by_id_str()

		Sélectionne l'ensemble des collectivités d'un département par 
        *       le code du département (pour les afficher dans un index().
	*/
	function get_structures_by_departement($departement) {
            $records = $this->structures_model
		->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
		->select('pcet_structure.id as id, pcet_structure.ID_STR as ID_STR, pcet_type_str.NOM_TYPE as NOM_TYPE')
		->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
		->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
		->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
		->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
		->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
		->select('bdc_commune_52.Nom_Commune as Nom_Commune')
		->select('bdc_departement_52.Nom_Departement as Nom_Departement')
		->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
		->select('r_pays_contour_r52.nom as nom_pays')
		->select('r_pnr_r52.nom as nom_pnr')
		->find_all_by('DEPARTEMENT_id',$departement);
            return $records;
	}

        /*
		Method: get_structure_by_id_str()

		Sélectionne l'ensemble des collectivités d'un département par 
        *       le code du département (pour les afficher dans une liste 
        *       déroulante).
	*/
	function list_structures_by_departement($departement) {
            $structures = $this->db
                 ->select('pcet_structure.id as id, pcet_structure.ID_STR as ID_STR,
                    pcet_structure.TYPE_STRUCTURE_id as TYPE_STRUCTURE_id,
                    pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id')
                 ->where('pcet_structure.DEPARTEMENT_id',$departement)
                 ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                 ->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
                 ->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
                 ->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
                 ->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
                 ->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
                 ->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
                 ->select('bdc_commune_52.Nom_Commune as Nom_Commune')
                 ->select('bdc_departement_52.Nom_Departement as Nom_Departement')
                 ->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
                 ->select('r_pays_contour_r52.nom as nom_pays')
                 ->select('r_pnr_r52.nom as nom_pnr')
                 ->order_by('pcet_structure.ID_STR', 'asc');
            $structures = $this->db->get('pcet_structure');

            foreach ($structures->result() as $structure)
            {

                $structures_list[$structure->ID_STR] = $structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr;
            }
            $structures = $structures_list;
            return $structures;
        }
        
        /*
		Method: get_structure_by_id()

		Sélectionne une collectivité par l'identifiant du PCET.
	*/
        function get_structure_by_id($ID_PCET) {
            
            $structure = $this->structures_model
                    ->join('pcet','pcet_structure.ID_STR = pcet.ID_STR','left')
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet.ID_PCET as ID_PCET, pcet_structure.ID_STR as ID_STR, pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id, pcet_type_str.NOM_TYPE as NOM_TYPE')
                    ->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
                    ->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
                    ->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
                    ->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
                    ->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
                    ->select('bdc_commune_52.Nom_Commune as Nom_Commune')
                    ->select('bdc_departement_52.Nom_Departement as Nom_Departement')
                    ->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
                    ->select('r_pays_contour_r52.nom as nom_pays')
                    ->select('r_pnr_r52.nom as nom_pnr')
                    ->find_by('ID_PCET',$ID_PCET);
            return $structure;
        }
        
        /*
		Method: get_structure_by_id_str()

		Sélectionne une collectivité par son identifiant.
	*/
        function get_structure_by_id_str($ID_STR) {
            
            $structure = $this->structures_model
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet_structure.ID_STR as ID_STR, pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id, pcet_type_str.NOM_TYPE as NOM_TYPE')
                    ->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
                    ->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
                    ->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
                    ->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
                    ->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
                    ->select('bdc_commune_52.Nom_Commune as Nom_Commune')
                    ->select('bdc_departement_52.Nom_Departement as Nom_Departement')
                    ->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
                    ->select('r_pays_contour_r52.nom as nom_pays')
                    ->select('r_pnr_r52.nom as nom_pnr')
                    ->find_by('ID_STR',$ID_STR);
            return $structure;
        }
    
    
	
}
