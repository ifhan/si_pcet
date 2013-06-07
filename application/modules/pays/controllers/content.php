<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Pays.Content.View');
		$this->load->model('pays_model', null, true);
		$this->lang->load('pays');
		
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
					$result = $this->pays_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pays_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pays_delete_failure') . $this->pays_model->error, 'error');
				}
			}
		}

		$records = $this->pays_model->order_by('insee_dep', 'asc')->order_by('id_pays', 'asc')->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Pays');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Pays object.
	*/
	public function create()
	{
		$this->auth->restrict('Pays.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_pays())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pays_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pays');

				Template::set_message(lang('pays_create_success'), 'success');
				redirect(SITE_AREA .'/content/pays');
			}
			else
			{
				Template::set_message(lang('pays_create_failure') . $this->pays_model->error, 'error');
			}
		}
		Assets::add_module_js('pays', 'pays.js');

		Template::set('toolbar_title', lang('pays_create') . ' Pays');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Pays data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pays_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/pays');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Pays.Content.Edit');

			if ($this->save_pays('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pays_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pays');

				Template::set_message(lang('pays_edit_success'), 'success');
				redirect(SITE_AREA .'/content/pays');
			}
			else
			{
				Template::set_message(lang('pays_edit_failure') . $this->pays_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Pays.Content.Delete');

			if ($this->pays_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pays_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pays');

				Template::set_message(lang('pays_delete_success'), 'success');

				redirect(SITE_AREA .'/content/pays');
			} else
			{
				Template::set_message(lang('pays_delete_failure') . $this->pays_model->error, 'error');
			}
		}
		Template::set('pays', $this->pays_model->find($id));
		Assets::add_module_js('pays', 'pays.js');

		Template::set('toolbar_title', lang('pays_edit') . ' Pays');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pays()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pays($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pays_id_pays','Identifiant du pays','max_length[4]');
		$this->form_validation->set_rules('pays_superficie','Superficie','max_length[11]');
		$this->form_validation->set_rules('pays_statut','Statut','max_length[100]');
		$this->form_validation->set_rules('pays_insee_dep','Departement','max_length[10]');
		$this->form_validation->set_rules('pays_nom','Nom','max_length[70]');
		$this->form_validation->set_rules('pays_population','Population','max_length[11]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['id_pays']        = $this->input->post('pays_id_pays');
		$data['superficie']        = $this->input->post('pays_superficie');
		$data['statut']        = $this->input->post('pays_statut');
		$data['insee_dep']        = $this->input->post('pays_insee_dep');
		$data['nom']        = $this->input->post('pays_nom');
		$data['population']        = $this->input->post('pays_population');

		if ($type == 'insert')
		{
			$id = $this->pays_model->insert($data);

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
			$return = $this->pays_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}