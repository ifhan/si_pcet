<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Departements.Content.View');
		$this->load->model('departements_model', null, true);
		$this->lang->load('departements');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
		Template::set_block('sub_nav', 'content/_sub_nav');
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
					$result = $this->departements_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('departements_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('departements_delete_failure') . $this->departements_model->error, 'error');
				}
			}
		}

		$records = $this->departements_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Departements');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Departements object.
	*/
	public function create()
	{
		$this->auth->restrict('Departements.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_departements())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('departements_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'departements');

				Template::set_message(lang('departements_create_success'), 'success');
				redirect(SITE_AREA .'/content/departements');
			}
			else
			{
				Template::set_message(lang('departements_create_failure') . $this->departements_model->error, 'error');
			}
		}
		Assets::add_module_js('departements', 'departements.js');

		Template::set('toolbar_title', lang('departements_create') . ' Departements');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Departements data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('departements_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/departements');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Departements.Content.Edit');

			if ($this->save_departements('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('departements_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'departements');

				Template::set_message(lang('departements_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('departements_edit_failure') . $this->departements_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Departements.Content.Delete');

			if ($this->departements_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('departements_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'departements');

				Template::set_message(lang('departements_delete_success'), 'success');

				redirect(SITE_AREA .'/content/departements');
			} else
			{
				Template::set_message(lang('departements_delete_failure') . $this->departements_model->error, 'error');
			}
		}
		Template::set('departements', $this->departements_model->find($id));
		Assets::add_module_js('departements', 'departements.js');

		Template::set('toolbar_title', lang('departements_edit') . ' Departements');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_departements()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_departements($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('departements_INSEE_Region','INSEE Region','max_length[2]');
		$this->form_validation->set_rules('departements_Id_BDCarto','Id BDCarto','max_length[11]');
		$this->form_validation->set_rules('departements_Nom_Departement','Nom Departement','max_length[30]');
		$this->form_validation->set_rules('departements_INSEE_Departement','INSEE Departement','max_length[2]');
		$this->form_validation->set_rules('departements_Abscisse_Departement','Abscisse Departement','max_length[11]');
		$this->form_validation->set_rules('departements_Ordonnee_Departement','Ordonnee Departement','max_length[11]');
		$this->form_validation->set_rules('departements_EXTRACTION_IGN','EXTRACTION IGN','max_length[16]');
		$this->form_validation->set_rules('departements_RECETTE','RECETTE','max_length[16]');
		$this->form_validation->set_rules('departements_the_geom','The Geom','max_length[16]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['INSEE_Region']        = $this->input->post('departements_INSEE_Region');
		$data['Id_BDCarto']        = $this->input->post('departements_Id_BDCarto');
		$data['Nom_Departement']        = $this->input->post('departements_Nom_Departement');
		$data['INSEE_Departement']        = $this->input->post('departements_INSEE_Departement');
		$data['Abscisse_Departement']        = $this->input->post('departements_Abscisse_Departement');
		$data['Ordonnee_Departement']        = $this->input->post('departements_Ordonnee_Departement');
		$data['EXTRACTION_IGN']        = $this->input->post('departements_EXTRACTION_IGN');
		$data['RECETTE']        = $this->input->post('departements_RECETTE') ? $this->input->post('departements_RECETTE') : '0000-00-00 00:00:00';
		$data['the_geom']        = $this->input->post('departements_the_geom');

		if ($type == 'insert')
		{
			$id = $this->departements_model->insert($data);

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
			$return = $this->departements_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}