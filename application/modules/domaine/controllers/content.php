<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Domaine.Content.View');
		$this->load->model('domaine_model', null, true);
		$this->lang->load('domaine');
		
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
					$result = $this->domaine_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('domaine_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('domaine_delete_failure') . $this->domaine_model->error, 'error');
				}
			}
		}

		$records = $this->domaine_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Paramétrer les domaine de l\'action');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Domaine object.
	*/
	public function create()
	{
		$this->auth->restrict('Domaine.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_domaine())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('domaine_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'domaine');

				Template::set_message(lang('domaine_create_success'), 'success');
				redirect(SITE_AREA .'/content/domaine');
			}
			else
			{
				Template::set_message(lang('domaine_create_failure') . $this->domaine_model->error, 'error');
			}
		}
		Assets::add_module_js('domaine', 'domaine.js');

		Template::set('toolbar_title', 'Créer un domaine de l\'action');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Domaine data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('domaine_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/domaine');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Domaine.Content.Edit');

			if ($this->save_domaine('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('domaine_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'domaine');

				Template::set_message(lang('domaine_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('domaine_edit_failure') . $this->domaine_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Domaine.Content.Delete');

			if ($this->domaine_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('domaine_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'domaine');

				Template::set_message(lang('domaine_delete_success'), 'success');

				redirect(SITE_AREA .'/content/domaine');
			} else
			{
				Template::set_message(lang('domaine_delete_failure') . $this->domaine_model->error, 'error');
			}
		}
		Template::set('domaine', $this->domaine_model->find($id));
		Assets::add_module_js('domaine', 'domaine.js');

		Template::set('toolbar_title', 'Modifier Domaine');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_domaine()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_domaine($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('domaine_NOM_DOMAINE_ACTION','Nom du domaine d action','max_length[70]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['NOM_DOMAINE_ACTION']        = $this->input->post('domaine_NOM_DOMAINE_ACTION');

		if ($type == 'insert')
		{
			$id = $this->domaine_model->insert($data);

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
			$return = $this->domaine_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}