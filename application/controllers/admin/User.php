<?php

class User extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		//load model address
		$this->load->model('address_m');
	}

	public function index ()
	{
		// Fetch all users
		$this->data['users'] = $this->user_m->get();
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Usuarios', 'admin/user');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->data['NameView'] = 'Usuarios';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Usuarios', 'admin/user');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		$company = 0;
		// Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			$idAddressUser = $this->user_m->get_Address_by_Id($id);
			$this->data['address'] = $this->address_m->get($idAddressUser);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->user_m->get_new();
			$this->data['address'] = $this->address_m->get_new();
		}
		
		// Pages for dropdown
		$this->data['user_no_lessee'] = $this->user_m->get_no_lessee();

		// Set up the form
		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);

		// Set up the form address
		$rulesAddress = $this->address_m->rules;
		//Set rull from address
		$this->form_validation->set_rules($rulesAddress);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			// get data from post
			$data = $this->address_m->array_from_post(array(
				'region',
				'comuna',
				'avCalle',
				'number',
				'block',
				'villaPoblacion',
				'telefono'
			));
			//save data address
			$this->address_m->save($data, $id);
			//return last id address
			$idAddress = $this->db->insert_id();
			if (($idAddress == 0)||($idAddress == '')) {
				$this->db->select('users.idAddress');
				$this->db->from('users');	
				$this->db->where('users.idUsers', $id);
				$idDireccion = $this->db->get()->result_array();
				//log_message('error', 'Direccion '.$idDireccion[0]['idDirection']);
				//log_message('error', 'Direccion '.$this->db->last_query());
				$idAddress = $idDireccion[0]['idAddress'];
			}
			if ($this->input->post('typeUser') == 2) {
				$company = $this->input->post('company');
			}
			else{
				$company = 0;
			}
			$data = array(
				'userName' =>  $this->input->post('userName'), 
				'email' => $this->input->post('email'), 
				'password' => $this->user_m->hash($this->input->post('password')), 
				'idProfile' => $this->input->post('profile'), 
				'status' => $this->input->post('status'),
				'typeUser' => $this->input->post('typeUser'),
				'company' => $company,
				'idAddress' => $idAddress );
			$this->user_m->save($data, $id);
			redirect('admin/user');
		}
		
		//get profiles
		$this->load->model('profile_m');
		$this->data['profiles'] = $this->profile_m->get();
		//get compañia
		$this->load->model('menu/company_m');
		$this->data['companys'] = $this->company_m->get();
		//get pais
		$this->load->model('admin/country_m');
		$this->data['countrys'] = $this->country_m->get();
		// Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->user_m->delete($id);
		redirect('admin/user');
	}

	public function login(){
		// Redirect a user if he's already logged in
		$dashboard = 'admin/dashboard';
		if ($this->user_m->loggedin() != FALSE) {
			if ($this->session->userdata('idProfile') == 1) {
					redirect($dashboard);
				}
				else{
					redirect("menu/dashboard");
				}
		}
		// Set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			//we can login
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect('admin/user/login', 'refresh');
			}
		}
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/layout_modal', $this->data);
	}

	public function logout ()
	{
		$this->user_m->logout();
		redirect('admin/user/login');
	}

	public function _unique_email ($str)
	{
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('idUsers !=', $id);
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

	public function address_popup($id){
		$str = '';
		$array = array();
		$i = 0;
		$address = $this->address_m->get_Address($id);
		/*$str .= '<table class="table table-striped"> <tr> <th>Selección</th> <th> Opcion </th> <th> Activo </th> </tr>';*/
		if(count($address)){
			foreach ($address as $direccion) {
				$str .= '<div class="form-group"> <label for="inputRegión" class="col-sm-2 control-label">Región</label>
      		<div class="col-sm-10"><input type="region" class="form-control" id="region" placeholder="Region" value="'.$direccion->estado.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputComuna" class="col-sm-2 control-label">Comuna</label>
      		<div class="col-sm-10"><input type="comuna" class="form-control" id="comuna" placeholder="Comuna" value="'.$direccion->ciudad.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputCalle" class="col-sm-2 control-label">Av /Calle</label>
      		<div class="col-sm-10"><input type="avCalle" class="form-control" id="avCalle" placeholder="avCalle" value="'.$direccion->avCalle.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputnumber" class="col-sm-2 control-label">Número</label>
      		<div class="col-sm-10"><input type="text" class="form-control" id="number" placeholder="number" value="'.$direccion->number.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputblock" class="col-sm-2 control-label">Bloque</label>
      		<div class="col-sm-10"><input type="block" class="form-control" id="block" placeholder="block" value="'.$direccion->block.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputvillaPoblacion" class="col-sm-2 control-label">Villa/Población</label>
      		<div class="col-sm-10"><input type="villaPoblacion" class="form-control" id="villaPoblacion" placeholder="villaPoblacion" value="'.$direccion->villaPoblacion.'" readonly=""></div></div><br />';
			$str .= '<div class="form-group"> <label for="inputtelefono" class="col-sm-2 control-label">Teléfono</label>
      		<div class="col-sm-10"><input type="telefono" class="form-control" id="telefono" placeholder="telefono" value="'.$direccion->telefono.'" readonly=""></div></div>';
			}
		}
		else
		{
			$str = '<h4><label class="label label-danger">No posee una dirección asociada </label> </h4>';
		}
		echo json_encode(array("access" => $str));
	}
}