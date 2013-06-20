<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sarthe extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Engagement.Sarthe.View');
		$this->load->model('engagement_model', null, true);
                $this->load->model('pcet/pcet_model', null, true);
		$this->lang->load('engagement');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
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
					$result = $this->engagement_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('engagement_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('engagement_delete_failure') . $this->engagement_model->error, 'error');
				}
			}
		}

		$records = $this->engagement_model->get_engagement_by_departement('72');

		Template::set('records', $records);
		Template::set('toolbar_title', lang('engagement_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Engagement object.
	*/
	public function create()
	{
		$this->auth->restrict('Engagement.Sarthe.Create');
                $pcets = $this->pcet_model->list_pcet_by_departement('72');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_engagement())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('engagement_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'engagement');

				Template::set_message(lang('engagement_create_success'), 'success');
				redirect(SITE_AREA .'/sarthe/engagement');
			}
			else
			{
				Template::set_message(lang('engagement_create_failure') . $this->engagement_model->error, 'error');
			}
		}
		Assets::add_module_js('engagement', 'engagement.js');
                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('engagement_create') . ' Engagement');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Engagement data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);
                $pcets = $this->pcet_model->list_pcet_by_departement('72');

		if (empty($id))
		{
			Template::set_message(lang('engagement_invalid_id'), 'error');
			redirect(SITE_AREA .'/sarthe/engagement');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Engagement.Sarthe.Edit');

			if ($this->save_engagement('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('engagement_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'engagement');

				Template::set_message(lang('engagement_edit_success'), 'success');
                                redirect(SITE_AREA .'/mayenne/engagement');
			}
			else
			{
				Template::set_message(lang('engagement_edit_failure') . $this->engagement_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Engagement.Sarthe.Delete');

			if ($this->engagement_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('engagement_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'engagement');

				Template::set_message(lang('engagement_delete_success'), 'success');

				redirect(SITE_AREA .'/sarthe/engagement');
			} else
			{
				Template::set_message(lang('engagement_delete_failure') . $this->engagement_model->error, 'error');
			}
		}
		Template::set('engagement', $this->engagement_model->find($id));
		Assets::add_module_js('engagement', 'engagement.js');
                Template::set('pcets', $pcets);
		Template::set('toolbar_title', lang('engagement_edit') . ' Engagement');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_engagement()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_engagement($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('engagement_ID_PCET','Identifiant du PCET','max_length[10]');
                $this->form_validation->set_rules('engagement_COMMENT_DDT','Implication de la DDT','');                
		$this->form_validation->set_rules('engagement_DATE_DELIB','Date de deliberation','max_length[10]');
		$this->form_validation->set_rules('engagement_NOTIF_DELIB_ETAT','Date du courrier de la structure notifiant sa deliberation a l Etat','max_length[10]');
		$this->form_validation->set_rules('engagement_NOTIF_DELIB_CR','Date du courrier de la structure notifiant sa deliberation au Conseil regional','max_length[10]');
		$this->form_validation->set_rules('engagement_NOTIF_USH','Date courrier de notification d engagement de la collectivite a l USH','max_length[10]');
		$this->form_validation->set_rules('engagement_REP_USH','Consultation aval USH souhaitee','max_length[10]');
		$this->form_validation->set_rules('engagement_DATE_REP_USH','Date du courrier de reponse de l USH','max_length[10]');
		$this->form_validation->set_rules('engagement_DATE_PAC','Date du Porter-a-connaissance de l Etat','max_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['ID_PCET']        = $this->input->post('engagement_ID_PCET');
                $data['COMMENT_DDT']        = $this->input->post('engagement_COMMENT_DDT');                
		$data['DATE_DELIB']        = $this->input->post('engagement_DATE_DELIB') ? $this->input->post('engagement_DATE_DELIB') : '0000-00-00';
		$data['NOTIF_DELIB_ETAT']        = $this->input->post('engagement_NOTIF_DELIB_ETAT') ? $this->input->post('engagement_NOTIF_DELIB_ETAT') : '0000-00-00';
		$data['NOTIF_DELIB_CR']        = $this->input->post('engagement_NOTIF_DELIB_CR') ? $this->input->post('engagement_NOTIF_DELIB_CR') : '0000-00-00';
		$data['NOTIF_USH']        = $this->input->post('engagement_NOTIF_USH') ? $this->input->post('engagement_NOTIF_USH') : '0000-00-00';
		$data['REP_USH']        = $this->input->post('engagement_REP_USH');
		$data['DATE_REP_USH']        = $this->input->post('engagement_DATE_REP_USH') ? $this->input->post('engagement_DATE_REP_USH') : '0000-00-00';
		$data['DATE_PAC']        = $this->input->post('engagement_DATE_PAC') ? $this->input->post('engagement_DATE_PAC') : '0000-00-00';

		if ($type == 'insert')
		{
			$id = $this->engagement_model->insert($data);

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
			$return = $this->engagement_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}