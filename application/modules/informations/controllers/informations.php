<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class informations extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('informations_model', null, true);
		$this->lang->load('informations');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->informations_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------




}