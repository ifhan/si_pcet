<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class maineetloire extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Avis.Maineetloire.View');
		$this->load->model('avis_model', null, true);
		$this->lang->load('avis');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'maineetloire/_sub_nav');
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
					$result = $this->avis_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('avis_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('avis_delete_failure') . $this->avis_model->error, 'error');
				}
			}
		}

		$records = $this->avis_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Avis');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Avis object.
	*/
	public function create()
	{
		$this->auth->restrict('Avis.Maineetloire.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_avis())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('avis_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'avis');

				Template::set_message(lang('avis_create_success'), 'success');
				redirect(SITE_AREA .'/maineetloire/avis');
			}
			else
			{
				Template::set_message(lang('avis_create_failure') . $this->avis_model->error, 'error');
			}
		}
		Assets::add_module_js('avis', 'avis.js');

		Template::set('toolbar_title', lang('avis_create') . ' Avis');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Avis data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('avis_invalid_id'), 'error');
			redirect(SITE_AREA .'/maineetloire/avis');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Avis.Maineetloire.Edit');

			if ($this->save_avis('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('avis_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'avis');

				Template::set_message(lang('avis_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('avis_edit_failure') . $this->avis_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Avis.Maineetloire.Delete');

			if ($this->avis_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('avis_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'avis');

				Template::set_message(lang('avis_delete_success'), 'success');

				redirect(SITE_AREA .'/maineetloire/avis');
			} else
			{
				Template::set_message(lang('avis_delete_failure') . $this->avis_model->error, 'error');
			}
		}
		Template::set('avis', $this->avis_model->find($id));
		Assets::add_module_js('avis', 'avis.js');

		Template::set('toolbar_title', lang('avis_edit') . ' Avis');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_avis()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_avis($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('avis_ID_PCET','Identifiant du PCET','max_length[10]');
		$this->form_validation->set_rules('avis_DEM_ETAT_AVIS','Date de la sollicitation avis de l Etat','max_length[10]');
		$this->form_validation->set_rules('avis_COM_ETAT_AVIS','Commentaire sur la sollicitation de l avis de l Etat','');
		$this->form_validation->set_rules('avis_REP_ETAT_AVIS','Date du rendu de l avis Etat','max_length[10]');
		$this->form_validation->set_rules('avis_DEM_REG_AVIS','Date de la sollicitation de l avis du Conseil regional','max_length[10]');
		$this->form_validation->set_rules('avis_REP_REG_AVIS','Date du rendu de l avis du Conseil regional','max_length[10]');
		$this->form_validation->set_rules('avis_DEM_USH_AVIS','Date de la sollicitation de l avis de l USH','max_length[10]');
		$this->form_validation->set_rules('avis_REP_USH_AVIS','Date du rendu de l avis de l USH','max_length[10]');
		$this->form_validation->set_rules('avis_DEM_ADEME_AVIS','Date de la sollicitation de l avis de l ADEME','max_length[10]');
		$this->form_validation->set_rules('avis_REP_ADEME_AVIS','Date du rendu de l avis de l ADEME','max_length[10]');
		$this->form_validation->set_rules('avis_PP_AVIS','Points positifs','');
		$this->form_validation->set_rules('avis_PN_AVIS','Points negatifs','');
		$this->form_validation->set_rules('avis_DATE_ADOPT_AVIS','Date d adoption du PCET','max_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('avis_ID_PCET');
		$data['DEM_ETAT_AVIS']        = $this->input->post('avis_DEM_ETAT_AVIS') ? $this->input->post('avis_DEM_ETAT_AVIS') : '0000-00-00';
		$data['COM_ETAT_AVIS']        = $this->input->post('avis_COM_ETAT_AVIS');
		$data['REP_ETAT_AVIS']        = $this->input->post('avis_REP_ETAT_AVIS') ? $this->input->post('avis_REP_ETAT_AVIS') : '0000-00-00';
		$data['DEM_REG_AVIS']        = $this->input->post('avis_DEM_REG_AVIS') ? $this->input->post('avis_DEM_REG_AVIS') : '0000-00-00';
		$data['REP_REG_AVIS']        = $this->input->post('avis_REP_REG_AVIS') ? $this->input->post('avis_REP_REG_AVIS') : '0000-00-00';
		$data['DEM_USH_AVIS']        = $this->input->post('avis_DEM_USH_AVIS') ? $this->input->post('avis_DEM_USH_AVIS') : '0000-00-00';
		$data['REP_USH_AVIS']        = $this->input->post('avis_REP_USH_AVIS') ? $this->input->post('avis_REP_USH_AVIS') : '0000-00-00';
		$data['DEM_ADEME_AVIS']        = $this->input->post('avis_DEM_ADEME_AVIS') ? $this->input->post('avis_DEM_ADEME_AVIS') : '0000-00-00';
		$data['REP_ADEME_AVIS']        = $this->input->post('avis_REP_ADEME_AVIS') ? $this->input->post('avis_REP_ADEME_AVIS') : '0000-00-00';
		$data['PP_AVIS']        = $this->input->post('avis_PP_AVIS');
		$data['PN_AVIS']        = $this->input->post('avis_PN_AVIS');
		$data['DATE_ADOPT_AVIS']        = $this->input->post('avis_DATE_ADOPT_AVIS') ? $this->input->post('avis_DATE_ADOPT_AVIS') : '0000-00-00';

		if ($type == 'insert')
		{
			$id = $this->avis_model->insert($data);

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
			$return = $this->avis_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}