<?php
class Employee extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index($id, $slug){
        log_message('info' , 'ENTRANDO a menu/article');
    	// Load the view
        $this->data['subview'] = 'employee/index';
        $this->load->view('main_layout', $this->data);
    }
}