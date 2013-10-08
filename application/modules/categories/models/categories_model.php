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
               
        public function get_categories_aides($id = NULL) {

            //define optional id for single post
            //if an id was supplied
            if ( $id != NULL ) {
                $this->db->where('id',$id);
            }

            // execute query
            $query = $this->db->get('pcet_categories_aide');

            //make sure results exist
            if($query->num_rows() > 0) {
                $categories = $query->result();
            } else {
                return FALSE;
            }

            //create array for appended (with comments) posts
            $appended_categories_array = array();

            //loop through each post
            foreach ($categories as $categorie) {

                //get comments associated with the post
                $this->db->where('category_id', $categorie->id);
                $aides = $this->db->get('pcet_aide')->result();

                //if there are comments, add the comments to the post object
                if($aides->num_rows() > 0) {
                    $categorie->aides = $aides;
                }
                else {
                    $categorie->aides = array();
                }

                //rebuild the returned posts with their comments
                $appended_categories_array[] = $categories;

            }

            //if post id supplied, only return the single post object
            if ($id != NULL) {
                return $appended_categories_array[0];
            }
            else {
                return $appended_categories_array;
            }
    }        
        
}
