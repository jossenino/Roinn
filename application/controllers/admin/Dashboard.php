<?php
class Dashboard extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('menu/article_m');
	}

	public function index(){
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('admin/layout_main', $this->data);
	}
}