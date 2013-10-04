<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pcet_model extends BF_Model {

	protected $table	= "pcet";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: get_pcet_by_departement()

		Sélectionne l'ensemble des PCET d'un département 
        *       par l'identifiant du département.
	*/         
	function get_pcet_by_departement($departement) {
            $records = $this->pcet_model
                ->select('pcet.id as id, pcet.ID_PCET as ID_PCET, 
                    pcet.STATUT_PCET as STATUT_PCET, pcet.ETAT_PCET as ETAT_PCET, 
                    pcet.INTERNET_PCET as INTERNET_PCET, pcet.CONTRAT_ADEME_PCET as CONTRAT_ADEME_PCET, 
                    pcet.TYPE_CONTRAT_ADEME_PCET as TYPE_CONTRAT_ADEME_PCET')
                ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
		->select('pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id')
		->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
		->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
		->join('pcet_phase','pcet_phase.id = pcet.ID_PHASE','left')
		->select('pcet_phase.NOM_PHASE as NOM_PHASE')
		->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet.ID_STR','left')
		->select('bdc_commune_52.Nom_Commune as Nom_Commune')
		->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet.ID_STR','left')
		->select('bdc_departement_52.Nom_Departement as Nom_Departement')
		->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
		->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
		->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet.ID_STR','left')
		->select('r_pays_contour_r52.nom as nom_pays')
		->join('r_pnr_r52','r_pnr_r52.id_regional = pcet.ID_STR','left')
		->select('r_pnr_r52.nom as nom_pnr')
		->order_by('ID_PCET','asc')
		->find_all_by('DEPARTEMENT_id',$departement);
			
            return $records;
	}

        /*
		Method: get_pcet()

		Sélectionne l'ensemble des PCET.
	*/         
        function get_pcet() {
            $records = $this->pcet_model
                ->select('pcet.id as id, pcet.ID_PCET as ID_PCET, 
                    pcet.STATUT_PCET as STATUT_PCET, pcet.ETAT_PCET as ETAT_PCET, 
                    pcet.INTERNET_PCET as INTERNET_PCET, pcet.CONTRAT_ADEME_PCET as CONTRAT_ADEME_PCET, 
                    pcet.TYPE_CONTRAT_ADEME_PCET as TYPE_CONTRAT_ADEME_PCET')
                ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
		->select('pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id')
		->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
		->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
		->join('pcet_phase','pcet_phase.id = pcet.ID_PHASE','left')
		->select('pcet_phase.NOM_PHASE as NOM_PHASE')
		->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet.ID_STR','left')
		->select('bdc_commune_52.Nom_Commune as Nom_Commune')
		->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet.ID_STR','left')
		->select('bdc_departement_52.Nom_Departement as Nom_Departement')
		->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
		->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
		->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet.ID_STR','left')
		->select('r_pays_contour_r52.nom as nom_pays')
		->join('r_pnr_r52','r_pnr_r52.id_regional = pcet.ID_STR','left')
		->select('r_pnr_r52.nom as nom_pnr')
		->order_by('ID_PCET','asc')
		->find_all();
			
            return $records;
	}

        /*
		Method: list_pcet_by_departement()

		Sélectionne l'ensemble des PCET d'un département 
        *       par l'identifiant du département pour l'affichage.
	*/         
        function list_pcet_by_departement($departement) {
            $query = $this->db
                ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
		->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                ->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_structure.ID_STR','left')
                ->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_structure.ID_STR','left')
                ->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_structure.ID_STR','left')
                ->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_structure.ID_STR','left')
                ->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_structure.ID_STR','left')
                ->select('pcet.ID_PCET as ID_PCET')
                ->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
                ->select('bdc_commune_52.Nom_Commune as Nom_Commune')
                ->select('bdc_departement_52.Nom_Departement as Nom_Departement')
                ->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
                ->select('r_pays_contour_r52.nom as nom_pays')
                ->select('r_pnr_r52.nom as nom_pnr')
                ->order_by('pcet.ID_PCET', 'asc')
                ->where('pcet_structure.DEPARTEMENT_id',$departement)
                ->get('pcet');

        foreach ($query->result() as $pcet)
        {
           
            $pcets_list[$pcet->ID_PCET] = $pcet->ID_PCET.' - '.$pcet->NOM_TYPE.' - '.$pcet->Nom_Commune.$pcet->Nom_Departement.$pcet->NOM_EPCI.$pcet->nom_pays.$pcet->nom_pnr;
        }
        $pcets = $pcets_list;
        return $pcets;
    }
    
       /*
		Method: get_structure_by_id_action()

		Sélectionne une collectivité par l'identifiant de l'action du PCET.
	*/
        function get_structure_by_id_action($id_action) {
            
            $structure = $this->pcet_model
                    ->join('pcet_actions','pcet_actions.ID_PCET = pcet.ID_PCET','left')
                    ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet_actions.ID_PCET as ID_PCET, pcet_structure.ID_STR as ID_STR, pcet_type_str.NOM_TYPE as NOM_TYPE')
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
                    ->find_by('pcet_actions.id',$id_action);
            return $structure;
        }  
        
        /*
		Method: get_structure_by_id_engagement()

		Sélectionne une collectivité par l'identifiant de 
        *       l'engagement de la démarche du PCET.
	*/
        function get_structure_by_id_engagement($id_engagement) {
            
            $structure = $this->pcet_model
                    ->join('pcet_engagement','pcet_engagement.ID_PCET = pcet.ID_PCET','left')
                    ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet_engagement.ID_PCET as ID_PCET, pcet_structure.ID_STR as ID_STR, pcet_type_str.NOM_TYPE as NOM_TYPE')
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
                    ->find_by('pcet_engagement.id',$id_engagement);
            return $structure;
        }
        
        /*
		Method: get_structure_by_id_avis()

		Sélectionne une collectivité par l'identifiant de l'action du PCET.
	*/
        function get_structure_by_id_avis($id_avis) {
            
            $structure = $this->pcet_model
                    ->join('pcet_avis','pcet_avis.ID_PCET = pcet.ID_PCET','left')
                    ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet_avis.ID_PCET as ID_PCET, pcet_structure.ID_STR as ID_STR, pcet_type_str.NOM_TYPE as NOM_TYPE')
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
                    ->find_by('pcet_avis.id',$id_avis);
            return $structure;
        }     

       /*
		Method: get_structure_by_id_adaptation()

		Sélectionne une collectivité par l'identifiant de l'action du PCET.
	*/
        function get_structure_by_id_adaptation($id_adaptation) {
            
            $structure = $this->pcet_model
                    ->join('pcet_adaptation','pcet_adaptation.ID_PCET = pcet.ID_PCET','left')
                    ->join('pcet_structure','pcet_structure.ID_STR = pcet.ID_STR','left')
                    ->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
                    ->select('pcet_adaptation.ID_PCET as ID_PCET, pcet_structure.ID_STR as ID_STR, pcet_type_str.NOM_TYPE as NOM_TYPE')
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
                    ->find_by('pcet_adaptation.id',$id_adaptation);
            return $structure;
        }  
    
}
