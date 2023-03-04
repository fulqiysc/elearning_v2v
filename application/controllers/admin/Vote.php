<?php
class Vote extends CI_Controller{


          public function __construct()
          {

            parent::__construct();
            $this->check_login->check();
            $user = $this->db->get_where('akun', ['id_user' => $this->session->userdata('id_user')])->row_array();
            if ($user['status_vote'] == 1) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Sorry, you have been already voted !</div>');
              redirect('admin/user');
            }

              $this->load->model('vote_model');
              

            }
            
          

          public function index(){

            $get_info =$this->vote_model->get_akun()->result_array();
            $user = $this->db->get_where('akun', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $get_all = $this->vote_model->getAll();

            $data = [
                'title'=> 'Voting Page',
                'user' => $user,
                'get_info' => $get_info,
                'get_all' => $get_all
            ];


             // $this->load->view('statis/header',$data);
             $this->load->view('statis/header',$data);
             $this->load->view('vote/vw_vote',$data);
             $this->load->view('statis/footer');

          }
 

          public function vote_now(){

            $ketua = $this->input->post('ketua');
            echo $ketua;
            $cek_dataketua = $this->vote_model->read_vote($ketua)->result();
            foreach ($cek_dataketua as $k) {
              $value_ketua = $k->jumlah_vote;
            }
         
            $tambah_dataketua = ++$value_ketua;
            //or this can be replaced with  $tambah_dataketua = $value_ketua+1;

            $update_dataketua = $this->vote_model->add_vote($tambah_dataketua,$ketua);

            if ($update_dataketua !== FALSE):
              $this->load->model(array('vote_model','dashboard_model'));
              $z=$this->vote_model->get_akun()->result();
              foreach ($z as $value) {
                $name=$value->name;
                $nim=$value->nim;
              };
              $log=array(
                'user' => $name.",".$nim,
                'tanggal_waktu' => date('Y-m-d H:i:s'),
                'add_log' => $ketua
              );
              $this->dashboard_model->adding_log($log,'log_vote');


              $this->vote_model->update_statusvote();
            else:
              echo "<script>alert('Gagal, kesalahan tidak diketahui');window.location.href='".base_url('login')."'</script>";
            endif;

          }
          function ex(){

            $this->load->view('vote/terimakasih');
          }
}

  /* End of file Vote.php
   * Location application/controllers/Vote.php
   */
