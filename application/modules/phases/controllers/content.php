<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Phases.Content.View');
		$this->load->model('phases_model', null, true);
		$this->lang->load('phases');
		
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
					$result = $this->phases_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('phases_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('phases_delete_failure') . $this->phases_model->error, 'error');
				}
			}
		}

		$records = $this->phases_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Param&eacute;trer les phases');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Phases object.
	*/
	public function create()
	{
		$this->auth->restrict('Phases.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_phases())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('phases_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'phases');

				Template::set_message(lang('phases_create_success'), 'success');
				redirect(SITE_AREA .'/content/phases');
			}
			else
			{
				Template::set_message(lang('phases_create_failure') . $this->phases_model->error, 'error');
			}
		}
		Assets::add_module_js('phases', 'phases.js');

		Template::set('toolbar_title', lang('phases_create') . ' Phases');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Phases data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('phases_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/phases');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Phases.Content.Edit');

			if ($this->save_phases('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('phases_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'phases');

				Template::set_message(lang('phases_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('phases_edit_failure') . $this->phases_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Phases.Content.Delete');

			if ($this->phases_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('phases_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'phases');

				Template::set_message(lang('phases_delete_success'), 'success');

				redirect(SITE_AREA .'/content/phases');
			} else
			{
				Template::set_message(lang('phases_delete_failure') . $this->phases_model->error, 'error');
			}
		}
		Template::set('phases', $this->phases_model->find($id));
		Assets::add_module_js('phases', 'phases.js');

		Template::set('toolbar_title', lang('phases_edit') . ' Phases');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_phases()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_phases($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('phases_NOM_PHASE','Nom de la phase','max_length[70]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['NOM_PHASE']        = $this->input->post('phases_NOM_PHASE');

		if ($type == 'insert')
		{
			$id = $this->phases_model->insert($data);

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
			$return = $this->phases_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}