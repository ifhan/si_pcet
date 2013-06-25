<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mayenne extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Indicateur.Mayenne.View');
		$this->load->model('indicateur_model', null, true);
                $this->load->model('pcet/pcet_model', null, true);
		$this->lang->load('indicateur');
		
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
					$result = $this->indicateur_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('indicateur_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('indicateur_delete_failure') . $this->indicateur_model->error, 'error');
				}
			}
		}

		$records = $this->indicateur_model->find_all();
                $records = $this->indicateur_model->get_indicateur_by_departement('53');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('indicateur_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Indicateur object.
	*/
	public function create()
	{
		$this->auth->restrict('Indicateur.Mayenne.Create');
                $pcets = $this->pcet_model->list_pcet_by_departement('53');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_indicateur())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('indicateur_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'indicateur');

				Template::set_message(lang('indicateur_create_success'), 'success');
				redirect(SITE_AREA .'/mayenne/indicateur');
			}
			else
			{
				Template::set_message(lang('indicateur_create_failure') . $this->indicateur_model->error, 'error');
			}
		}
		Assets::add_module_js('indicateur', 'indicateur.js');
                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('indicateur'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Indicateur data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $pcets = $this->pcet_model->list_pcet_by_departement('53');

		if (empty($id))
		{
			Template::set_message(lang('indicateur_invalid_id'), 'error');
			redirect(SITE_AREA .'/mayenne/indicateur');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Indicateur.Mayenne.Edit');

			if ($this->save_indicateur('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('indicateur_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'indicateur');

				Template::set_message(lang('indicateur_edit_success'), 'success');
                                redirect(SITE_AREA .'/mayenne/indicateur');
			}
			else
			{
				Template::set_message(lang('indicateur_edit_failure') . $this->indicateur_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Indicateur.Mayenne.Delete');

			if ($this->indicateur_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('indicateur_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'indicateur');

				Template::set_message(lang('indicateur_delete_success'), 'success');

				redirect(SITE_AREA .'/mayenne/indicateur');
			} else
			{
				Template::set_message(lang('indicateur_delete_failure') . $this->indicateur_model->error, 'error');
			}
		}
		Template::set('indicateur', $this->indicateur_model->find($id));
		Assets::add_module_js('indicateur', 'indicateur.js');
                Template::set('pcets', $pcets);

		Template::set('toolbar_title', lang('indicateur'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_indicateur()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_indicateur($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('indicateur_ID_PCET','PCET','max_length[10]');
		$this->form_validation->set_rules('indicateur_TABLEAU_DE_BORD','Tableau de bord','max_length[1]');
		$this->form_validation->set_rules('indicateur_NB_TOTAL_INDICATEURS','Nombre total d indicateur','max_length[11]');
		$this->form_validation->set_rules('indicateur_NB_INDICATEURS_QT','Nombre total d indicateurs quantitatifs','max_length[11]');
		$this->form_validation->set_rules('indicateur_NB_INDICATEURS_QL','Nombre total d indicateurs qualitatifs','max_length[11]');
		$this->form_validation->set_rules('indicateur_NB_TOTAL_ACTIONS','Nombre total d actions','max_length[11]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('indicateur_ID_PCET');
		$data['TABLEAU_DE_BORD']        = $this->input->post('indicateur_TABLEAU_DE_BORD');
		$data['NB_TOTAL_INDICATEURS']        = $this->input->post('indicateur_NB_TOTAL_INDICATEURS')? $this->input->post('indicateur_NB_TOTAL_INDICATEURS') : '0';
		$data['NB_INDICATEURS_QT']        = $this->input->post('indicateur_NB_INDICATEURS_QT')? $this->input->post('indicateur_NB_INDICATEURS_QT') : '0';
		$data['NB_INDICATEURS_QL']        = $this->input->post('indicateur_NB_INDICATEURS_QL')? $this->input->post('indicateur_NB_INDICATEURS_QL') : '0';
		$data['NB_TOTAL_ACTIONS']        = $this->input->post('indicateur_NB_TOTAL_ACTIONS')? $this->input->post('indicateur_NB_TOTAL_ACTIONS') : '0';

		if ($type == 'insert')
		{
			$id = $this->indicateur_model->insert($data);

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
			$return = $this->indicateur_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}