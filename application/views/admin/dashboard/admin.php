<div class="row">
  <div class="col-lg-6">
     <?= $this->session->flashdata('sukses'); ?>


    <div class="alert font-weight-bold" style="background-color:#07de92; color:white" role="alert">Welcome, Administrator <?= $user['name']; ?> !</div>

    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-lg-4 col-4">
          <img src="<?= base_url('assets/image/profile/') . $user['image']; ?>" class="img-thumbnail" alt="...">
        </div>
        <div class="col-lg-8 col-8">
          <div class="card-body">
            <h5 class="card-title"><?= $user['name']; ?></h5>
            <p class="card-text"><?= $user['nim']; ?></p>
            <p class="card-text"><small class="text-muted">Created on <?= date('d F Y,H:i T', strtotime($user['date_created'])); ?></small></p>

          </div>
        </div>
      </div>
    </div>



  </div>
</div>