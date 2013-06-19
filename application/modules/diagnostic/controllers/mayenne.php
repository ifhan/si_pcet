<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mayenne extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Diagnostic.Mayenne.View');
		$this->load->model('diagnostic_model', null, true);
                $this->load->model('scope/scope_model', null, true);
                $this->load->model('pcet/pcet_model', null, true);
		$this->lang->load('diagnostic');
		
		Template::set_block('sub_nav', 'mayenne/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->diagnostic_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('diagnostic_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('diagnostic_delete_failure') . $this->diagnostic_model->error, 'error');
				}
			}
		}

		$records = $this->diagnostic_model->get_diagnostic_by_departement('53');
                
		Template::set('records', $records);
		Template::set('toolbar_title', lang('diagnostic_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Diagnostic object.
	*/
	public function create()
	{
		$this->auth->restrict('Diagnostic.Mayenne.Create');
                $pcets = $this->pcet_model->list_pcet_by_departement('53');
                $scope = $this->scope_model->list_scopes();

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_diagnostic())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('diagnostic_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'diagnostic');

				Template::set_message(lang('diagnostic_create_success'), 'success');
				redirect(SITE_AREA .'/mayenne/diagnostic');
			}
			else
			{
				Template::set_message(lang('diagnostic_create_failure') . $this->diagnostic_model->error, 'error');
			}
		}
		Assets::add_module_js('diagnostic', 'diagnostic.js');
                Template::set('pcets', $pcets);
                Template::set('scope', $scope);
		Template::set('toolbar_title', lang('diagnostic'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Diagnostic data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $pcets = $this->pcet_model->list_pcet_by_departement('53');
                $scope = $this->scope_model->list_scopes();

		if (empty($id))
		{
			Template::set_message(lang('diagnostic_invalid_id'), 'error');
			redirect(SITE_AREA .'/mayenne/diagnostic');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Diagnostic.Mayenne.Edit');

			if ($this->save_diagnostic('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('diagnostic_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'diagnostic');

				Template::set_message(lang('diagnostic_edit_success'), 'success');
                                redirect(SITE_AREA .'/mayenne/diagnostic');
			}
			else
			{
				Template::set_message(lang('diagnostic_edit_failure') . $this->diagnostic_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Diagnostic.Mayenne.Delete');

			if ($this->diagnostic_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('diagnostic_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'diagnostic');

				Template::set_message(lang('diagnostic_delete_success'), 'success');

				redirect(SITE_AREA .'/mayenne/diagnostic');
			} else
			{
				Template::set_message(lang('diagnostic_delete_failure') . $this->diagnostic_model->error, 'error');
			}
		}
		Template::set('diagnostic', $this->diagnostic_model->find($id));
		Assets::add_module_js('diagnostic', 'diagnostic.js');
                Template::set('pcets', $pcets);
                Template::set('scope', $scope);
		Template::set('toolbar_title', lang('diagnostic'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_diagnostic()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_diagnostic($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('diagnostic_ID_PCET','PCET','max_length[10]');
		$this->form_validation->set_rules('diagnostic_GES_DIAG','Diagnostic gaz a effet de serre','');
		$this->form_validation->set_rules('diagnostic_CONSO_KTEP_T','Consommation du territoire','max_length[11]');
		$this->form_validation->set_rules('diagnostic_EMIS_CO2_T','Emissions du territoire','max_length[11]');
		$this->form_validation->set_rules('diagnostic_CONSO_KTEP_PC','Consomation patrimoine et competence','max_length[11]');
		$this->form_validation->set_rules('diagnostic_EMIS_CO2_PC','Emissions patrimoine et competence','max_length[11]');
		$this->form_validation->set_rules('diagnostic_ID_GES_BILAN_T','ID GES BILAN T','max_length[10]');
		$this->form_validation->set_rules('diagnostic_ID_GES_BILAN_PC','ID GES BILAN PC','max_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('diagnostic_ID_PCET');
		$data['GES_DIAG']        = $this->input->post('diagnostic_GES_DIAG');
		$data['CONSO_KTEP_T']        = $this->input->post('diagnostic_CONSO_KTEP_T') ? $this->input->post('diagnostic_CONSO_KTEP_T') : '0';
		$data['EMIS_CO2_T']        = $this->input->post('diagnostic_EMIS_CO2_T') ? $this->input->post('diagnostic_EMIS_CO2_T') : '0';
		$data['CONSO_KTEP_PC']        = $this->input->post('diagnostic_CONSO_KTEP_PC') ? $this->input->post('diagnostic_CONSO_KTEP_PC') : '0';
		$data['EMIS_CO2_PC']        = $this->input->post('diagnostic_EMIS_CO2_PC') ? $this->input->post('diagnostic_EMIS_CO2_PC') : '0';
		$data['ID_GES_BILAN_T']        = $this->input->post('diagnostic_ID_GES_BILAN_T');
		$data['ID_GES_BILAN_PC']        = $this->input->post('diagnostic_ID_GES_BILAN_PC');

		if ($type == 'insert')
		{
			$id = $this->diagnostic_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->diagnostic_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}