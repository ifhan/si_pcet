<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Content extends Admin_Controller {
    
    public function __construct() 
    {
        parent::__construct();
 
        $this->load->model('aide_model');
        $this->lang->load('aide');
 
        Template::set('toolbar_title', 'G&eacute;rer la fiche d\'aide');
        Template::set_block('sub_nav', 'content/sub_nav');
    }
 
    //--------------------------------------------------------------------
 
    public function index() 
    {
	
	$posts = $this->aide_model->where('deleted', 0)->find_all();
 
        Template::set('posts', $posts);
        Template::render();
    }
 
    //--------------------------------------------------------------------

    public function create() 
	{
		if ($this->input->post('submit'))
		{
			if ($this->save_post())
			{
				Template::set_message('You post was successfully saved.', 'success');
				redirect(SITE_AREA .'/content/aide');
			}
		}
	 
		Template::set('toolbar_title', 'Cr&eacute;er une nouvelle fiche d\'aide');
		Template::set_view('content/post_form');
		
		Template::render();
	}
        
        
	//--------------------------------------------------------------------

        private function save_post($type='insert', $id=null) 
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim|strip_tags|xss_clean');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|strip_tags|xss_clean');
		$this->form_validation->set_rules('body', 'Body', 'required|trim|strip_tags|xss_clean');
	 
		if ($this->form_validation->run() === false)
		{
			return false;
		}
	 
		// Compile our post data to make sure nothing
		// else gets through.
		$data = array(
			'title'   => $this->input->post('title'),
			'slug'    => $this->input->post('slug'),
			'body'    => $this->input->post('body')
		);
	 
		if ($type == 'insert')
		{
			$return = $this->aide_model->insert($data);
		}
		else   // Update
		{
			$return = $this->aide_model->update($id, $data);
		}
	 
		return $return;
	}

        
	//--------------------------------------------------------------------
 
        public function edit_post($id=null) 
	{
		if ($this->input->post('submit'))
		{
			if ($this->save_post('update', $id))
			{
				Template::set_message('You post was successfully saved.', 'success');
				redirect(SITE_AREA .'/content/aide');
			}
		}
	 
		Template::set('post', $this->aide_model->find($id));
	 
		Template::set('toolbar_title', 'Edit Post');
		Template::set_view('content/post_form');
		Template::render();
	}
}
 