<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scope_model extends BF_Model {

	protected $table	= "pcet_ges_bilan";
	protected $key		= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        function list_scopes() {
            $query = $this->db->get('pcet_ges_bilan');
		 
            $scopes = array();
		 
            if ($query->result()) {
		foreach ($query->result() as $scope) {
                	$scopes[$scope->id] = $scope->NOM_GES_BILAN;
		}
		return $scopes;
            } else {
		return FALSE;
            }
	}

}
