<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Autres.Content.View');
		$this->load->model('autres_model', null, true);
		$this->lang->load('autres');
		
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
					$result = $this->autres_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('autres_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('autres_delete_failure') . $this->autres_model->error, 'error');
				}
			}
		}

		$records = $this->autres_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Autres');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Autres object.
	*/
	public function create()
	{
		$this->auth->restrict('Autres.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_autres())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('autres_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'autres');

				Template::set_message(lang('autres_create_success'), 'success');
				redirect(SITE_AREA .'/content/autres');
			}
			else
			{
				Template::set_message(lang('autres_create_failure') . $this->autres_model->error, 'error');
			}
		}
		Assets::add_module_js('autres', 'autres.js');

		Template::set('toolbar_title', lang('autres_create') . ' Autres');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Autres data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('autres_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/autres');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Autres.Content.Edit');

			if ($this->save_autres('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('autres_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'autres');

				Template::set_message(lang('autres_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('autres_edit_failure') . $this->autres_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Autres.Content.Delete');

			if ($this->autres_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('autres_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'autres');

				Template::set_message(lang('autres_delete_success'), 'success');

				redirect(SITE_AREA .'/content/autres');
			} else
			{
				Template::set_message(lang('autres_delete_failure') . $this->autres_model->error, 'error');
			}
		}
		Template::set('autres', $this->autres_model->find($id));
		Assets::add_module_js('autres', 'autres.js');

		Template::set('toolbar_title', lang('autres_edit') . ' Autres');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_autres()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_autres($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('autres_ID_STR','Identifiant','max_length[10]');
		$this->form_validation->set_rules('autres_NOM','Nom','max_length[255]');
		$this->form_validation->set_rules('autres_COMMENT','Commentaire','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_STR']        = $this->input->post('autres_ID_STR');
		$data['NOM']        = $this->input->post('autres_NOM');
		$data['COMMENT']        = $this->input->post('autres_COMMENT');

		if ($type == 'insert')
		{
			$id = $this->autres_model->insert($data);

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
			$return = $this->autres_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}