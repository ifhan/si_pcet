<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scope_model extends BF_Model {

	protected $table		= "pcet_ges_bilan";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        
        function get_scope() {
		$query = $this->db->get('pcet_ges_bilan');
		 
		$scope = array();
		 
		if ($query->result()) {
			foreach ($query->result() as $scopes) {
				$scope[$scopes->id] = $scopes->NOM_GES_BILAN;
			}
			return $scope;
		} else {
			return FALSE;
		}
	}
}
