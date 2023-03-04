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
  <a href="<?= base_url('admin/candidate/tambah') ?>" title="Add User" class="btn btn-success">
    <i class="fa fa-plus"></i>Add New</a>
</p>




<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Image</th>
       <th>No Urut</th>
      <th>Nama</th>
      <th>Jumlah Vote</th>
       <th>Date</th>
      <th width="18%">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($candidate as $candidate) { ?>



      <tr>
        <td><?php echo $i ?></td>
    <td><img src="<?= base_url('assets/image/candidate/thumbs/') . $candidate['foto_calon']; ?>" width="60" class="img img-thumbnail"></td>
       <td><?php echo $candidate['urutan']; ?></td>
        <td><?php echo $candidate['nama_calon']; ?></td>
        <td><?php echo $candidate['jumlah_vote']; ?></td>
          <td><?php echo $candidate['date_created']; ?></td>
        <td>


          <a href="<?= base_url('admin/candidate/edit/') . $candidate['id_calon']; ?>" title="Edit Materi" class="btn btn-warning btn-sm">
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

