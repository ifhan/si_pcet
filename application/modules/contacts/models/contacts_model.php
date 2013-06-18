<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_model extends BF_Model {

	protected $table	= "pcet_contact";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        function get_contacts_by_departement($departement) {
            $records = $this->contacts_model
                ->select('pcet_contact.id as id, pcet_contact.CIVILITE as CIVILITE, 
                    pcet_contact.NOM_CONTACT as NOM_CONTACT, pcet_contact.PRENOM as PRENOM,
                    pcet_contact.MAIL as MAIL')
                ->join('pcet_structure','pcet_structure.ID_STR = pcet_contact.ID_STR','left')
		->select('pcet_structure.DEPARTEMENT_id as DEPARTEMENT_id')
		->join('pcet_type_str','pcet_type_str.id = pcet_structure.TYPE_STRUCTURE_id','left')
		->select('pcet_type_str.NOM_TYPE as NOM_TYPE')
		->join('bdc_commune_52','bdc_commune_52.INSEE_Commune = pcet_contact.ID_STR','left')
		->select('bdc_commune_52.Nom_Commune as Nom_Commune')
		->join('bdc_departement_52','bdc_departement_52.INSEE_Departement = pcet_contact.ID_STR','left')
		->select('bdc_departement_52.Nom_Departement as Nom_Departement')
		->join('n_epci_zsup_r52','n_epci_zsup_r52.SIREN_EPCI = pcet_contact.ID_STR','left')
		->select('n_epci_zsup_r52.NOM_EPCI as NOM_EPCI')
		->join('r_pays_contour_r52','r_pays_contour_r52.id_pays = pcet_contact.ID_STR','left')
		->select('r_pays_contour_r52.nom as nom_pays')
		->join('r_pnr_r52','r_pnr_r52.id_regional = pcet_contact.ID_STR','left')
		->select('r_pnr_r52.nom as nom_pnr')
		->order_by('pcet_contact.NOM_CONTACT','asc')
		->find_all_by('pcet_structure.DEPARTEMENT_id',$departement);
			
            return $records;
        }
}
