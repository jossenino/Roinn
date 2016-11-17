<?php
	/**
	* Clientes (Get,Insert, update y delete)
	*/
	class Company extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->data['meta_title'] = 'TMIS - Empresas';
			$this->data['active_navBar'] = 'active';
		}

		public function index ()
		{
			//Load breadcrums
			$this->breadcrumbs->push('Inicio', '/dashboard');
			$this->breadcrumbs->push('Empresas', 'menu/company');
			$this->data['breadcrumbs'] = $this->breadcrumbs->show();
			log_message('info', 'mostrando breadcrumbs');
			//Load model Clientes
			$this->load->model("menu/company_m");
			log_message('info', 'cargado modelo empresas');
			// Fetch all companys
			$this->data['companys'] = $this->company_m->get_companys();
			
			// Load view
			$this->data['subview'] = 'menu/company/index';
			//$this->data['NameView'] = 'Usuarios';
			$this->load->view('admin/layout_main', $this->data);
		}

		public function edit ($id = NULL)
		{
			//variable para saber si el cliente es nuevo
			$newCompany = TRUE;
			//load model company
			$this->load->model('menu/company_m');
			// Fetch a profile or set a new one
			if ($id) {
				$this->data['company'] = $this->company_m->get($id);
				$newCompany = FALSE;
				log_message('info', 'Empresa existe');
				count($this->data['companys']) || $this->data['errors'][] = 'turn could not be found';
			}
			else {
				$this->data['companys'] = $this->company_m->get_new();
				$newCompany = TRUE;
				log_message('info', 'Empresa nueva');
			}
			
			// Set up the form
			$rules = $this->company_m->rules;
			$id || $rules['companys']['rules'] .= '|required';
			$this->form_validation->set_rules($rules);
			
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				if ($newCompany == TRUE) {
					//load usuario
					$data = array(
					'companyName' =>  $this->input->post('companyName'), 
					'typeDocument' => $this->input->post('typeDocument'), 
					'numberDocument' => $this->input->post('numberDocument'), 
					'class' => $this->input->post('class'), 
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'direction' => $this->input->post('direction'),
					'status' => $this->input->post('status'),
					'country' => $this->input->post('country'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'));
					$this->company_m->save($data, $id);
					redirect('menu/company');
				}
				else{
					$data = $this->company_m->array_from_post(array('companyName', 'typeDocument', 'numberDocument', 'class', 'phone', 'email', 'direction', 'status','country','state','city'));
					$this->company_m->save($data, $id);
					redirect('menu/company');
				}
			}
			//get pais
			$this->load->model('admin/country_m');
			$this->data['countrys'] = $this->country_m->get();

			//get estado
			$this->load->model('admin/state_m');
			$this->data['states'] = $this->state_m->get();

			//get ciudad
			$this->load->model('admin/city_m');
			$this->data['citys'] = $this->city_m->get();

			//get users
			$this->load->model('user_m');
			$this->data['users'] = $this->user_m->get();

			// Load the view
			$this->data['subview'] = 'menu/company/edit';
			$this->load->view('admin/layout_main', $this->data);
		}

		public function delete ($id)
		{
			//load model client
			$this->load->model('menu/company_m');
			$this->company_m->delete($id);
			redirect('menu/company');
		}

		public function _unique_client ($str)
		{
			// Do NOT validate if email already exists
			// UNLESS it's the email for the current profile
			
			$id = $this->uri->segment(4);
			$this->db->where('numberDocument', $this->input->post('numberDocument'));
			!$id || $this->db->where('id !=', $id);
			$profile = $this->company_m->get();
			
			if (count($profile)) {
				$this->form_validation->set_message('_unique_client', '%s should be unique');
				return FALSE;
			}
			
			return TRUE;
		}
	}