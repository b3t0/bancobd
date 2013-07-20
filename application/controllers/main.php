<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function index(){
		$this->login();	
	
	}

	public function login (){
		$this->load->view('login');
	}

	public function signup (){
		$this->load->view('signup');
	}

	public function members (){
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('members');
		} else {
			redirect('main/restricted');
		}
		
	}

	public function restricted (){
		$this->load->view('restricted');
	}

	public function login_validation (){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ncuenta','Numero de cuenta','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Clave','required|trim|md5');
	
		if ($this->form_validation->run()) {
			$data = array(

				'ncuenta' => $this->input->post('ncuenta'), 
				'is_logged_in'=>1
				);

			$this->session->set_userdata($data);


			redirect('main/members');
		} else {
			$this->load->view('login');

		}

	}

	public function signup_validation (){
		$this->load->library('form_validation');
		$this->load->model('model_users');

		$this->form_validation->set_rules('ncuenta','Numero de cuenta','required|trim|is_unique[users.ncuenta]');
		$this->form_validation->set_rules('user','Nombre','required|trim');
		$this->form_validation->set_rules('apellido','Apellido','required|trim');
		$this->form_validation->set_rules('direccion','Direccion','required|trim');
		$this->form_validation->set_rules('ciudad','Ciudad','required|trim');
		$this->form_validation->set_rules('telefono','Telefono','required|trim');
		$this->form_validation->set_rules('password','Clave','required|trim');
		$this->form_validation->set_rules('cpassword','Confirme la clave','required|trim|matches[password]');
		$this->form_validation->set_message('is_unique','El numero de cuenta ya existe');


		if ($this->form_validation->run()) {

			if ($this->model_users->add_user()) {
					
					$array = array(
					'ncuenta' => $this->input->post('ncuenta'), 
					'is_logged_in'=>1
					);
				
				echo "Registro exitoso";
				$this->load->view('login');
				} 

			} else {
			
			$this->load->view('signup');
			$this->form_validation->set_message('is_unique','El numero de cuenta ya existe');

		}



	}

	public function validate_credentials (){
		$this->load->model('model_users');

		if ($this->model_users->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials','Numero de cuenta/Clave incorrectos');
			return false;
		}
	}

	public function logout (){
		$this->session->sess_destroy();
		redirect('main/login');
	}

	


}
