<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class vendee extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Structures.Vendee.View');
		$this->load->model('structures_model', null, true);
		$this->load->model('types/types_model', null, true);
		$this->load->model('communes/communes_model', null, true);
		$this->load->model('departements/departements_model', null, true);
		$this->load->model('epci/epci_model', null, true);
		$this->load->model('pays/pays_model', null, true);
		$this->load->model('pnr/pnr_model', null, true);			
		$this->lang->load('structures');
		
		Template::set_block('sub_nav', 'vendee/_sub_nav');
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
					$result = $this->structures_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('structures_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('structures_delete_failure') . $this->structures_model->error, 'error');
				}
			}
		}

		$records = $this->structures_model->get_structures_by_departement('85');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('structures_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Structures object.
	*/
	public function create()
	{
		$this->auth->restrict('Structures.Vendee.Create');
		$communes = $this->communes_model->get_communes_by_departement('85');
		$departements = $this->departements_model->get_departement_by_insee_departement('85');
		$communautes_agglomeration = $this->epci_model->get_epci_by_departement_by_type("02485",'1');
		$communautes_urbaines = $this->epci_model->get_epci_by_departement_by_type("02485",'2');
		$communautes_communes = $this->epci_model->get_epci_by_departement_by_type("02485",'4');
		$array_pays = $this->pays_model->get_pays_by_departement('85');
		$array_pnr = $this->pnr_model->get_pnr_by_departement('85');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_structures())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('structures_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'structures');

				Template::set_message(lang('structures_create_success'), 'success');
				redirect(SITE_AREA .'/vendee/structures');
			}
			else
			{
				Template::set_message(lang('structures_create_failure') . $this->structures_model->error, 'error');
			}
		}
		Assets::add_module_js('structures', 'structures.js');
		Template::set('communes', $communes);
		Template::set('departements', $departements);
		Template::set('communautes_agglomeration', $communautes_agglomeration);
		Template::set('communautes_urbaines', $communautes_urbaines);
		Template::set('communautes_communes', $communautes_communes);
		Template::set('array_pays', $array_pays);
		Template::set('array_pnr', $array_pnr);
		Template::set('toolbar_title', lang('structures'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Structures data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
		$types = $this->types_model->get_types();
		$communes = $this->communes_model->get_communes_by_departement('85');
		$departements = $this->departements_model->get_departement_by_insee_departement('85');
		$communautes_agglomeration = $this->epci_model->get_epci_by_departement_by_type("02485",'1');
		$communautes_urbaines = $this->epci_model->get_epci_by_departement_by_type("02485",'2');
		$communautes_communes = $this->epci_model->get_epci_by_departement_by_type("02485",'4');
		$array_pays = $this->pays_model->get_pays_by_departement('85');
		$array_pnr = $this->pnr_model->get_pnr_by_departement('85');		

		if (empty($id))
		{
			Template::set_message(lang('structures_invalid_id'), 'error');
			redirect(SITE_AREA .'/vendee/structures');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Structures.Vendee.Edit');

			if ($this->save_structures('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('structures_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'structures');

				Template::set_message(lang('structures_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('structures_edit_failure') . $this->structures_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Structures.Vendee.Delete');

			if ($this->structures_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('structures_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'structures');

				Template::set_message(lang('structures_delete_success'), 'success');

				redirect(SITE_AREA .'/vendee/structures');
			} else
			{
				Template::set_message(lang('structures_delete_failure') . $this->structures_model->error, 'error');
			}
		}
		Template::set('structures', $this->structures_model->find($id));
		Assets::add_module_js('structures', 'structures.js');
		Template::set('communes', $communes);
		Template::set('departements', $departements);
		Template::set('communautes_agglomeration', $communautes_agglomeration);
		Template::set('communautes_urbaines', $communautes_urbaines);
		Template::set('communautes_communes', $communautes_communes);
		Template::set('array_pays', $array_pays);
		Template::set('array_pnr', $array_pnr);
		Template::set('types', $types);
		Template::set('toolbar_title', lang('structures'));
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_structures()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_structures($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('structures_ID_STR','Identifiant de la structure','max_length[10]');
		$this->form_validation->set_rules('structures_TYPE_STRUCTURE_id','Type de structure','max_length[11]');
		$this->form_validation->set_rules('structures_DEPARTEMENT_id','Departement','max_length[2]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_STR']        = $this->input->post('structures_ID_STR');
		$data['TYPE_STRUCTURE_id']        = $this->input->post('structures_TYPE_STRUCTURE_id');
		$data['DEPARTEMENT_id']        = $this->input->post('structures_DEPARTEMENT_id');

		if ($type == 'insert')
		{
			$id = $this->structures_model->insert($data);

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
			$return = $this->structures_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}