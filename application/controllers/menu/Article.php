<?php
class Article extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->data['recent_news'] = $this->article_m->get_recent();
    }

    public function index($id, $slug){
        log_message('info' , 'ENTRANDO a menu/article');
    	// Fetch the article
		$this->article_m->set_published();
		$this->data['article'] = $this->article_m->get($id);
    	// Return 404 if not found
    	count($this->data['article']) || show_404(uri_string());
		
    	// Redirect if slug was incorrect
    	$requested_slug = $this->uri->segment(4);
        log_message('info' , 'SEGMENTO 4 ' . $requested_slug);
    	$set_slug = $this->data['article']->slug;
    	if ($requested_slug != $set_slug) {
    		redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
    	}
    	
    	// Load view
    	add_meta_title($this->data['article']->title);
    	$this->data['subview'] = 'article';
    	$this->load->view('main_layout', $this->data);
    }

    public function blog(){
        $this->data['subview'] = 'blog';
        $this->load->view('main_layout', $this->data);
    }
}