<?php

class Address_m extends MY_Model{
	protected $_table_name = 'address';
	protected $_primary_key = 'id';
	protected $_order_by = 'id';
	
	public $rules = array(
		'country' => array(
			'field' => 'country', 
			'label' => 'País', 
			'rules' => 'trim|required|max_length[150]'
		),
		'region' => array(
			'field' => 'region', 
			'label' => 'Región', 
			'rules' => 'trim|required|max_length[150]'
		), 
		'comuna' => array(
			'field' => 'comuna', 
			'label' => 'Comuna', 
			'rules' => 'trim|required|max_length[150]'
		),
		'avCalle' => array(
			'field' => 'avCalle', 
			'label' => 'Av Calle', 
			'rules' => 'trim|required|max_length[150]'
		),
		'number' => array(
			'field' => 'number', 
			'label' => 'Number', 
			'rules' => 'required|intval'
		),
		'block' => array(
			'field' => 'block', 
			'label' => 'Bloque', 
			'rules' => 'trim|required|max_length[150]'
		),
		'villaPoblacion' => array(
			'field' => 'villaPoblacion', 
			'label' => 'VillaPoblacion', 
			'rules' => 'trim|required|max_length[150]'
		),
		'telefono' => array(
			'field' => 'telefono', 
			'label' => 'Telefono', 
			'rules' => 'trim|required|intval'
		)
	);

	public $rulesEditBuilding = array(
		'idUsers' => array(
			'field' => 'idUsers', 
			'label' => 'Usuario', 
			'rules' => 'trim|required|max_length[150]'
		)
	);

	function __construct(){
		parent::__construct();
	}
	
	public function get_new(){
		$address = new stdClass();
		$address->region = '';
		$address->comuna = '';
		$address->avCalle = '';
		$address->number = '';
		$address->profile = '';
		$address->block = '';
		$address->villaPoblacion = '';
		$address->telefono = '';
		return $address;
	}

	public function delete ($id)
	{
		// Delete a address
		parent::delete($id);
	}

	public function get_id_by_building ()
	{
		// Fetch owner without parents
		$this->db->select('buildings.idDirection');
		$this->db->from('buildings');	
		$this->db->where('buildings.id', $id);
		$owners = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($owners)) {
			foreach ($owners as $owner) {
				$array[$owner->id] = $owner->userName;
			}
		}
		
		return $array;
	}

	public function get_Address($id)
		{
			$this->db->select('address.*,`p`.state as estado, `c`.city as ciudad, `country`.`country` as pais');
			$this->db->from('address');
			$this->db->join('country', 'country.id = address.country', 'inner');
			$this->db->join('state p','p.id = address.region', 'inner');
			$this->db->join('city c','c.id = address.comuna', 'inner');
			$this->db->where('address.id', $id);
			$address = $this->db->get()->result();
			log_message('info', $this->db->last_query());
			return $address;
		}
}