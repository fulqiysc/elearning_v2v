<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
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

	//listing data berita
	public function index()
	{
		
		$history = $this->user_model->history();
		$data = array(
			'title' => 'History Log(' . count($history) . ')',
			'history' => $history,
			'isi' => 'admin/history/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_history($id_user)
	{
		$user = $this->user_model->detail_history($id_user);
		$data = array('id_user'	=> $user['id_user']);
		$this->user_model->delete_history($data);
		$this->session->set_flashdata('sukses', 'Log has been deleted!');
		redirect('admin/history');
	}

}