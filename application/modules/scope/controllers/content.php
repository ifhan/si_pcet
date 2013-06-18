<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Scope.Content.View');
		$this->load->model('scope_model', null, true);
		$this->lang->load('scope');
		
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
					$result = $this->scope_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('scope_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('scope_delete_failure') . $this->scope_model->error, 'error');
				}
			}
		}

		$records = $this->scope_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Scope');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Scope object.
	*/
	public function create()
	{
		$this->auth->restrict('Scope.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_scope())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('scope_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'scope');

				Template::set_message(lang('scope_create_success'), 'success');
				redirect(SITE_AREA .'/content/scope');
			}
			else
			{
				Template::set_message(lang('scope_create_failure') . $this->scope_model->error, 'error');
			}
		}
		Assets::add_module_js('scope', 'scope.js');

		Template::set('toolbar_title', lang('scope_create') . ' Scope');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Scope data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('scope_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/scope');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Scope.Content.Edit');

			if ($this->save_scope('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('scope_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'scope');

				Template::set_message(lang('scope_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('scope_edit_failure') . $this->scope_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Scope.Content.Delete');

			if ($this->scope_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('scope_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'scope');

				Template::set_message(lang('scope_delete_success'), 'success');

				redirect(SITE_AREA .'/content/scope');
			} else
			{
				Template::set_message(lang('scope_delete_failure') . $this->scope_model->error, 'error');
			}
		}
		Template::set('scope', $this->scope_model->find($id));
		Assets::add_module_js('scope', 'scope.js');

		Template::set('toolbar_title', lang('scope_edit') . ' Scope');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_scope()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_scope($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('scope_NOM_GES_BILAN','Nom du scope','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['NOM_GES_BILAN']        = $this->input->post('scope_NOM_GES_BILAN');

		if ($type == 'insert')
		{
			$id = $this->scope_model->insert($data);

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
			$return = $this->scope_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}