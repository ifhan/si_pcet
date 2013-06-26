<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Pages.Settings.View');
		$this->load->model('pages_model', null, true);
		$this->lang->load('pages');
		
			Assets::add_js(Template::theme_url('js/editors/tiny_mce/tiny_mce.js'));
			Assets::add_js(Template::theme_url('js/editors/tiny_mce/tiny_mce_init.js'));
		Template::set_block('sub_nav', 'settings/_sub_nav');
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
					$result = $this->pages_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pages_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pages_delete_failure') . $this->pages_model->error, 'error');
				}
			}
		}

		$records = $this->pages_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Pages');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Pages object.
	*/
	public function create()
	{
		$this->auth->restrict('Pages.Settings.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_pages())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pages_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pages');

				Template::set_message(lang('pages_create_success'), 'success');
				redirect(SITE_AREA .'/settings/pages');
			}
			else
			{
				Template::set_message(lang('pages_create_failure') . $this->pages_model->error, 'error');
			}
		}
		Assets::add_module_js('pages', 'pages.js');

		Template::set('toolbar_title', lang('pages_create') . ' Pages');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Pages data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pages_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/pages');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Pages.Settings.Edit');

			if ($this->save_pages('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pages_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pages');

				Template::set_message(lang('pages_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('pages_edit_failure') . $this->pages_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Pages.Settings.Delete');

			if ($this->pages_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pages_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pages');

				Template::set_message(lang('pages_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/pages');
			} else
			{
				Template::set_message(lang('pages_delete_failure') . $this->pages_model->error, 'error');
			}
		}
		Template::set('pages', $this->pages_model->find($id));
		Assets::add_module_js('pages', 'pages.js');

		Template::set('toolbar_title', lang('pages_edit') . ' Pages');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pages()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pages($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pages_title','Titre','required|max_length[255]');
		$this->form_validation->set_rules('pages_text','Texte','');
		$this->form_validation->set_rules('pages_slug','URL','max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        = $this->input->post('pages_title');
		$data['text']        = $this->input->post('pages_text');
		$data['slug']        = $this->input->post('pages_slug');

		if ($type == 'insert')
		{
			$id = $this->pages_model->insert($data);

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
			$return = $this->pages_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}