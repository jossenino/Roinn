<?php
class Building_m extends MY_Model
{
	protected $_table_name = 'building';
	protected $_order_by = 'id';
	public $rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nombre', 
			'rules' => 'trim|required|max_length[100]'
		), 
		'idDirection' => array(
			'field' => 'idDirection', 
			'label' => 'Dirección', 
			'rules' => ''
		)
	);

	public function get_new ()
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->body = '';
		$page->parent_id = 0;
		return $page;
	}

}