<?php

class User_M extends MY_Model{
	protected $_table_name = 'users';
	protected $_primary_key = 'idUsers';
	protected $_order_by = 'userName';
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	public $rules_admin = array(
		'userName' => array(
			'field' => 'userName', 
			'label' => 'User name', 
			'rules' => 'trim|required'
		), 
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		),
	);

	function __construct(){
		parent::__construct();
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'userName' => $user->userName,
				'email' => $user->email,
				'idUsers' => $user->idUsers,
				'loggedin' => TRUE,
				'idProfile' => $user->idProfile,
				'idCompany' => $user->company,
			);
			$this->session->set_userdata($data);
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}
	
	public function get_new(){
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

	/*public function getProfiles_id($email, $password)
	{
		//$profile_id = get_by(array('email' => $this->input->post('email'), 'password' => $this->hash($this->input->post('password'))), TRUE);
		$profile_id = $this->get_by(array('email' => $email, 'password' => $this->hash($password)), TRUE);
		return $profile_id;
	}*/

	public function getProfiles_id()
	{
		$profile_id = get_by(array('email' => $this->input->post('email'), 'password' => $this->hash($this->input->post('password'))), TRUE);
		return $profile_id;
	}

	public function get_no_lessee ()
	{
		// Fetch owner without parents
		$this->db->select('idUsers, userName');
		$this->db->where('typeUser', 0);
		$this->db->where('status', 1);
		$owners = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'Seleccione el propietario del dpto.'
		);
		if (count($owners)) {
			foreach ($owners as $owner) {
				$array[$owner->id] = $owner->userName;
			}
		}
		
		return $array;
	}

	public function get_Address_by_Id($idUsers){
		// Fetch idAddress
		$this->db->select('idAddress');
		$this->db->from('users');
		$this->db->where('idUsers', $idUsers);
		$idAddress = $this->db->get()->result_array();
		$idDireccion = $idAddress[0]['idAddress'];
		return $idDireccion;
	}
}