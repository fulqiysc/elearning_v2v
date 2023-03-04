<?php
class Profile_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('akun.*');
        $this->db->from('akun');
        // join
        $this->db->order_by('id_user', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

   
     public function edit($data)
    {

        $this->db->where('id_user', $data['id_user']);
        $this->db->update('akun', $data);
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

   



}