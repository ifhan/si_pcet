<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class informations extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('informations_model', null, true);
                $this->load->helper('typography');
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


       public function show($id) {
            $information = $this->informations_model->find($id);
            
            Template::set('information', $information);
            Template::set_view('show');
            Template::set('toolbar_title', lang('informations'));
            Template::render();             
        }

}