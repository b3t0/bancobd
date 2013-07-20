<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index (){
		
		$this->load->view('restricted');
	}

	public function consulta_saldo (){
		
		$this->load->model('model_users');
		$data=$this->model_users->consultar();
		$this->load->view('consulta',$data);
	}

	public function transferencias (){

		$this->load->view('transferencias');
	}

	public function recarga (){
		$this->load->view('recargas');
	}

	public function out_of_order(){
		$this->load->view('out_of_order');
	}

	public function user_info (){
		$this->load->model('model_users');
		$data = $this->model_users->info_user();
		$this->load->view('user_info',$data);
	}

	public function editar (){
		$this->load->model('model_users');
		$data = $this->model_users->info_user();
		$this->load->view('editar',$data);
	}

	public function historial_view (){
		$this->load->model('model_users');
		$consulta = $this->model_users->historial();
		$this->load->view('historial',$consulta);
	}

	public function fail (){
		$this->load->view('fail');
	}

	public function success (){
		$this->load->view('success');
	}

	public function actualizar (){
		$this->load->library('form_validation');
		$this->load->model('model_users');
		
		$this->form_validation->set_rules('direccion','Direccion','required|trim');
		$this->form_validation->set_rules('ciudad','Ciudad','required|trim');
		$this->form_validation->set_rules('telefono','Telefono','required|trim');

		if ($this->form_validation->run()) {

			$this->model_users->actualizar_info();
			redirect('principal/user_info');
		} else {
			redirect('principal/fail');}

	}

	public function realizar_recarga (){
		$this->load->library('form_validation');
		$this->load->model('model_users');
		$recarga = $this->input->post('recarga');
		$this->form_validation->set_rules('recarga','Cantidad a recargar','numeric|integer|required|trim');
		$this->form_validation->set_rules('celular','Numero de celular','required|trim');

		if ($this->form_validation->run()) {

			if ($recarga <= 50000) {
				
				$saldo_actual = $this->model_users->saldo_actual();
				$nuevo_saldo = $saldo_actual - $recarga;
            	
            	if ($this->model_users->saldo_update_recarga($nuevo_saldo)) {
            	    	redirect('principal/success');
            	    } else {
            	    	redirect('principal/fail');}
            	}
			} else {
			redirect('principal/fail');
			}
		}

		public function realizar_transferencia (){
		$this->load->library('form_validation');
		$this->load->model('model_users');
		$dinero = $this->input->post('dinero');
		$cuentad = $this->input->post('cuentad');
		$this->form_validation->set_rules('dinero','Cantidad a transferir','numeric|integer|required|trim');
		$this->form_validation->set_rules('cuentad','Cuenta destino','required|trim');

		if ($this->form_validation->run()) {

			if (($saldo_actual = $this->model_users->saldo_actual()) and 
				($saldo_cuenta_destino = $this->model_users->saldo_actual_cuentad())){

			if ($dinero <= $saldo_actual) {
				
				$nuevo_saldo = $saldo_actual - $dinero;
            	$saldo_cuentad = $saldo_cuenta_destino + $dinero;

            	if ($this->model_users->actualizar_transferencia($nuevo_saldo,$saldo_cuentad)) {
            	    	redirect('principal/success');
            	    } else {
            	    	redirect('principal/fail');}
            	}
            }
			} else {
			redirect('principal/fail');
			}
		}



}