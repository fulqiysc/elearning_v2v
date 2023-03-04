<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->check_login->check();
		$this->load->model('dashboard_model');

		
	}
	public function index()
	{

		//ambil data user berdasarkan data login

		$this->check_login->check();
		$user = $this->db->get_where('akun', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$get_stattrue =$this->dashboard_model->get_totalakun('status_vote',1)->num_rows();
        $get_statfalse =$this->dashboard_model->get_totalakun('status_vote',0)->num_rows();
        $get_stattotal =$this->dashboard_model->get_totalakun(NULL,NULL)->num_rows();
        $get_percent =$this->hitung_keseluruhan($get_stattrue,$get_stattotal);
        $get_vote =$this->dashboard_model->get_totalvote()->result_array();


		$data = array(
			'title' => 'Statistic Page ',
			'isi' => 'admin/statistic/statistic',
			'user' => $user,
			'get_stattrue' => $get_stattrue,
			'get_statfalse' => $get_statfalse,
			'get_stattotal' => $get_stattotal,
			'get_percent' => $get_percent,
			'get_vote' => $get_vote
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	  private function hitung_keseluruhan($jumlah,$total){

            return $jumlah/$total*100;
          }
}
