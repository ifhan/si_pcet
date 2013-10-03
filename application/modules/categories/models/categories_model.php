<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends BF_Model {

	protected $table	= "pcet_categories_aide";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;

        /*
		Method: list_categories()

		Sélectionne l'ensemble des catégories de l'aide 
        *       pour affichage dans une liste.
	*/           
        public function list_categories() {
            		
            $query = $this->db->get('pcet_categories_aide');
		 
            $categories = array();
		 	
            if ($query->result()) {
                
		foreach ($query->result() as $categorie) {
                    
                    $categories[$categorie->id] = $categorie->NOM_CATEGORIE;
		}
                
		return $categories;

           } else {
               
		return FALSE;
           }

        }
        
        public function get_categories() {
            
            $categories = array();
            
            $categories = $this->categories_model->order_by('number', 'asc')
                    ->find_all();
            
            return $categories;
            
        }
        
}
