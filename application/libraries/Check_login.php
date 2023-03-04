<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_login
{
	protected $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function check()
	{

		if (
			$this->CI->session->userdata('nim') == "" &&
			$this->CI->session->userdata('role_id') == ""
		) {
			$this->CI->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You must login!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{

		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('name');
		$this->CI->session->unset_userdata('nim');
		// $this->CI->session->unset_userdata('status_vote');
		$this->CI->session->unset_userdata('role_id');
		$this->CI->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">You have been succesfully logout!</div>');
		redirect('auth');
	}

	public function unset_sv() {
		$this->CI->session->unset_userdata('status_vote');
	}
}
