<?php
class Vote_model extends CI_Model{


            public function __construct(){
              parent::__construct();
              $this->sesi=$this->session->userdata('nim');
            }

            public function get_akun(){
              $this->db->where('nim',$this->sesi);
              return $this->db->get('akun');
            }

            public function read_vote($data){

                if (isset ($data)){
              $this->db->where('nama_calon',$data);
            }
              return $this->db->get('vote');
            }

            public function add_vote($data,$where){
              $this->db->set('jumlah_vote',$data);
              $this->db->where('nama_calon',$where);
              return $this->db->update('vote');
            }

            public function update_statusvote(){

              $this->db->set('status_vote',1);
              $this->db->where('nim',$this->session->userdata('nim'));
              return $this->db->update('akun');
            }

            public function read_calonwakil($data){
              $this->db->where_in('nama_calon',$data);
              return $this->db->get('vote');
            }

            public function getAll() {
               $this->db->select('vote.*, urutan.urutan,
                            akun.name,akun.email');
              $this->db->from('vote');
                  
            // join
            $this->db->join('urutan', 'urutan.id_urutan = vote.id_urutan', 'LEFT');
            $this->db->join('akun', 'akun.id_user =  vote.id_user', 'LEFT');
              $this->db->order_by('id_calon');
              $query = $this->db->get();
              return $query->result_array();
    
            }

       




}

/* End of file Vote_model.php
 * Location application/models/Vote_model.php
 */
