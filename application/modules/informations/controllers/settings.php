<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Informations.Settings.View');
		$this->load->model('informations_model', null, true);
                $this->load->helper('typography');
		$this->lang->load('informations');
		
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
					$result = $this->informations_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('informations_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('informations_delete_failure') . $this->informations_model->error, 'error');
				}
			}
		}

		$records = $this->informations_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', lang('informations_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Informations object.
	*/
	public function create()
	{
		$this->auth->restrict('Informations.Settings.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_informations())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('informations_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'informations');

				Template::set_message(lang('informations_create_success'), 'success');
				redirect(SITE_AREA .'/settings/informations');
			}
			else
			{
				Template::set_message(lang('informations_create_failure') . $this->informations_model->error, 'error');
			}
		}
		Assets::add_module_js('informations', 'informations.js');

		Template::set('toolbar_title', lang('informations'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Informations data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('informations_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/informations');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Informations.Settings.Edit');

			if ($this->save_informations('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('informations_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'informations');

				Template::set_message(lang('informations_edit_success'), 'success');
                                redirect(SITE_AREA .'/settings/informations');
			}
			else
			{
				Template::set_message(lang('informations_edit_failure') . $this->informations_model->error, 'error');
                                redirect(SITE_AREA .'/settings/informations');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Informations.Settings.Delete');

			if ($this->informations_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('informations_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'informations');

				Template::set_message(lang('informations_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/informations');
			} else
			{
				Template::set_message(lang('informations_delete_failure') . $this->informations_model->error, 'error');
			}
		}
		Template::set('informations', $this->informations_model->find($id));
		Assets::add_module_js('informations', 'informations.js');

		Template::set('toolbar_title', lang('informations'));
		Template::render();
	}
        
        public function show($id) {
            $information = $this->informations_model->find($id);
            
            Template::set('information', $information);
            Template::set_view('show');
            Template::set('toolbar_title', lang('informations'));
            Template::render();             
        }
        
        public function view($slug)
        {
            $information = $this->db->get_where('informations', array('slug' => $slug), 1);

            Template::set('information', $information);
            Template::set_view('show');
            Template::set('toolbar_title', lang('informations'));
            Template::render(); 
        }        

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_informations()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_informations($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('informations_title','Titre','max_length[255]');
		$this->form_validation->set_rules('informations_slug','Slug','max_length[255]');
		$this->form_validation->set_rules('informations_text','Text','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['informations_title']        = $this->input->post('informations_title');
		$data['informations_slug']        = $this->input->post('informations_slug');
		$data['informations_text']        = $this->input->post('informations_text');

		if ($type == 'insert')
		{
			$id = $this->informations_model->insert($data);

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
			$return = $this->informations_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}