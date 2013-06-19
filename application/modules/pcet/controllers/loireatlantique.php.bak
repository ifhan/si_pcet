<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class loireatlantique extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('PCET.Loireatlantique.View');
		$this->load->model('pcet_model', null, true);
		$this->load->model('structures/structures_model', null, true);
		$this->load->model('phases/phases_model', null, true);
		$this->load->model('types/types_model', null, true);
		$this->load->model('communes/communes_model', null, true);
		$this->load->model('departements/departements_model', null, true);
		$this->load->model('epci/epci_model', null, true);
		$this->load->model('pays/pays_model', null, true);
		$this->load->model('pnr/pnr_model', null, true);		
		$this->lang->load('pcet');
		
		Template::set_block('sub_nav', 'loireatlantique/_sub_nav');
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
					$result = $this->pcet_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pcet_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pcet_delete_failure') . $this->pcet_model->error, 'error');
				}
			}
		}
			
		$records = $this->pcet_model->get_pcet_by_departement('44');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('pcet_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a PCET object.
	*/
	public function create()
	{
		$this->auth->restrict('PCET.Loireatlantique.Create');
		$structures = $this->structures_model->list_structures_by_departement('44');
		$phases = $this->phases_model->get_phases();

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_pcet())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pcet_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pcet');

				Template::set_message(lang('pcet_create_success'), 'success');
				redirect(SITE_AREA .'/loireatlantique/pcet');
			}
			else
			{
				Template::set_message(lang('pcet_create_failure') . $this->pcet_model->error, 'error');
			}
		}
		Assets::add_module_js('pcet', 'pcet.js');

		// Pour l'affichage des PCET existants dans une boîte modale
                $records = $this->pcet_model->get_pcet_by_departement('44');

		Template::set('records', $records);
		Template::set('phases', $phases);
		Template::set('structures', $structures);
		Template::set('toolbar_title', lang('pcet'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of PCET data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
		$structures = $this->structures_model->list_structures_by_departement('44');
		$phases = $this->phases_model->get_phases();

		if (empty($id))
		{
			Template::set_message(lang('pcet_invalid_id'), 'error');
			redirect(SITE_AREA .'/loireatlantique/pcet');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('PCET.Loireatlantique.Edit');

			if ($this->save_pcet('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pcet_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pcet');

				Template::set_message(lang('pcet_edit_success'), 'success');
				redirect(SITE_AREA .'/loireatlantique/pcet');
			}
			else
			{
				Template::set_message(lang('pcet_edit_failure') . $this->pcet_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('PCET.Loireatlantique.Delete');

			if ($this->pcet_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pcet_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pcet');

				Template::set_message(lang('pcet_delete_success'), 'success');

				redirect(SITE_AREA .'/loireatlantique/pcet');
			} else
			{
				Template::set_message(lang('pcet_delete_failure') . $this->pcet_model->error, 'error');
			}
		}
		Template::set('pcet', $this->pcet_model->find($id));
		Assets::add_module_js('pcet', 'pcet.js');
		Template::set('structures', $structures);
		Template::set('phases', $phases);
		Template::set('toolbar_title', lang('pcet'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pcet()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pcet($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pcet_STATUT_PCET','Statut','');
		$this->form_validation->set_rules('pcet_ID_PCET','Identifiant du PCET','max_length[10]');
		$this->form_validation->set_rules('pcet_ETAT_PCET','Commentaire sur l etat du PCET','');
		$this->form_validation->set_rules('pcet_INTERNET_PCET','Site web','');
		$this->form_validation->set_rules('pcet_CONTRAT_ADEME_PCET','CONTRAT ADEME PCET','max_length[1]');
		$this->form_validation->set_rules('pcet_TYPE_CONTRAT_ADEME_PCET','TYPE CONTRAT ADEME PCET','max_length[50]');
		$this->form_validation->set_rules('pcet_ID_STR','Type de structure','max_length[10]');
		$this->form_validation->set_rules('pcet_ID_PHASE','Phase','max_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['STATUT_PCET']        = $this->input->post('pcet_STATUT_PCET');
		$data['ID_PCET']        = $this->input->post('pcet_ID_PCET');
		$data['ETAT_PCET']        = $this->input->post('pcet_ETAT_PCET');
		$data['INTERNET_PCET']        = $this->input->post('pcet_INTERNET_PCET');
		$data['CONTRAT_ADEME_PCET']        = $this->input->post('pcet_CONTRAT_ADEME_PCET');
		$data['TYPE_CONTRAT_ADEME_PCET']        = $this->input->post('pcet_TYPE_CONTRAT_ADEME_PCET');
		$data['ID_STR']        = $this->input->post('pcet_ID_STR');
		$data['ID_PHASE']        = $this->input->post('pcet_ID_PHASE');

		if ($type == 'insert')
		{
			$id = $this->pcet_model->insert($data);

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
			$return = $this->pcet_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}