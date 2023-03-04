<?php
class Urutan_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('urutan');
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id_urutan)
    {
        $this->db->select('*');
        $this->db->from('urutan');
        $this->db->where('id_urutan', $id_urutan);
        $this->db->order_by('id_urutan');
        $query = $this->db->get();
        return $query->row_array();
    }
   
   



    public function tambah($data)
    {
        $this->db->insert('urutan', $data);
    }


    public function edit($data)
    {
        $this->db->where('id_urutan', $data['id_urutan']);
        $this->db->update('urutan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_urutan', $data['id_urutan']);
        $this->db->delete('urutan', $data);
    }
}
