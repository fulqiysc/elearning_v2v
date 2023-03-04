<div class="row">
  <div class="col-lg-6">

    <?php
    if ($this->session->flashdata('sukses')) {

      echo $this->session->flashdata('sukses');
    }


    echo validation_errors('<div class="alert alert-warning">', '</div>');

    include('tambah.php');
    ?>

  </div>
</div>

<hr>



<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Kelas</th>

      <th>Slug Kelas</th>
      <th>Urutan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($kelas as $kelas) { ?>



      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $kelas['nama_kelas'] ?></td>

        <td><?php echo $kelas['slug_kelas'] ?></td>
        <td><?php echo $kelas['urutan'] ?></td>


        <td>

          <a href="<?= base_url('admin/kelas/edit/') . $kelas['id_kelas']; ?>" title="Edit User" class="btn btn-warning btn-sm">
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