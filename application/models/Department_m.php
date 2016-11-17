<?php
class Department_m extends MY_Model
{
	protected $_table_name = 'departments';
	protected $_order_by = 'id';
	public $rules = array(
		'idBuilding' => array(
			'field' => 'idBuilding', 
			'label' => 'Id Edificio', 
			'rules' => 'trim|intval|required'
		),
		'idUsers' => array(
			'field' => 'idUsers', 
			'label' => 'Id Usuario', 
			'rules' => 'trim|required|intval'
		), 
		'letter' => array(
			'field' => 'letter', 
			'label' => 'Letra', 
			'rules' => 'trim|required|max_length[100]'
		), 
		'number' => array(
			'field' => 'number', 
			'label' => 'Numero', 
			'rules' => 'trim|required'
		)
	);

	public $rulesAllDepartment = array(
		'allLetter' => array(
			'field' => 'allLetter', 
			'label' => 'Letra', 
			'rules' => 'trim|required|max_length[100]'
		), 
		'allNumber' => array(
			'field' => 'allNumber', 
			'label' => 'Numero', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$department = new stdClass();
		$department->idBuilding = '';
		$department->idUsers = '';
		$department->letter = '';
		$department->number = 0;
		return $department;
	}

}