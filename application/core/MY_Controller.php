<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller
{
    //set the class variable.
    public $template = array();
    public $data = array();

    public function __construct()
    {
        parent::__construct();
    }

    //Load layout
    public function layout()
    {
        $left_menu_array = array();
        $data = array();
        $left_menu_array = array_merge($this->data, $data);
        $middle_array = array_merge($this->data, $data);

        $this->template['index_header'] = $this->load->view('layout/index_header', $this->data, true);
        $this->template['index_top_menu'] = $this->load->view('layout/index_top_menu', $this->data, true);
        $this->template['index_left_menu'] = $this->load->view('layout/index_left_menu', $left_menu_array, true);
        $this->template['middle'] = $this->load->view($this->middle, $middle_array, true);
        $this->load->view('layout/index', $this->template);
    }
}