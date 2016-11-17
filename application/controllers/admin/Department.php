<?php

class Department extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->data['meta_title'] = 'Afdeling - Departamentos';
		$this->load->model('department_m');
		//Load model buildings
		$this->load->model('building_m');
	}

	public function index ()
	{
		// Fetch all pages
		$this->data['departments'] = $this->department_m->get();	
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Departamentos', 'admin/department');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		//fetch all buildings
		$this->data['buildings'] = $this->building_m->get_by(array('idUsers' => $this->session->userdata('idUsers')));
		// Load view
		$this->data['subview'] = 'admin/department/index';
		$this->data['NameView'] = 'Departamentos';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		//Load breadcrums
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Departamentos', 'admin/department');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();
		// Fetch a profile or set a new one
		if ($id) {
			$this->data['department'] = $this->department_m->get($id);
			count($this->data['department']) || $this->data['errors'][] = 'department could not be found';
		}
		else {
			$this->data['department'] = $this->department_m->get_new();
		}
		
		// Set up the form
		$rules = $this->department_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->department_m->array_from_post(array('idBuilding', 'idUsers', 'letter', 'number'));
			$this->department_m->save($data, $id);
			log_message('info', $this->db->last_query());
			redirect('admin/department');
		}
		
		//get users
		$this->load->model('user_m');
		$this->data['users'] = $this->user_m->get();
		//get buildings
		$this->data['buildings'] = $this->building_m->get_by(array('idUsers' => $this->session->userdata('idUsers')));
		// Load the view
		$this->data['subview'] = 'admin/department/edit';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function createAllDepartment(){
		$this->breadcrumbs->push('Inicio', '/dashboard');
		$this->breadcrumbs->push('Departamentos', 'admin/department');
		$this->data['breadcrumbs'] = $this->breadcrumbs->show();

		// Buildings
		$this->data['buildings'] = $this->building_m->get_by(array('idUsers' => $this->session->userdata('idUsers')));

		// Set up the form
		$rules = $this->department_m->rulesAllDepartment;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$allNumber = $this->input->post('allNumber');
			$allLetter = $this->input->post('allLetter');
			$idEdificio =  $this->input->post('idBuilding');
			$idUser = $this->session->userdata('idUsers');
			if ($this->input->post('tipoDpto') == 1) {
				$allAlphabeticalLetters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
				for ($i=0; $i < $allNumber + 1; $i++) { 
					for ($j=0; $j < $allLetter; $j++) { 
						$arrayData = array(
							'idBuilding' => $idEdificio ,
							'idUsers' =>  $idUser,
							'letter' => $allAlphabeticalLetters[$j] ,
							'number' => $i);
						$this->department_m->save($arrayData, $id);
					}
				}
			}
			else{
				$numerDpto = 0;
				for ($i=1; $i < $allNumber + 1; $i++) { 
					for ($j=1; $j < $allLetter + 1; $j++) { 
						if ($j > 9) {
							$numerDpto = (string)$j ;
						}
						else{
							$numerDpto = "0" . $j;
						}
						$arrayData = array(
							'idBuilding' => $idEdificio ,
							'idUsers' =>  $idUser,
							'letter' => $numerDpto ,
							'number' => $i);
						$this->department_m->save($arrayData, $id);
					}
				}
			}
			redirect('admin/department');
		}

		// Load view
		$this->data['subview'] = 'admin/department/allDepartment';
		$this->data['NameView'] = 'Departamentos';
		$this->load->view('admin/layout_main', $this->data);
	}

	public function owner_popup($id)
	{
		$str = '';
		$this->load->model('user_m');
		$users = $this->user_m->get($id);
		if(count($users)){
			if ($users->typeUser != 0) {
				$owner = $this->user_m->get($users->typeUser);
				$str .= 'El propietario actual del departamento es: <b>'.$owner->userName.'</b> </td></tr>';			
			}
			else{
				$str .= 'El propietario actual del departamento es: <b>'.$users->userName.'</b> </td></tr>';			
			}
		}
		else
		{
			$str = '<h4><label class="label label-danger">No posee propietario este departamento </label> </h4>';
		}
		//$table = $this->data['users'][0]->userName;
		echo json_encode(array("access" => $str));
	}

	public function lessee_popup($id)
	{
		$str = '';
		$this->load->model('user_m');
		$users = $this->user_m->get($id);
		if(count($users)){
			if ($users->typeUser != 0) {				
				$str .= 'El arrendatario actual del departamento es: <b>'.$users->userName.'</b> </td></tr>';
			}
			else{
				$str = 'El arrendatario actual del departamento es: <b>'.$users->userName.'</b> </td></tr>';		
			}
			
		}
		else
		{
			$str = '<h4><label class="label label-danger">No posee arrendatario este departamento </label> </h4>';
		}
		//$table = $this->data['users'][0]->userName;
		echo json_encode(array("access" => $str));
	}

	public function showAsignLessee()
	{
		$str = '';
		$this->load->model('user_m');
		$users = $this->user_m->get();
		if(count($users)){
			$str .= '<div class="form-group"> <label>Minimal</label> <select id="userId" class="form-control select2 " style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Seleccione un arrendatario</option>';
			foreach ($users as $user) {
				$str .='<option id="'.$user->idUsers.'" value="'.$user->idUsers.'">'.$user->userName.'</option>';
			}
			$str .= '</select></div>';			
		}
		else
		{
			$str = '<h4><label class="label label-danger">No posee arrendatario este departamento </label> </h4>';
		}
		//$table = $this->data['users'][0]->userName;
		echo json_encode(array("access" => $str));
	}

	public function assignLesseeSave($idDepartment){
		$idUser=$this->input->post('userId');
		// Update idUsuario in deparment
		$arrayData = array(
			'idUsers' =>  $idUser);
		$this->department_m->save($arrayData, $idDepartment);
		echo json_encode(array("access" => TRUE));
	}

	public function deparmentByBuilding($idBuilding){
		$deparments = $this->department_m->get_by(array('idBuilding' => $idBuilding));
		$str = "";
		$str .= '<table id="allDeparment" class="table table-striped dataTable"> ';
		$str .= '<thead>';
		$str .= '<tr>';
		$str .= '<th>Departamento</th>';
		$str .= '<th> Propietario / Arrendatario </th>';
		$str .= '<th>Opciones</th>';
		$str .= '</tr>';
		$str .= '</thead>';
		$str .= '<tbody>';
		if (count($deparments)) {
			foreach ($deparments as $department) {		 	
				$str .= '<tr>';
				$str .= '<td> '. $department->number . $department->letter . '</td>';
				$str .= '<td>'. btn_js("btn btn-primary fa fa-user","","showOwner(".$department->idUsers.")") .'';
				$str .= ''. btn_js("btn btn-success fa fa-user","","showLessee(".$department->idUsers.")") .' </td> ';
				$str .= '<td>';
				$str .= '' . btn_js("btn btn-warning glyphicon glyphicon-ok","","showAsignLessee(". $department->id.")") .'';
				$str .= ''. btn_delete('admin/department/delete/' . $department->id) .'';
				$str .= '</td>';
				$str .= '</td>';
				$str .= '</tr>';
			}
			$str .= '</tbody>';
			$str .= '</table>';
		}
		else{
			$str = "";
		}
		echo json_encode(array("access" => $str));
	}
}