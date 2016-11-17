<?php
class Building_m extends MY_Model
{
	protected $_table_name = 'buildings';
	protected $_order_by = 'id';
	public $rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nombre', 
			'rules' => 'trim|required|max_length[100]'
		)
	);

	public function get_new ()
	{
		$building = new stdClass();
		$building->name = '';
		return $building;
	}

	public function get_no_buildings ()
	{
		// Fetch owner without parents
		$this->db->select('id, name');
		$owners = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'Seleccione un edificio'
		);
		if (count($owners)) {
			foreach ($owners as $owner) {
				$array[$owner->id] = $owner->name;
			}
		}
		
		return $array;
	}

}