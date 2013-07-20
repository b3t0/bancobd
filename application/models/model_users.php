<?php

class Model_users extends CI_Model{
	

	public function can_log_in (){

		$this->db->where('ncuenta',$this->input->post('ncuenta'));
		$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('users');

		if ($query->num_rows()==1) {
			return true;
		} else {
			return false;
		}
	}

	

	public function add_user(){
		$this->db->where('ncuenta',$this->input->post('ncuenta'));

		$query = $this->db->get('mybankusers');

		if ($query) {
			

			$data = array(
			'ncuenta' => $this->input->post('ncuenta'),
			'user' => $this->input->post('user'),
			'apellido' => $this->input->post('apellido'),
			'direccion' => $this->input->post('direccion'),
			'ciudad' => $this->input->post('ciudad'),
			'telefono' => $this->input->post('telefono'),
			'password'=> md5($this->input->post('password'))
			);

		$did_add_user= $this->db->insert('users',$data);	
			} 
		
			if ($did_add_user) {
				return true;
			} return false;
			
		}
	

        public function info_user (){

		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$query = $this->db->get('users');

		if ($query->num_rows()==1) {
			
			foreach ($query->result() as $dato)
			{
				$data['ncuenta'] = $dato->ncuenta;
				$data['user'] = $dato->user;
				$data['apellido'] = $dato->apellido;
				$data['direccion'] = $dato->direccion;
				$data['ciudad'] = $dato->ciudad;
				$data['telefono'] = $dato->telefono;
			}

			return $data;
		} 
		else {return false;}
	}

	public function actualizar_info(){
		$data = array(
			'direccion' => $this->input->post('direccion'),
			'ciudad' => $this->input->post('ciudad'),
			'telefono' => $this->input->post('telefono'),
			);
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$this->db->update('users', $data); 
	}

	public function consultar (){
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$query= $this->db->get('users');
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$query1 = $this->db->get('saldo');

		if (($query->num_rows()==1) and ($query1->num_rows()==1)) {
			
			foreach ($query->result() as $dato)
			{
				$array['ncuenta'] = $dato->ncuenta;
				$array['user'] = $dato->user;
				$array['apellido'] = $dato->apellido;
			}

			foreach ($query1->result() as $dato)
			{
				$array1['saldo_actual'] = $dato->saldo_actual;
				$array1['ultima_transaccion'] = $dato->ultima_transaccion;
				$array1['valorut'] = $dato->valorut;
			}
			$data= array_merge($array,$array1);
			return $data;	
		} else {
			return false ;
		}
	}

	public function saldo_actual (){
		
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$query = $this->db->get('saldo');

		if ($query->num_rows()==1) {

			foreach ($query->result() as $dato)
			{
				$saldo_actual = $dato->saldo_actual;
				
			}
			return $saldo_actual;	
		} else {
			return false ;
		}
	}	

	public function saldo_actual_cuentad (){
		
		$this->db->where('ncuenta',$this->input->post('cuentad'));
		$query = $this->db->get('saldo');

		if ($query->num_rows()==1) {

			foreach ($query->result() as $dato)
			{
				$saldo_actual = $dato->saldo_actual;
				
			}
			return $saldo_actual;	
		} else {
			return false ;
		}
	}	

	public function saldo_update_recarga ($nuevo_saldo){
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$time = time();

		$data = array(
			'saldo_actual' => $nuevo_saldo,
			'ultima_transaccion' => "Recarga",
			'valorut' => $this->input->post('recarga')
			);
		$data1 = array(
			'ncuenta' => $this->session->userdata('ncuenta'),
			'fecha' => mdate($datestring, $time),
			'tipo_transaccion' => "Recarga"
			);

		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$this->db->update('saldo', $data);
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$did_add_user = $this->db->insert('historial',$data1);	
			
		if ($did_add_user) {
			return true;
			} return false;
		} 
		
		public function actualizar_transferencia ($nuevo_saldo,$saldo_cuentad){
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$time = time();

		$data = array(
			'saldo_actual' => $nuevo_saldo,
			'ultima_transaccion' => "Tranferencia",
			'valorut' => $this->input->post('dinero')
			);
		$data1 = array(
			'ncuenta' => $this->session->userdata('ncuenta'),
			'fecha' => mdate($datestring, $time),
			'tipo_transaccion' => "Transferencia"
			);
		$data2 = array(
			'saldo_actual' => $saldo_cuentad,
			'ultima_transaccion' => "Recibe transferencia",
			'valorut' => $this->input->post('dinero')
			);
		$data3 = array(
			'ncuenta' => $this->input->post('cuentad'),
			'fecha' => mdate($datestring, $time),
			'tipo_transaccion' => "Recibe transferencia"
			);

		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$this->db->update('saldo', $data);
		$this->db->where('ncuenta',$this->input->post('cuentad'));
		$this->db->update('saldo', $data2);
		$did_add_user = $this->db->insert('historial',$data1);	
		$did_add_user2 = $this->db->insert('historial',$data3);

		if ($did_add_user and $did_add_user2) {
			return true;
			} return false;
		} 	

		public function user_clave (){
		
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$query = $this->db->get('users');

		if ($query->num_rows()==1) {

			foreach ($query->result() as $dato)
			{
				$password = $dato->password;
				
			}

			return $password;	
		} else {
			return false ;
		}
	}	

	public function cambiar_clave (){
		$data = array(
			'password' => md5($this->input->post('npassword'))
			);
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$this->db->update('users', $data);
	}

	public function historial(){
		$this->db->where('ncuenta',$this->session->userdata('ncuenta'));
		$consulta = $this->db->get('historial');
		
		if ($consulta->num_rows()>=1) {

			return $consulta;	
		} else {
			return false ;
		}
	}	


}