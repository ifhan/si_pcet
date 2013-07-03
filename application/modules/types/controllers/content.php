<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Types.Content.View');
		$this->load->model('types_model', null, true);
		$this->lang->load('types');
		
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
					$result = $this->types_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('types_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('types_delete_failure') . $this->types_model->error, 'error');
				}
			}
		}

		$records = $this->types_model->order_by('NOM_TYPE', 'asc')->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', lang('types_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Types object.
	*/
	public function create()
	{
		$this->auth->restrict('Types.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_types())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('types_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'types');

				Template::set_message(lang('types_create_success'), 'success');
				redirect(SITE_AREA .'/content/types');
			}
			else
			{
				Template::set_message(lang('types_create_failure') . $this->types_model->error, 'error');
			}
		}
		Assets::add_module_js('types', 'types.js');

		Template::set('toolbar_title', lang('types'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Types data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('types_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/types');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Types.Content.Edit');

			if ($this->save_types('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('types_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'types');

				Template::set_message(lang('types_edit_success'), 'success');
                                redirect(SITE_AREA .'/content/types');
			}
			else
			{
				Template::set_message(lang('types_edit_failure') . $this->types_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Types.Content.Delete');

			if ($this->types_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('types_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'types');

				Template::set_message(lang('types_delete_success'), 'success');

				redirect(SITE_AREA .'/content/types');
			} else
			{
				Template::set_message(lang('types_delete_failure') . $this->types_model->error, 'error');
			}
		}
		Template::set('types', $this->types_model->find($id));
		Assets::add_module_js('types', 'types.js');

		Template::set('toolbar_title', lang('types'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_types()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_types($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('types_NOM_TYPE','Nom du type de structure','max_length[50]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['NOM_TYPE']        = $this->input->post('types_NOM_TYPE');

		if ($type == 'insert')
		{
			$id = $this->types_model->insert($data);

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
			$return = $this->types_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}