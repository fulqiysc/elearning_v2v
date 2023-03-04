<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Urutan extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
        $this->check_login->check();
        if ($this->session->userdata('role_id') == 2) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
            redirect('admin/user');
        }


        $this->load->model('urutan_model');
    }
    public function index()
    {

        $urutan = $this->urutan_model->listing();

        //we must validation form first


        $this->form_validation->set_rules(
            'urutan',
            'Urutan Candidate',
            'required|is_unique[urutan.urutan]',

            array(
                'required'    => '%s This fill is requred!',
                'is_unique'    => '%s <strong>' . $this->input->post('urutan') .
                    '</strong>is exist.Try another one!'
            )
        );

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Daftar Urutan  (' . count($urutan) . ')',
                'urutan' => $urutan,
                'isi' => 'admin/no_urut/list'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'urutan' => $this->input->post('urutan'),
                'date_created'  => date('Y-m-d H:i:s')
            ];
            $this->urutan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data was succesfully saved!');
            redirect(base_url('admin/urutan'), 'refresh');
        }
    }



    public function edit($id_urutan)
    {
        $urutan = $this->urutan_model->detail($id_urutan);

        //we must validation form first


        $this->form_validation->set_rules(
            'urutan',
            'Urutan',
            'required',
            array('required'    => '%s harus diisi')
        );

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Edit Urutan',
                'urutan' => $urutan,
                'isi' => 'admin/no_urut/edit'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id_urutan'    => $id_urutan,
                'urutan'        => $i->post('urutan')
            );
            $this->urutan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data was succesfully edited!');
            redirect(base_url('admin/urutan'), 'refresh');
        }
    }

    public function delete($id_urutan)
    {
       
        $urutan = $this->urutan_model->detail($id_urutan);
        $data = array('id_urutan'    => $urutan['id_urutan']);
        $this->urutan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data was succesfully deleted!');
        redirect('admin/urutan');
    }
}
