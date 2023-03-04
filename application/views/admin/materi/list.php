<div class="row">
  <div class="col-lg-6">

    <?php
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    ?>

  </div>
</div>


<p>
  <a href="<?= base_url('admin/materi/tambah') ?>" title="Add User" class="btn btn-success">
    <i class="fa fa-plus"></i>Add New</a>
</p>



<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Kelas</th>
      <th>Penulis</th>
      <th>Tanggal</th>
      <th width="16%">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($materi as $materi) { ?>



      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $materi['judul_materi']; ?></td>
        <td><?php echo $materi['nama_kelas']; ?></td>
        <td><?php echo $materi['nama']; ?></td>
        <td><?php echo $materi['tanggal_post']; ?></td>
        <td>


          <a href="<?= base_url('admin/materi/edit/') . $materi['id_materi']; ?>" title="Edit Materi" class="btn btn-warning btn-sm">
            <i class="fa fa-edit"></i>Edit</a>
          <?php
          include 'delete.php'
          ?>

        </td>
      </tr>



    <?php $i++;
    } ?>
  </tbody>

</table>