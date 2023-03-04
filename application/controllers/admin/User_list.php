<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_list extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->check_login->check();
		if ($this->session->userdata('role_id') == 2) {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
			redirect('admin/user');
		}

		$this->load->model('user_model');
	}


	//listing data user
	public function index()
	{

		$user = $this->user_model->listing();
		$data = array(
			'title' => 'Data User Administator(' . count($user) . ')',
			'user' => $user,
			'isi' => 'admin/user/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function registration()
	{
		// if ($this->session->userdata('email')) {
		// 	redirect('admin/route');
		// }
		//validasi first

		$valid = $this->form_validation;

		$valid->set_rules(
			'name',
			'Name',
			'required|trim|is_unique[akun.name]|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('name') .
					'</strong> has been already taken.Try another one!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

			$valid->set_rules(
			'nim',
			'NIM',
			'required|trim|is_unique[akun.nim]|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('nim') .
					'</strong> has been already taken.Try another one!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[akun.email]|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('email') .
					'</strong> has been already taken.Try another one!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

			$valid->set_rules(
			'kelas',
			'Class',
			'required|trim|min_length[4]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s  minimal 4 karakter'
			)
		);

		$valid->set_rules(
			'jurusan',
			'Major',
			'required|trim|min_length[4]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s  minimal 4 karakter'
			)
		);

		$valid->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[password2]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'matches'		=> '%s does not match!',
				'max_length'	=> '%s max 20 characters!'

			)
		);

		$valid->set_rules(
			'password2',
			'Password2',
			'required|trim|matches[password1]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s 20 characters!'
			)
		);



		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('admin/user/tambah', $data);
		} else {
			$email = $this->input->post('email', true);
			$kelas = $this->input->post('kelas', true);
			$jurusan = $this->input->post('jurusan', true);
			$data = [
				'name'		=> htmlspecialchars($this->input->post('name', true)),
				'nim'		=> htmlspecialchars($this->input->post('nim', true)),
				'email'		=> htmlspecialchars($email),
				'kelas'		=> htmlspecialchars($kelas),
				'jurusan'	=> htmlspecialchars($jurusan),
				'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'status_vote'	=> 0,
				'image'		 => 'default.png',
				'role_id'	=> 2,
				'is_active'	=> 1,
				'date_created'	=> date('Y-m-d H:i:s')

			];
	
			
			$this->db->insert('akun', $data);


			
			$this->session->set_flashdata('sukses', 'Your account was succesfully created!');
			redirect('admin/user_list');
		}
	}
	
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'nim',
			'Nim',
			'required|trim|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

		$valid->set_rules(
			'name',
			'Name',
			'required|trim|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s max 20 characters!'
			)
		);


		

		if ($valid->run() ==  FALSE) {

			$data = array(
				'title' => 'Edit User Administator: ' . $user['name'],
				'user'	=> $user,
				'isi' => 'admin/user/edit'
			);

			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_user'	=> $id_user,
				'nim'	=> htmlspecialchars($this->input->post('nim', true)),
				'name'	=> htmlspecialchars($this->input->post('name', true)),
				'email'	=> htmlspecialchars($this->input->post('email', true)),
				// 'image' => 'default.png',
				// 'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'status_vote'	=> $this->input->post('status_vote'),
				'role_id'	=> $this->input->post('role_id'),
				'is_active'	=> $this->input->post('is_active')
			);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data has been updated!');
			redirect(base_url('admin/user_list'), 'refresh');
		}
	}

	public function delete($id_user)
	{

		$user = $this->user_model->detail($id_user);
		//hapus image
		$old_image = $user['image'];
		if ($old_image != 'default.png') {

			unlink(FCPATH . 'assets/image/profile/' . $old_image);
			unlink(FCPATH . 'assets/image/profile/thumbs/' . $old_image);
		}

		$data = array('id_user'	=> $user['id_user']);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data has been deleted!');
		redirect('admin/user_list');
	}
}
