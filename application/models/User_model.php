<?php
class User_model extends CI_Model
{
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tambah($data)
    {
        $this->db->insert('akun', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('akun', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('akun', $data);
    }

    public function history()
    {
        $this->db->select('*');
        $this->db->from('log_vote');
        $this->db->order_by('id_user','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_history($id_user)
    {
        $this->db->select('*');
        $this->db->from('log_vote');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->row_array();
    }

     public function delete_history($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('log_vote', $data);
    }
}
