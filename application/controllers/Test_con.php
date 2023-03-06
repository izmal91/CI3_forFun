<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_con extends MY_Controller 
{
    
    public function index()
    {
        $data = array();

        $this->data = $data;
        $this->middle = 'test_view_with_template';
        $this->layout();
    }


}
