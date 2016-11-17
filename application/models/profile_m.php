<?php

class Profile_M extends MY_Model{
	protected $_table_name = 'profiles';
	protected $_primary_key = 'idProfile';
	protected $_order_by = 'profile';
	public $rules = array(
		'profile' => array(
			'field' => 'profile', 
			'label' => 'Profile', 
			'rules' => 'trim|required|alpha'
		), 
		'description' => array(
			'field' => 'description', 
			'label' => 'Description', 
			'rules' => 'trim|required|alpha'
		)
	);

	function __construct(){
		parent::__construct();
	}
	
	public function get_new(){
		$profile = new stdClass();
		$profile->profile = '';
		$profile->description = '';
		return $profile;
	}

	public function delete ($id)
	{
		// Delete a page
		parent::delete($id);
	}
}