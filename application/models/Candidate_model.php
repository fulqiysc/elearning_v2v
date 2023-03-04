<?php
class Candidate_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('vote.*, urutan.urutan,
                            akun.name,akun.email');
        $this->db->from('vote');
        // join
        $this->db->join('urutan', 'urutan.id_urutan = vote.id_urutan', 'LEFT');
        $this->db->join('akun', 'akun.id_user =  vote.id_user', 'LEFT');
        $this->db->order_by('id_calon', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function tambah($data)
    {
        $this->db->insert('vote', $data);
    }

     public function edit($data)
    {

        $this->db->where('id_calon', $data['id_calon']);
        $this->db->update('vote', $data);
    }

    public function detail($id_calon)
    {
        $this->db->select('*');
        $this->db->from('vote');
        $this->db->where('id_calon', $id_calon);
        $this->db->order_by('id_calon');
        $query = $this->db->get();
        return $query->row_array();
    }

      public function delete($data)
    {
        $this->db->where('id_calon', $data['id_calon']);
        $this->db->delete('vote', $data);
    }



}