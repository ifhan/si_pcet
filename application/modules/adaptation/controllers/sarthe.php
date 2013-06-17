<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sarthe extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Adaptation.Sarthe.View');
                $this->load->model('pcet/pcet_model', null, true);
		$this->load->model('structures/structures_model', null, true);
		$this->load->model('adaptation_model', null, true);
		$this->lang->load('adaptation');
		
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
					$result = $this->adaptation_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('adaptation_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('adaptation_delete_failure') . $this->adaptation_model->error, 'error');
				}
			}
		}

		$records = $this->adaptation_model->get_etude_vulnerabilite_by_departement('72');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('adaptation_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Adaptation object.
	*/
	public function create()
	{
		$this->auth->restrict('Adaptation.Sarthe.Create');
                $pcets = $this->pcet_model->list_pcet_by_departement('72');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_adaptation())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('adaptation_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'adaptation');

				Template::set_message(lang('adaptation_create_success'), 'success');
				redirect(SITE_AREA .'/sarthe/adaptation');
			}
			else
			{
				Template::set_message(lang('adaptation_create_failure') . $this->adaptation_model->error, 'error');
			}
		}
		Assets::add_module_js('adaptation', 'adaptation.js');

                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('adaptation_create') . ' Adaptation');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Adaptation data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $pcets = $this->pcet_model->list_pcet_by_departement('72');

		if (empty($id))
		{
			Template::set_message(lang('adaptation_invalid_id'), 'error');
			redirect(SITE_AREA .'/sarthe/adaptation');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Adaptation.Sarthe.Edit');

			if ($this->save_adaptation('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('adaptation_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'adaptation');

				Template::set_message(lang('adaptation_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('adaptation_edit_failure') . $this->adaptation_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Adaptation.Sarthe.Delete');

			if ($this->adaptation_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('adaptation_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'adaptation');

				Template::set_message(lang('adaptation_delete_success'), 'success');

				redirect(SITE_AREA .'/sarthe/adaptation');
			} else
			{
				Template::set_message(lang('adaptation_delete_failure') . $this->adaptation_model->error, 'error');
			}
		}
		Template::set('adaptation', $this->adaptation_model->find($id));
		Assets::add_module_js('adaptation', 'adaptation.js');

                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('adaptation_edit') . ' Adaptation');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_adaptation()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_adaptation($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('adaptation_ID_PCET','Identifiant','max_length[10]');
		$this->form_validation->set_rules('adaptation_VULNERABLE_ADAPT','Etude de vulnerabilite','max_length[1]');
		$this->form_validation->set_rules('adaptation_METHODE_ADAPT','Methodes employees','');
		$this->form_validation->set_rules('adaptation_ALEA_ADAPT','Aleas identifies','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('adaptation_ID_PCET');
		$data['VULNERABLE_ADAPT']        = $this->input->post('adaptation_VULNERABLE_ADAPT');
		$data['METHODE_ADAPT']        = $this->input->post('adaptation_METHODE_ADAPT');
		$data['ALEA_ADAPT']        = $this->input->post('adaptation_ALEA_ADAPT');

		if ($type == 'insert')
		{
			$id = $this->adaptation_model->insert($data);

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
			$return = $this->adaptation_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}