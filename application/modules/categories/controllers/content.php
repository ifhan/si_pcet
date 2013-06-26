<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Categories.Content.View');
		$this->load->model('categories_model', null, true);
		$this->lang->load('categories');
		
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
					$result = $this->categories_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('categories_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('categories_delete_failure') . $this->categories_model->error, 'error');
				}
			}
		}

		$records = $this->categories_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Categories');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Categories object.
	*/
	public function create()
	{
		$this->auth->restrict('Categories.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_categories())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('categories_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'categories');

				Template::set_message(lang('categories_create_success'), 'success');
				redirect(SITE_AREA .'/content/categories');
			}
			else
			{
				Template::set_message(lang('categories_create_failure') . $this->categories_model->error, 'error');
			}
		}
		Assets::add_module_js('categories', 'categories.js');

		Template::set('toolbar_title', lang('categories_create') . ' Categories');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Categories data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('categories_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/categories');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Categories.Content.Edit');

			if ($this->save_categories('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('categories_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'categories');

				Template::set_message(lang('categories_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('categories_edit_failure') . $this->categories_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Categories.Content.Delete');

			if ($this->categories_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('categories_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'categories');

				Template::set_message(lang('categories_delete_success'), 'success');

				redirect(SITE_AREA .'/content/categories');
			} else
			{
				Template::set_message(lang('categories_delete_failure') . $this->categories_model->error, 'error');
			}
		}
		Template::set('categories', $this->categories_model->find($id));
		Assets::add_module_js('categories', 'categories.js');

		Template::set('toolbar_title', lang('categories_edit') . ' Categories');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_categories()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_categories($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('categories_NOM_CATEGORIE','Nom','max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['NOM_CATEGORIE']        = $this->input->post('categories_NOM_CATEGORIE');

		if ($type == 'insert')
		{
			$id = $this->categories_model->insert($data);

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
			$return = $this->categories_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}