<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->model('user_model');

	}

	public function index()
	{
		//jika ada sesion login,tidak bisa akses ke halaman login
		if ($this->session->userdata('nim')) {
			redirect('admin/route');
		}
		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'nim',
			'Nim',
			'required|trim|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s minimal 4 karakter',
				'max_length'	=> '%s maksimal 20 karakter'
			)
		);

	
		


		$valid->set_rules(
			'password',
			'Password',
			'required|trim|min_length[4]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s  minimal 4 karakter'
			)
		);


		if ($valid->run() == FALSE) {
			$data = array('title' => 'Login Page');
			$this->load->view('auth/login', $data);
		} else {
			//validasinya sukses
			$this->_login();
		}
	}/*Penutup Public Login*/

	private function _login()
	{

		$nim 			= $this->input->post('nim');
		$password 		= $this->input->post('password');

		$user = $this->db->get_where('akun', ['nim' => $nim])->row_array();


		//jika usernya ada
		if ($user) {
			//usernya active
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'name'	=> $user['name'],
						'nim' => $user['nim'],
						// 'status_vote' => $user['status_vote'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						$this->load->model(array('vote_model','dashboard_model'));

                        $name = $this->session->userdata('name');
                        $nim = $this->session->userdata('nim');

                        $log=array(
                          'user' => $name.",".$nim,
                          'tanggal_waktu' => date('Y-m-d H:i:s'),
                          'add_log' => 'Login'
                        );
                        $this->dashboard_model->adding_log($log,'log_vote');
						
						redirect('admin/admin');
					} else {
						$this->load->model(array('vote_model','dashboard_model'));
						
                        $name = $this->session->userdata('name');
                        $nim = $this->session->userdata('nim');

                        $log=array(
                          'user' => $name.",".$nim,
                          'tanggal_waktu' => date('Y-m-d H:i:s'),
                          'add_log' => 'Login'
                        );
                        $this->dashboard_model->adding_log($log,'log_vote');
						
						redirect('admin/user');
					}
				} else {

					$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Nim has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">NIM is not registered!</div>');
			redirect('auth');
		}
	}


	

	public function logout()
	{
		$this->load->model(array('vote_model','dashboard_model'));
        $name = $this->session->userdata('name');
        $nim = $this->session->userdata('nim');
        $log=array(
                          'user' => $name.",".$nim,
                          'tanggal_waktu' => date('Y-m-d H:i:s'),
                          'add_log' => 'Logout'
                        );
                        $this->dashboard_model->adding_log($log,'log_vote');
		$this->check_login->logout();
	}


}
