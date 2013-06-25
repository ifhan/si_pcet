<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aide extends Front_Controller {
 
    public function __construct() 
    { 
        parent::__construct();
 
        $this->load->model('aide_model');
    }
 
    //--------------------------------------------------------------------
 
    public function index() 
    {
        $this->load->helper('typography');
 
        Template::set('posts', $this->aide_model->order_by('created_on', 'asc')->limit(5)->find_all());
 
        Template::render();
    }
 
    //--------------------------------------------------------------------
 
}