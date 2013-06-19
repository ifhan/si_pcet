<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mayenne extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Gouvernance.Mayenne.View');
		$this->load->model('gouvernance_model', null, true);
                $this->load->model('pcet/pcet_model', null, true);
		$this->lang->load('gouvernance');
		
		Template::set_block('sub_nav', 'mayenne/_sub_nav');
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
					$result = $this->gouvernance_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('gouvernance_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('gouvernance_delete_failure') . $this->gouvernance_model->error, 'error');
				}
			}
		}

		$records = $this->gouvernance_model->get_gouvernance_by_departement('53');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('gouvernance_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Gouvernance object.
	*/
	public function create()
	{
		$this->auth->restrict('Gouvernance.Mayenne.Create');
                $pcets = $this->pcet_model->list_pcet_by_departement('53');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_gouvernance())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gouvernance_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'gouvernance');

				Template::set_message(lang('gouvernance_create_success'), 'success');
				redirect(SITE_AREA .'/mayenne/gouvernance');
			}
			else
			{
				Template::set_message(lang('gouvernance_create_failure') . $this->gouvernance_model->error, 'error');
			}
		}
		Assets::add_module_js('gouvernance', 'gouvernance.js');
                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('gouvernance_create') . ' Gouvernance');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Gouvernance data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $pcets = $this->pcet_model->list_pcet_by_departement('53');

		if (empty($id))
		{
			Template::set_message(lang('gouvernance_invalid_id'), 'error');
			redirect(SITE_AREA .'/mayenne/gouvernance');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Gouvernance.Mayenne.Edit');

			if ($this->save_gouvernance('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gouvernance_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'gouvernance');

				Template::set_message(lang('gouvernance_edit_success'), 'success');
                                redirect(SITE_AREA .'/mayenne/gouvernance');
			}
			else
			{
				Template::set_message(lang('gouvernance_edit_failure') . $this->gouvernance_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Gouvernance.Mayenne.Delete');

			if ($this->gouvernance_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gouvernance_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'gouvernance');

				Template::set_message(lang('gouvernance_delete_success'), 'success');

				redirect(SITE_AREA .'/mayenne/gouvernance');
			} else
			{
				Template::set_message(lang('gouvernance_delete_failure') . $this->gouvernance_model->error, 'error');
			}
		}
		Template::set('gouvernance', $this->gouvernance_model->find($id));
		Assets::add_module_js('gouvernance', 'gouvernance.js');
                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('gouvernance_edit') . ' Gouvernance');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_gouvernance()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_gouvernance($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('gouvernance_ID_PCET','PCET','max_length[10]');
		$this->form_validation->set_rules('gouvernance_PRESENCE_GOUV','Presence de gouvernance','max_length[1]');
		$this->form_validation->set_rules('gouvernance_ACTEURS_GOUV','Les acteurs associes','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('gouvernance_ID_PCET');
		$data['PRESENCE_GOUV']        = $this->input->post('gouvernance_PRESENCE_GOUV');
		$data['ACTEURS_GOUV']        = $this->input->post('gouvernance_ACTEURS_GOUV');

		if ($type == 'insert')
		{
			$id = $this->gouvernance_model->insert($data);

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
			$return = $this->gouvernance_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}