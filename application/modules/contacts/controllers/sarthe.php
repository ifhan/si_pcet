<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sarthe extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Contacts.Sarthe.View');
		$this->load->model('contacts_model', null, true);
		$this->lang->load('contacts');
		
		Template::set_block('sub_nav', 'sarthe/_sub_nav');
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
					$result = $this->contacts_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('contacts_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('contacts_delete_failure') . $this->contacts_model->error, 'error');
				}
			}
		}

		$records = $this->contacts_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Contacts');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Contacts object.
	*/
	public function create()
	{
		$this->auth->restrict('Contacts.Sarthe.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_contacts())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contacts_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'contacts');

				Template::set_message(lang('contacts_create_success'), 'success');
				redirect(SITE_AREA .'/sarthe/contacts');
			}
			else
			{
				Template::set_message(lang('contacts_create_failure') . $this->contacts_model->error, 'error');
			}
		}
		Assets::add_module_js('contacts', 'contacts.js');

		Template::set('toolbar_title', lang('contacts_create') . ' Contacts');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Contacts data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('contacts_invalid_id'), 'error');
			redirect(SITE_AREA .'/sarthe/contacts');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Contacts.Sarthe.Edit');

			if ($this->save_contacts('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contacts_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contacts');

				Template::set_message(lang('contacts_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('contacts_edit_failure') . $this->contacts_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Contacts.Sarthe.Delete');

			if ($this->contacts_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contacts_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contacts');

				Template::set_message(lang('contacts_delete_success'), 'success');

				redirect(SITE_AREA .'/sarthe/contacts');
			} else
			{
				Template::set_message(lang('contacts_delete_failure') . $this->contacts_model->error, 'error');
			}
		}
		Template::set('contacts', $this->contacts_model->find($id));
		Assets::add_module_js('contacts', 'contacts.js');

		Template::set('toolbar_title', lang('contacts_edit') . ' Contacts');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_contacts()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_contacts($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('contacts_CIVILITE','Civilite','');
		$this->form_validation->set_rules('contacts_PRENOM','Prenom','max_length[30]');
		$this->form_validation->set_rules('contacts_NOM_CONTACT','Nom','max_length[30]');
		$this->form_validation->set_rules('contacts_MAIL','Courriel','max_length[100]');
		$this->form_validation->set_rules('contacts_ID_STR','Collectivite','max_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['CIVILITE']        = $this->input->post('contacts_CIVILITE');
		$data['PRENOM']        = $this->input->post('contacts_PRENOM');
		$data['NOM_CONTACT']        = $this->input->post('contacts_NOM_CONTACT');
		$data['MAIL']        = $this->input->post('contacts_MAIL');
		$data['ID_STR']        = $this->input->post('contacts_ID_STR');

		if ($type == 'insert')
		{
			$id = $this->contacts_model->insert($data);

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
			$return = $this->contacts_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}