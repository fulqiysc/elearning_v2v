<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->check_login->check();
		 if ($this->session->userdata('role_id') == 2) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
            redirect('admin/user');
        }


		$this->load->model('candidate_model');
		$this->load->model('urutan_model');
	}

	//listing data berita
	public function index()
	{
		
		$candidate = $this->candidate_model->listing();
		$data = array(
			'title' => 'Data Candidate(' . count($candidate) . ')',
			'candidate' => $candidate,
			'isi' => 'admin/candidate/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}



	public function tambah()
	{
		if ($this->session->userdata('role_id') == 2) {
			$this->session->set_flashdata('sukses', 'You dont have any privilages to accsess this page!');
			redirect('admin/user');
		}
		$urutan = $this->urutan_model->listing();
		//validasi
		$valid = $this->form_validation;

		


		
			$valid->set_rules(
			'id_urutan',
			'ID',
			'required|trim|is_unique[vote.id_urutan]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('id_urutan') .
					'</strong> has been already taken.Try another one!'
			)
		);

		$valid->set_rules(
			'nama_calon',
			'Nama calon',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'desc_calon',
			'Desc',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			$config['upload_path']          = './assets/image/candidate/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5024;
			$config['max_width']            = '';
			$config['max_height']           = '';
			$config['remove_spaces']        = TRUE;
			$config['file_name'] 			= time() . '-' . $_FILES['foto_calon']['name'];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_calon')) {

				$data = array(
					'title' => 'Add Candidate ',
					'urutan' => $urutan,
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/candidate/tambah'
				);

				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
			$upload_data 				= array('uploads' => $this->upload->data());
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/image/candidate/' . $upload_data['uploads']['file_name'];
			$config['new_image']		= './assets/image/candidate/thumbs/' . $upload_data['uploads']['file_name'];
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width']         	= 600;
				$config['height']       	= 400;
				$config['rotation_angle'] 	= 'hor';	
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				$i = $this->input;

				$data = [
					'id_user'		=> $this->session->userdata('id_user'),
					'id_urutan'	    => $i->post('id_urutan'),
					// 'no_urut' 		=> $i->post('no_urut'),
					'nama_calon'	=> $i->post('nama_calon'),
					'desc_calon'	=> $i->post('desc_calon'),
					'foto_calon'	=> $upload_data['uploads']['file_name'],
					'jumlah_vote'	=> 0,
					'date_created'	=> date('Y-m-d H:i:s')

				];
				$this->candidate_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data was successfully saved!');
				redirect(base_url('admin/candidate'), 'refresh');
				/*This is the end of tambah $data variabel hh  */
			}
		}
		//masuk database
		$data = array(
			'title' => 'Add Candidate ',
			'urutan' => $urutan,
			'isi' => 'admin/candidate/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_calon)
	{
		$candidate = $this->candidate_model->detail($id_calon);
		$urutan = $this->urutan_model->listing();
		//validasi
		$valid = $this->form_validation;


		$valid->set_rules(
			'nama_calon',
			'Nama calon',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'desc_calon',
			'Desc',
			'required',
			array('required'		=> '%s harus diisi')
		);

			$valid->set_rules(
			'jumlah_vote',
			'Jumlah Vote',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			//jika tidak kosong maka akan di proses
			if (!empty($_FILES['foto_calon']['name'])) {
				$config['upload_path']          = './assets/image/candidate/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 5024;
				$config['remove_spaces']        = TRUE;
				$config['file_name'] 			= time() . '-' . $_FILES['foto_calon']['name'];
				// $config['max_width']            = 2024;
				// $config['max_height']           = 2068;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto_calon')) {
					$data = array(
						'title' => 'Edit Candidate ',
						'urutan' => $urutan,
						'candidate'	=> $candidate,
						'error_upload' => $this->upload->display_errors(),
						'isi' => 'admin/candidate/edit'
					);


					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {

					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/image/candidate/' . $upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/image/candidate/thumbs/' . $upload_data['uploads']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 600;
					$config['height']       	= 400;
					$config['rotation_angle'] 	= 'hor';
					$config['quality']			= '90%';
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$i = $this->input;
					//hapus gambar lama jika ada gambar baru
					if ($candidate['foto_calon'] != "") {
						unlink('./assets/image/candidate/' . $candidate['foto_calon']);
						unlink('./assets/image/candidate/thumbs/' . $candidate['foto_calon']);
					}


					$data = array(
						'id_calon'		=> $id_calon,
						'id_user '		=> $this->session->userdata('id_user'),
						'id_urutan'		=> $i->post('id_urutan'),
						'nama_calon' 	=> $i->post('nama_calon'),
						'desc_calon'	=> $i->post('desc_calon'),
						'foto_calon'		=> $upload_data['uploads']['file_name'],
						'jumlah_vote'	=> $i->post('jumlah_vote')
					);
					$this->candidate_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data has been Edited!');
					redirect(base_url('admin/candidate'), 'refresh');
				}
			} else {


				$i = $this->input;

				$data = array(
					'id_calon'		=> $id_calon,
						'id_user '		=> $this->session->userdata('id_user'),
						'id_urutan'		=> $i->post('id_urutan'),
						'nama_calon' 	=> $i->post('nama_calon'),
						'desc_calon'	=> $i->post('desc_calon'),
						// 'foto_calon'		=> $upload_data['uploads']['file_name'],
						'jumlah_vote'	=> $i->post('jumlah_vote')

				);
				$this->candidate_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data was successfully edited!');
				redirect(base_url('admin/candidate'), 'refresh');
			}
		}
		//  	
		//masuk database
		$data = array(
			'title' => 'Edit Candidate',
			'urutan' => $urutan,
			'candidate'	=> $candidate,
			'isi' => 'admin/candidate/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}




	public function delete($id_calon)
	{

		$user = $this->candidate_model->detail($id_calon);
		//hapus image
		$old_image = $user['foto_calon'];
		if ($old_image != 'default.png') {

			unlink(FCPATH . 'assets/image/candidate/' . $old_image);
			unlink(FCPATH . 'assets/image/candidate/thumbs/' . $old_image);
		}

		$data = array('id_calon'	=> $user['id_calon']);
		$this->candidate_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data has been deleted!');
		redirect('admin/candidate');
	}


}