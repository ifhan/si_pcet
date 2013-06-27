<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aide_model extends BF_Model {

	protected $table	= "pcet_aide";
	protected $key		= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
        
        public function get_aides() {
            $records = $this->aide_model
                    ->join('pcet_categories_aide','pcet_aide.category_id = pcet_categories_aide.id','left')
                    ->select('pcet_aide.id as id, pcet_aide.number as number, pcet_aide.title as title, 
                        pcet_categories_aide.NOM_CATEGORIE as NOM_CATEGORIE, pcet_categories_aide.number as categories_number')
                    ->order_by('title','asc')
                    ->find_all();
            return $records;
        }
}
