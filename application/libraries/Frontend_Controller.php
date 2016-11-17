<?php
class Frontend_Controller extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        //load pages
        $this->load->library('session');
        $this->load->model('navBar_m');
        $this->load->model('menu/article_m');
        $this->load->model('page_m');

        
        //fetch navigation
        $this->data['news_archive_link'] = $this->page_m->get_archive_link();
        $this->data['menu'] = $this->navBar_m->get_nested();
    }
}