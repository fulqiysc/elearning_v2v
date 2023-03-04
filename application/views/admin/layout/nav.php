<?php

$user = $this->db->get_where('akun', ['id_user' => $this->session->userdata('id_user')])->row_array();

$get_info =$this->vote_model->get_akun()->result_array();
$get_all = $this->vote_model->getAll();


$get_vote =$this->dashboard_model->get_totalvote()->result_array();



?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/route'); ?>" class="brand-link">
    <img src="<?= base_url('assets/image/voteone.png'); ?>" alt="Amikom Purwokerto" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">IKHZA E-Voting</span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/image/profile/thumbs/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('admin/route'); ?>" class="d-block"><?= $user['name']; ?></a>
      </div>

    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2 ">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/route'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>

          </ul>
        </li>




        <!-- Voting -->
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-vote-yea"></i>
              <p>
                Voting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/vote'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vote</p>
                </a>
              </li>

            </ul>
          </li>
          <!-- End Voting -->
 


        <!-- Start Statistik -->
         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Statistic
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/statistic'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>See Statistic</p>
              </a>
            </li>

          </ul>
        </li>

        <!-- End Statistik -->



        <?php if ($this->session->userdata('role_id') != 2) { ?>
          <!-- Start Classs -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-users"></i>
              <p>
                Candidate
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                <a href="<?= base_url('admin/candidate'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Candidate</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/urutan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Queue</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/candidate/tambah'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Candidate</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- End Class -->
        <?php } ?>



        <!-- Start Edit Profile -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Edit Profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/profile'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit Profile</p>
              </a>
            </li>

          </ul>
        </li>
        <!-- Edit Profile -->


        <!-- Start Change Password -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/profile/changepassword'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>

          </ul>
        </li>
        <!-- End Change Password -->


       

        <?php if ($this->session->userdata('role_id') == 1) { ?>
          <!-- Menu Administrator Hanya Admin yang bisa akses page ini-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                User Administrator
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?= base_url('admin/user_list'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Administrator</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?= base_url('admin/history'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>




            </ul>
          </li>
          <!-- End Menu Administrator -->
        <?php } ?>




        <!-- Menu Logout Admin -->
        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="far fas fa-sign-out-alt  nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
        <!--  End Menu Logout Admin -->




      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <p class="card-title font-weight-bold"><?= $title; ?></p>
          </div>
          <!-- /.card-header -->
          <div class="card-body">