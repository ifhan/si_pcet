<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Aide.Content.View');
		$this->load->model('aide_model', null, true);
                $this->load->model('categories/categories_model', null, true);
		$this->lang->load('aide');
		
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
					$result = $this->aide_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('aide_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('aide_delete_failure') . $this->aide_model->error, 'error');
				}
			}
		}

		$records = $this->aide_model->get_aides();

		Template::set('records', $records);
		Template::set('toolbar_title', lang('aide_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Aide object.
	*/
	public function create()
	{
		$this->auth->restrict('Aide.Content.Create');
                $categories = $this->categories_model->list_categories();

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_aide())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('aide_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'aide');

				Template::set_message(lang('aide_create_success'), 'success');
				redirect(SITE_AREA .'/content/aide');
			}
			else
			{
				Template::set_message(lang('aide_create_failure') . $this->aide_model->error, 'error');
			}
		}
		Assets::add_module_js('aide', 'aide.js');

                Template::set('categories', $categories);
		Template::set('toolbar_title', lang('aide'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Aide data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $categories = $this->categories_model->list_categories();

		if (empty($id))
		{
			Template::set_message(lang('aide_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/aide');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Aide.Content.Edit');

			if ($this->save_aide('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('aide_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'aide');

				Template::set_message(lang('aide_edit_success'), 'success');
                                redirect(SITE_AREA .'/content/aide');
			}
			else
			{
				Template::set_message(lang('aide_edit_failure') . $this->aide_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Aide.Content.Delete');

			if ($this->aide_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('aide_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'aide');

				Template::set_message(lang('aide_delete_success'), 'success');

				redirect(SITE_AREA .'/content/aide');
			} else
			{
				Template::set_message(lang('aide_delete_failure') . $this->aide_model->error, 'error');
			}
		}
		Template::set('aide', $this->aide_model->find($id));
		Assets::add_module_js('aide', 'aide.js');
                Template::set('categories', $categories);
		Template::set('toolbar_title', lang('aide'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_aide()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_aide($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('aide_title','Titre','max_length[255]');
		$this->form_validation->set_rules('aide_slug','URL','max_length[255]');
		$this->form_validation->set_rules('aide_body','Texte','');
		$this->form_validation->set_rules('aide_created_on','Creee le','max_length[255]');
		$this->form_validation->set_rules('aide_modified_on','Modifiee le','max_length[255]');
		$this->form_validation->set_rules('aide_deleted','Supprimee le','max_length[1]');
		$this->form_validation->set_rules('aide_category_id','Categorie','max_length[11]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        = $this->input->post('aide_title');
		$data['slug']        = $this->input->post('aide_slug');
		$data['body']        = $this->input->post('aide_body');
		$data['created_on']        = $this->input->post('aide_created_on') ? $this->input->post('aide_created_on') : '0000-00-00 00:00:00';
		$data['modified_on']        = $this->input->post('aide_modified_on') ? $this->input->post('aide_modified_on') : '0000-00-00 00:00:00';
		$data['deleted']        = $this->input->post('aide_deleted');
		$data['category_id']        = $this->input->post('aide_category_id');

		if ($type == 'insert')
		{
			$id = $this->aide_model->insert($data);

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
			$return = $this->aide_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}