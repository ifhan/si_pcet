<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sarthe extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Actions.Sarthe.View');
		$this->load->model('actions_model', null, true);
		$this->lang->load('actions');
		
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
					$result = $this->actions_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('actions_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('actions_delete_failure') . $this->actions_model->error, 'error');
				}
			}
		}

		$records = $this->actions_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Actions');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Actions object.
	*/
	public function create()
	{
		$this->auth->restrict('Actions.Sarthe.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_actions())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('actions_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'actions');

				Template::set_message(lang('actions_create_success'), 'success');
				redirect(SITE_AREA .'/sarthe/actions');
			}
			else
			{
				Template::set_message(lang('actions_create_failure') . $this->actions_model->error, 'error');
			}
		}
		Assets::add_module_js('actions', 'actions.js');

		Template::set('toolbar_title', lang('actions_create') . ' Actions');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Actions data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('actions_invalid_id'), 'error');
			redirect(SITE_AREA .'/sarthe/actions');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Actions.Sarthe.Edit');

			if ($this->save_actions('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('actions_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'actions');

				Template::set_message(lang('actions_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('actions_edit_failure') . $this->actions_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Actions.Sarthe.Delete');

			if ($this->actions_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('actions_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'actions');

				Template::set_message(lang('actions_delete_success'), 'success');

				redirect(SITE_AREA .'/sarthe/actions');
			} else
			{
				Template::set_message(lang('actions_delete_failure') . $this->actions_model->error, 'error');
			}
		}
		Template::set('actions', $this->actions_model->find($id));
		Assets::add_module_js('actions', 'actions.js');

		Template::set('toolbar_title', lang('actions_edit') . ' Actions');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_actions()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_actions($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('actions_ID_PCET','PCET','max_length[10]');
		$this->form_validation->set_rules('actions_DOMAINES_ACTION_id','Domaines de l action','max_length[10]');
		$this->form_validation->set_rules('actions_COMPETENCE','Competence de la collectivite','max_length[1]');
		$this->form_validation->set_rules('actions_NOM_ACTION','Nom de l action','');
		$this->form_validation->set_rules('actions_OBJECTIFS','Objectifs','');
		$this->form_validation->set_rules('actions_INDICATEUR_SUIVI','Indicateurs de suivi','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('actions_ID_PCET');
		$data['DOMAINES_ACTION_id']        = $this->input->post('actions_DOMAINES_ACTION_id');
		$data['COMPETENCE']        = $this->input->post('actions_COMPETENCE');
		$data['NOM_ACTION']        = $this->input->post('actions_NOM_ACTION');
		$data['OBJECTIFS']        = $this->input->post('actions_OBJECTIFS');
		$data['INDICATEUR_SUIVI']        = $this->input->post('actions_INDICATEUR_SUIVI');

		if ($type == 'insert')
		{
			$id = $this->actions_model->insert($data);

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
			$return = $this->actions_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}