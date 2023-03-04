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