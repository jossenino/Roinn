<?php

class Building extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('building_m');
		//load model address
		$this->load->model('address_m');
	}

	public function index ()
	{
		// Fetch all pages
		$this->data['buildings'] = $this->building_m->get_by(array('idUsers' => $this->session->userdata('idUsers')));		
		$this->data['address'] = $this->address_m->get();
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Edificios', 'admin/building');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		// Load view
		$this->data['subview'] = 'admin/building/index';
		$this->data['NameView'] = 'Edificios';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Edificios', 'admin/building');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		$newCompany = FALSE;
		// Fetch a building or set a new one
		if ($id) {
			$this->data['building'] = $this->building_m->get($id);
			$this->data['address'] = $this->address_m->get($id);
			count($this->data['building']) || $this->data['errors'][] = 'building could not be found';
		}
		else {
			$this->data['building'] = $this->building_m->get_new();
			$this->data['address'] = $this->address_m->get_new();
			$newCompany = TRUE;
		}
		
		// Set up the form
		$rules = $this->building_m->rules;
		$this->form_validation->set_rules($rules);
		// Set up the form address
		$rulesAddress = "";
		if ($newCompany == TRUE) {
			$rulesAddress = $this->address_m->rules;
		}
		else{
			$rulesAddress = $this->address_m->rulesEditBuilding;
		}
		//Set rull from address
		$this->form_validation->set_rules($rulesAddress);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			// get data from post
			$data = $this->address_m->array_from_post(array('country','region','comuna','avCalle','number','block','villaPoblacion','telefono'
			));
			//save data address
			$this->address_m->save($data, $id);
			//return last id address
			$idAddress = $this->db->insert_id();
			if (($idAddress == 0)||($idAddress == '')) {
				$this->db->select('buildings.idDirection');
				$this->db->from('buildings');	
				$this->db->where('buildings.id', $id);
				$idDireccion = $this->db->get()->result_array();
				//log_message('error', 'Direccion '.$idDireccion[0]['idDirection']);
				//log_message('error', 'Direccion '.$this->db->last_query());
				$idAddress = $idDireccion[0]['idDirection'];
			}
			$arrayData = array(
				'name' => $this->input->post('name') ,
				'idUsers' => $this->input->post('idUsers') ,
				 'idDirection' => $idAddress);

			$this->building_m->save($arrayData, $id);
			redirect('admin/building');
		}
		
		//get pais
		$this->load->model('admin/country_m');
		$this->data['countrys'] = $this->country_m->get();

		//get users
		$this->load->model('user_m');
		$this->data['users'] = $this->user_m->get_by(array('idProfile' => 1, 'company' => $this->session->userdata('idCompany')));

		// Load the view
		$this->data['subview'] = 'admin/building/edit';
		$this->load->view('admin/layout_main', $this->data);
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
			$str = 'No posee una dirección asociada';
		}
		echo json_encode(array("access" => $str));
	}

	public function getRegion($id){
		//get estado
		$this->load->model('admin/state_m');
		$state = $this->state_m->get_by(array('idCountry'=>$id));
		$str ="";
		foreach ($state as $region) {
			$str .= "<option value='".$region->id."'> ".$region->state." </option>";
		}
		echo json_encode(array("access" => $str));
	}

	public function getComunas($id){
		//get estado
		$this->load->model('admin/city_m');
		$city = $this->city_m->get_by(array('idState'=>$id));
		$str ="";
		foreach ($city as $comunas) {
			$str .= "<option value='".$comunas->id."'> ".$comunas->city." </option>";
		}
		echo json_encode(array("access" => $str));
	}

}