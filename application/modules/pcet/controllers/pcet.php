<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pcet extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('pcet_model', null, true);
		$this->load->model('structures/structures_model', null, true);
		$this->load->model('phases/phases_model', null, true);
                $this->load->model('adaptation/adaptation_model', null, true);
                $this->load->helper('typography');
		$this->lang->load('pcet');
                	
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->pcet_model->get_pcet();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------


	/*
		Method: show()

		Displays a record of form data from several tables.
	*/
	public function show($ID_PCET)
	{

            $structure = $this->structures_model->get_structure_by_id($ID_PCET);
            $phase = $this->phases_model->get_phase_by_id($ID_PCET);
            $pcet = $this->pcet_model->find_by('ID_PCET',$ID_PCET);
            $adaptation = $this->adaptation_model->find_by('ID_PCET',$ID_PCET);
		
            Template::set('pcet', $pcet);
            Template::set('structure', $structure);
            Template::set('phase', $phase);
            Template::set('adaptation', $adaptation);
            Template::set('toolbar_title', lang('pcet_list'));
            Template::render();
	}

	//--------------------------------------------------------------------

}