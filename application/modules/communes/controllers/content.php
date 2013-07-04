<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Communes.Content.View');
		$this->load->model('communes_model', null, true);
		$this->lang->load('communes');
		
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
					$result = $this->communes_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('communes_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('communes_delete_failure') . $this->communes_model->error, 'error');
				}
			}
		}

		$records = $this->communes_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', lang('communes_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Communes object.
	*/
	public function create()
	{
		$this->auth->restrict('Communes.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_communes())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('communes_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'communes');

				Template::set_message(lang('communes_create_success'), 'success');
				redirect(SITE_AREA .'/content/communes');
			}
			else
			{
				Template::set_message(lang('communes_create_failure') . $this->communes_model->error, 'error');
			}
		}
		Assets::add_module_js('communes', 'communes.js');

		Template::set('toolbar_title', lang('communes'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Communes data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('communes_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/communes');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Communes.Content.Edit');

			if ($this->save_communes('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('communes_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'communes');

				Template::set_message(lang('communes_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('communes_edit_failure') . $this->communes_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Communes.Content.Delete');

			if ($this->communes_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('communes_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'communes');

				Template::set_message(lang('communes_delete_success'), 'success');

				redirect(SITE_AREA .'/content/communes');
			} else
			{
				Template::set_message(lang('communes_delete_failure') . $this->communes_model->error, 'error');
			}
		}
		Template::set('communes', $this->communes_model->find($id));
		Assets::add_module_js('communes', 'communes.js');

		Template::set('toolbar_title', lang('communes'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_communes()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_communes($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('communes_INSEE_Region','INSEE Region','max_length[2]');
		$this->form_validation->set_rules('communes_Nom_Region','Nom Region','max_length[30]');
		$this->form_validation->set_rules('communes_INSEE_Departement','INSEE Departement','max_length[2]');
		$this->form_validation->set_rules('communes_Nom_Departement','Nom Departement','max_length[30]');
		$this->form_validation->set_rules('communes_INSEE_Arrondissement','INSEE Arrondissement','max_length[1]');
		$this->form_validation->set_rules('communes_INSEE_Canton','INSEE Canton','max_length[2]');
		$this->form_validation->set_rules('communes_Id_BDCarto','Id BDCarto','max_length[11]');
		$this->form_validation->set_rules('communes_Nom_Commune','Nom Commune','max_length[50]');
		$this->form_validation->set_rules('communes_INSEE_Commune','INSEE Commune','max_length[5]');
		$this->form_validation->set_rules('communes_Statut','Statut','max_length[20]');
		$this->form_validation->set_rules('communes_Abscisse_Commune','Abscisse Commune','max_length[11]');
		$this->form_validation->set_rules('communes_Ordonnee_Commune','Ordonnee Commune','max_length[11]');
		$this->form_validation->set_rules('communes_Superficie','Superficie','max_length[11]');
		$this->form_validation->set_rules('communes_Population','Population','max_length[11]');
		$this->form_validation->set_rules('communes_EXTRACTION_IGN','EXTRACTION IGN','max_length[16]');
		$this->form_validation->set_rules('communes_RECETTE','RECETTE','max_length[16]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['INSEE_Region']        = $this->input->post('communes_INSEE_Region');
		$data['Nom_Region']        = $this->input->post('communes_Nom_Region');
		$data['INSEE_Departement']        = $this->input->post('communes_INSEE_Departement');
		$data['Nom_Departement']        = $this->input->post('communes_Nom_Departement');
		$data['INSEE_Arrondissement']        = $this->input->post('communes_INSEE_Arrondissement');
		$data['INSEE_Canton']        = $this->input->post('communes_INSEE_Canton');
		$data['Id_BDCarto']        = $this->input->post('communes_Id_BDCarto');
		$data['Nom_Commune']        = $this->input->post('communes_Nom_Commune');
		$data['INSEE_Commune']        = $this->input->post('communes_INSEE_Commune');
		$data['Statut']        = $this->input->post('communes_Statut');
		$data['Abscisse_Commune']        = $this->input->post('communes_Abscisse_Commune');
		$data['Ordonnee_Commune']        = $this->input->post('communes_Ordonnee_Commune');
		$data['Superficie']        = $this->input->post('communes_Superficie');
		$data['Population']        = $this->input->post('communes_Population');
		$data['EXTRACTION_IGN']        = $this->input->post('communes_EXTRACTION_IGN');
		$data['RECETTE']        = $this->input->post('communes_RECETTE') ? $this->input->post('communes_RECETTE') : '0000-00-00 00:00:00';

		if ($type == 'insert')
		{
			$id = $this->communes_model->insert($data);

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
			$return = $this->communes_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}