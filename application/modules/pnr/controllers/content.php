<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('PNR.Content.View');
		$this->load->model('pnr_model', null, true);
		$this->lang->load('pnr');
		
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
					$result = $this->pnr_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pnr_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pnr_delete_failure') . $this->pnr_model->error, 'error');
				}
			}
		}

		$records = $this->pnr_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage PNR');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a PNR object.
	*/
	public function create()
	{
		$this->auth->restrict('PNR.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_pnr())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pnr_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pnr');

				Template::set_message(lang('pnr_create_success'), 'success');
				redirect(SITE_AREA .'/content/pnr');
			}
			else
			{
				Template::set_message(lang('pnr_create_failure') . $this->pnr_model->error, 'error');
			}
		}
		Assets::add_module_js('pnr', 'pnr.js');

		Template::set('toolbar_title', lang('pnr_create') . ' PNR');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of PNR data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pnr_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/pnr');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('PNR.Content.Edit');

			if ($this->save_pnr('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pnr_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pnr');

				Template::set_message(lang('pnr_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('pnr_edit_failure') . $this->pnr_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('PNR.Content.Delete');

			if ($this->pnr_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pnr_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pnr');

				Template::set_message(lang('pnr_delete_success'), 'success');

				redirect(SITE_AREA .'/content/pnr');
			} else
			{
				Template::set_message(lang('pnr_delete_failure') . $this->pnr_model->error, 'error');
			}
		}
		Template::set('pnr', $this->pnr_model->find($id));
		Assets::add_module_js('pnr', 'pnr.js');

		Template::set('toolbar_title', lang('pnr_edit') . ' PNR');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pnr()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pnr($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pnr_id_dpt','Departement','max_length[3]');
		$this->form_validation->set_rules('pnr_id_regional','Identifiant regional','max_length[9]');
		$this->form_validation->set_rules('pnr_nom','Nom','max_length[160]');
		$this->form_validation->set_rules('pnr_surf_sig_l93','Surface calculee','max_length[11]');
		$this->form_validation->set_rules('pnr_url_site','Site web','max_length[160]');
		$this->form_validation->set_rules('pnr_id_type','Id Type','max_length[2]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['id_dpt']        = $this->input->post('pnr_id_dpt');
		$data['id_regional']        = $this->input->post('pnr_id_regional');
		$data['nom']        = $this->input->post('pnr_nom');
		$data['surf_sig_l93']        = $this->input->post('pnr_surf_sig_l93');
		$data['url_site']        = $this->input->post('pnr_url_site');
		$data['id_type']        = $this->input->post('pnr_id_type');

		if ($type == 'insert')
		{
			$id = $this->pnr_model->insert($data);

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
			$return = $this->pnr_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}