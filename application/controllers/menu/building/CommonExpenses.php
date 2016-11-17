<?php

class CommonExpenses extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('building_m');
        $this->data['meta_title'] = 'Afdeling - Consulta gastos comunes';
    }

    public function index() {
    	// Load the view
    	$this->data['subview'] = 'building/CommonExpenses';
    	$this->load->view('main_layout', $this->data);
    }

}