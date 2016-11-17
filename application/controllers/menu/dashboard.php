<?php
class Dashboard extends Frontend_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// Fetch the page template
    	$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(2)), TRUE);
    	$slug = (string) $this->uri->segment(2);
    	log_message('info' , $this->db->last_query());
    	count($this->data['page']) || show_404(current_url());
    	
    	add_meta_title($this->data['page']->title);
    	
    	// Fetch the page data
    	$method = '_' . $this->data['page']->template;
    	if (method_exists($this, $method)) {
    		$this->$method($slug);
    	}
    	else {
    		log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    		show_error('Could not load template ' . $method);
    	}

		$this->data['subview'] = 'dashboard/index';
		$this->data['template'] = $this->data['page']->template;
		$this->data['publishPage'] = $this->page_m->get_by(array('slug' => 'publicaciones'), TRUE);
		$method = '_' . $this->data['page']->template;
		if (method_exists($this, $method)) {
    		$this->$method($slug);
    	}
		$this->data['publishTemplate'] = $this->data['publishPage']->template;
		$this->load->view('main_layout', $this->data);
	}

	private function _page(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
    }
    
    private function _homepage($slug){
    	
    	$this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articles'] = $this->article_m->get_by(array('slug' => $slug));
    	log_message('info' , $this->db->last_query());

    }

    private function _publicaciones($slug){
    	
    	$this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articlesPublish'] = $this->article_m->get_by(array('slug' => $slug));
    	log_message('info' , $this->db->last_query());

    }
    
    private function _news_archive(){
    	
    	$this->data['recent_news'] = $this->article_m->get_recent();
    	
		// Count all articles
		$this->article_m->set_published();
		$count = $this->db->count_all_results('articles');
		
		// Set up pagination
		$perpage = 4;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
		// Fetch articles
		$this->article_m->set_published();
		$this->db->limit($perpage, $offset);
		$this->data['articles'] = $this->article_m->get();
    }
}