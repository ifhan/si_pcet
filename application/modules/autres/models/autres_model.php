<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Autres_model extends BF_Model {

	protected $table		= "pcet_autres_structures";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
